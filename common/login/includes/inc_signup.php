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
   $currentDateTime = date('Y-m-d H:i:s');
   $pHashed = password_hash($pw, PASSWORD_BCRYPT);
   $sql = mysqli_query(
      $conn, 
      "INSERT INTO tb_user(usr_username, usr_password, usr_fname, usr_lname, usr_email, usr_dateCreated) 
      VALUES ('$un', '$pHashed', '$fn', '$ln', '$em', '$currentDateTime')");
   
   if($sql) {
      session_start();

      $sel = mysqli_query($conn, "SELECT * FROM tb_user WHERE usr_username = '$un'");

      $startSession = mysqli_fetch_array($sel);
      $_SESSION['sessionID'] = $startSession['usr_id'];
      $_SESSION['userfname'] = $startSession['usr_fname'];
      // $_SESSION['sessionAuth'] = $startSession['usr_type'];

      echo json_encode(array(
         "statusCode"=>200,
         "url"=>"../../common/main/index.php"
      ));
      exit();
   }
   
?>