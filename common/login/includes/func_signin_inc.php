<?php

function emptyInputSignin($uname, $pwd) {
   $result;
   
   if(empty($uname) || empty($pwd)) {
      $result = true;
   }
   else {
      $result = false;
   }

   return $result;
}