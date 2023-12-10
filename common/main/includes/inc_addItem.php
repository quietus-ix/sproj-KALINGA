<?php

     require_once '../../php/dbh_inc.php';

     $itn = strtoupper($_POST['addItem_name']);
     $itc = $_POST['addItem_category'];
     $itq = $_POST['addItem_qty'];
     $itnn = $_POST['addItem_note'];
     session_start();
     $denom;

     require_once './functions.php';

     $currentMonth = (new DateTime())->format('Y');

     if(emptyFields($itn, $itc, $itq)) {
          echo json_encode(array(
               "code"=>3
          ));
          exit();
     }

     $query = $conn->query(
          "SELECT * FROM tb_inventory 
          WHERE inv_product = '$itn'"
     );

     if(mysqli_num_rows($query)>0) {
          $dup = $query->fetch_array();
          $checkQTY = $dup['inv_qty'];
     
          $itq+=$checkQTY;

          $denom = $itq - $checkQTY;
          if(!empty($_SESSION['denom'])) {
               $_SESSION['denom']+=$denom;
          } else {
               $_SESSION['denom'] = $dup['inv_denom'] + $denom;
          }

          $query = $conn->query(
               "UPDATE tb_inventory 
               SET inv_denom = '{$_SESSION["denom"]}', 
                    inv_qty = '$itq', 
                    inv_dateAdded = CURDATE() 
               WHERE inv_product = '$itn'"
          );

          if($query) {
               echo json_encode(array("code"=>2, "msg"=>$_SESSION['denom']));
          }

     } else {
          $denom = $itq;

          $query = $conn->query(
               "INSERT INTO tb_inventory (
                    inv_product, 
                    inv_prtype, 
                    inv_denom, 
                    inv_qty, 
                    inv_note, 
                    inv_dateAdded
                    ) VALUES(
                         '$itn', 
                         '$itc', 
                         '$denom', 
                         '$itq', 
                         '$itnn', 
                         CURDATE()
                    )"
          );
          if($query) {
               echo json_encode(array("code"=>1, "msg"=>"Item added to inventory"));
          }
     }

