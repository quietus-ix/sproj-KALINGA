<?php
require_once '../../php/dbh_inc.php';
$encode;

if (isset($_POST['bundle_name'])) {
   $bundle_name = $_POST['bundle_name'];
} else {
   $encode = array(
      "code" => 1,
      "msg" => "Name of the bundle cannot be empty"
   );
}

echo json_encode($encode);
