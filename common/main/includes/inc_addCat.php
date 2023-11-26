<?php

require_once '../../php/dbh_inc.php';

$ctn = strtolower($_POST['addCat_name']);
$ctm = $_POST['addCat_metric'];
$cta = $_POST['addCat_metricabbv'];

require_once './functions.php';

if(emptyFields($ctn, $ctm, $cta)) {
     echo json_encode(array(
          "code"=>3
     ));
     exit();
}

$query = mysqli_query($conn, "SELECT * FROM tb_prtype WHERE ipt_type = '$ctn'");

if(mysqli_num_rows($query)>0) {
      echo json_encode(array("code"=>2, "msg"=>"Category already exist"));
}
else {
     $pf = 'PT';
     $ran = rand(100, 999);
     $ctid = $pf . $ran;
     
     $check = $conn->query("SELECT COUNT(*) FROM tb_prtype WHERE ipt_id = '$ctid'");
     $count = mysqli_fetch_row($check)[0];

     while ($count > 0) {
          $ran = rand(100, 999);
          $ctid = $pf . $ran;
          $check = $conn->query("SELECT COUNT(*) FROM tb_prtype WHERE ipt_id = '$ctid'");
          $count = mysqli_fetch_row($check)[0];
     }

     $query = mysqli_query($conn, "INSERT INTO tb_prtype (ipt_id, ipt_type, ipt_metric, ipt_metricAbbv) VALUES('$ctid', '$ctn', '$ctm', '$cta')");
     if($query) {
          echo json_encode(array("code"=>1, "msg"=>"Category added"));
     }
}

