<?php

function emptyFields($a, $b, $c) {
     $result;

     if(empty($a) || empty($b) || empty($c)) {
          $result = true;
     } 
     else {
          $result = false;
     }

     return $result;
}