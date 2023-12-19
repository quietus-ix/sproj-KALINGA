<?php

   $fn = $_POST["fn"];
   $ln = $_POST["ln"];
   $un = $_POST["un"];
   $em = $_POST["em"];
   $pw = $_POST["pw"];
   $pwr = $_POST["rpw"];

   require_once '../../php/dbh_inc.php';
   require_once 'func_signup_inc.php';

   if (emptyInputSignup($fn, $ln, $un, $em, $pw, $pwr) !== false) {
      echo json_encode(array(
         "statusCode"=>400,
         "type"=>1,
         "message"=>"All fields must be filled"
      ));
      exit();
   }
   if (invalidUn($un) !== false) {
      echo json_encode(array(
         "statusCode"=>400,
         "type"=>2,
         "message"=>"username must not contain special symbols"
      ));
      exit();
   }
   if (invalidUnl($un) !== false) {
      echo json_encode(array(
         "statusCode"=>400,
         "type"=>3,
         "message"=>"username must be 5 characters long"
      ));
      exit();
   }
   if (pwShort($pw) !== false) {
      echo json_encode(array(
         "statusCode"=>400,
         "type"=>4,
         "message"=>"password too short"
      ));
      exit();
   }
   if (pwMatch($pw, $pwr) !== false) {
      echo json_encode(array(
         "statusCode"=>400,
         "type"=>5,
         "message"=>"passwords did not match"
      ));
      exit();
   }

   // checks for duplicate username
   $dupUn = $conn->prepare(
      "SELECT * FROM tb_user WHERE usr_username = ?"
   );
   $dupUn->bind_param('s', $un);
   $dupUn->execute();
   $dupUn->store_result();
   if($dupUn->num_rows() > 0) {
      echo json_encode(array(
         "statusCode"=>400,
         "type"=>1,
         "message"=>"username already exist"
      ));
      exit();
   }
   // checks for duplicate email
   $dupEm = $conn->prepare(
      "SELECT * FROM tb_user WHERE usr_email = ?"
   );
   $dupEm->bind_param('s', $em);
   $dupEm->execute();
   $dupEm->store_result();
   if($dupEm->num_rows() > 0) {
      echo json_encode(array(
         "statusCode"=>400,
         "type"=>1,
         "message"=>"email already exist"
      ));
      exit();
   }

   $currentDateTime = date('Y-m-d H:i:s');
   $pHashed = password_hash($pw, PASSWORD_BCRYPT);
   $utype = 1;

   $sql = $conn->prepare(
      "INSERT INTO tb_user(
         usr_type,
         usr_username,
         usr_password, 
         usr_fname, 
         usr_lname, 
         usr_email, 
         usr_dateCreated
      ) 
      VALUES (?, ?, ?, ?, ?, ?, ?)"
   );
   $sql->bind_param("issssss", $utype, $un, $pHashed, $fn, $ln, $em, $currentDateTime);
   
   if($sql->execute()) {
      session_start();

      $sel = mysqli_query($conn, "SELECT * FROM tb_user WHERE usr_username = '$un'");

      $startSession = mysqli_fetch_array($sel);
      $_SESSION['sessionID'] = $startSession['usr_id'];
      $_SESSION['userfname'] = $startSession['usr_fname'];
      $_SESSION['sessionAuth'] = $startSession['usr_type'];

      echo json_encode(array(
         "statusCode"=>200,
         "url"=>"../../common/main/index.php"
      ));
      exit();
   }
   
?>