<?php

   $un = $_POST["un"];
   $pw = $_POST["pw"];

   require_once '../../php/dbh_inc.php';
   require_once './func_signin_inc.php';

   if (emptyInputSignin($un, $pw) !== false) {
      echo json_encode(array(
         "statusCode"=>400,
         "message"=>"All fields must be filled"
      ));
      exit();
   }
   else {
      $userQ = "SELECT * FROM tb_user WHERE usr_username='$un'";
      $sql = mysqli_query($conn, $userQ);
      if(mysqli_num_rows($sql)>0) {
         session_start();

         $chk = $sql->fetch_assoc();
         $storedPw = $chk['usr_password'];

         if (password_verify($pw, $storedPw)) {
            $_SESSION['sessionID'] = $chk['usr_id'];
            $_SESSION['userfname'] = $chk['usr_fname'];
            // $_SESSION['sessionAuth'] = $chk['usr_type'];

            echo json_encode(array(
               "statusCode"=>200,
               "url"=>"../../common/main/index.php"
            ));
         }
         else {
            echo json_encode(array(
               "statusCode"=>400,
               "message"=>"Username or password not found"
            ));
         }
      }
      else {
         echo json_encode(array(
            "statusCode"=>400,
            "message"=>"Username or password not found"
         ));
      }
   }

   
   ?>