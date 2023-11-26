<?php

function emptyInputSignup($fname, $lname, $uname, $email, $pwd, $pwdR) {
   $result;
   
   if(empty($fname) || empty($lname) || empty($uname) || empty($email) || empty($pwd) || empty($pwdR)) {
      $result = true;
   } 
   else {
      $result = false;
   }

   return $result;
}

function pwShort($pw) {
   $result;
   
   if(strlen($pw)< 4) {
      $result = true;
   } 
   else {
      $result = false;
   }

   return $result;
}

function pwMatch($pw, $pwr) {
   $result;
   
   if($pwr !== $pw) {
      $result = true;
   } 
   else {
      $result = false;
   }

   return $result;
}

function invalidUnl($un) {
   $result;

   if(strlen($un) < 5) {
      $result = true;
   }
   else {
      $result = false;
   }

   return $result;
}

function invalidUn($un) {
   $result;

   if(!preg_match("/^[a-zA-Z0-9]*$/", $un)) {
      $result = true;
   }
   else {
      $result = false;
   }

   return $result;
}

function invalidEmail($em) {
   
}


