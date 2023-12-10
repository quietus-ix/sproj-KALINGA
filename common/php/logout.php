<?php 
   session_start();
   $vars = array_keys(get_defined_vars());
   foreach ($vars as $var) {
      unset($$var);
   }
   unset($vars, $var);
   session_unset();
   session_destroy();
   header("Location: ../login/index.php");
?>