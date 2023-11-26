<?php

require_once '../../php/dbh_inc.php';

$itn = strtoupper($_POST['addItem_name']);
$itc = $_POST['addItem_category'];
$itq = $_POST['addItem_qty'];
$itnn = $_POST['addItem_note'];

require_once './functions.php';

if(emptyFields($itn, $itc, $itq)) {
   echo json_encode(array(
      "code"=>3
   ));
   exit();
}

$query = mysqli_query($conn, "SELECT * FROM tb_inventory WHERE inv_product = '$itn'");

if(mysqli_num_rows($query)>0) {
   
   $dup = mysqli_fetch_array($query);
   $checkQTY = $dup['inv_qty'];
   
   $itq+=$checkQTY;
   $query = mysqli_query($conn, "UPDATE tb_inventory SET inv_qty = '$itq' WHERE inv_product = '$itn'");
   if($query) {
      echo json_encode(array("code"=>2, "msg"=>"Updated duplicate item"));
   }
}
else {
   $query = mysqli_query($conn, "INSERT INTO tb_inventory (inv_product, inv_prtype, inv_qty, inv_note) VALUES('$itn', '$itc', '$itq', '$itnn')");
   if($query) {
      echo json_encode(array("code"=>1, "msg"=>"Item added to inventory"));
   }
}

