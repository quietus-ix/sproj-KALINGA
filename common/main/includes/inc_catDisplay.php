<?php
     require_once '../../php/dbh_inc.php';

     $idOfCat = $_POST['id'];
     $query = $conn->query("SELECT * FROM tb_prtype WHERE ipt_id = '$idOfCat'");
     $cat = $query->fetch_assoc();

     echo json_encode(array(
          "metricName"=>$cat['ipt_metric'],
          "metricAbbv"=>$cat['ipt_metricAbbv'],
     ));
?>