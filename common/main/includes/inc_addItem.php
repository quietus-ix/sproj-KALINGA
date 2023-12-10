<?php

     require_once '../../php/dbh_inc.php';

     $itn = strtoupper($_POST['addItem_name']);
     $itc = $_POST['addItem_category'];
     $itq = $_POST['addItem_qty'];
     $itnn = $_POST['addItem_note'];

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
          $query = $conn->query(
               "SELECT inv_qty, inv_denom, inv_deduc FROM tb_inventory
               WHERE inv_id = '$id'"
          );
          $getQty = $query->fetch_assoc();
          
          $denom = $qty - $getQty['inv_qty'];

          if($getQty['inv_qty'] < $qty) {
               $denomDeduc = $getQty['inv_deduc'];
               $denomAdd = $getQty['inv_denom'] + $denom;
          } else if($getQty['inv_qty'] > $qty) {
               $denomDeduc = $getQty['inv_deduc'] + $denom;
               $denomAdd = $getQty['inv_denom'];
          } else if($getQty['inv_qty'] == 0) {
               $denom = $qty;
               $denomAdd = $getQty['inv_denom'] + $denom;
          }

          $query = $conn->query(
               "UPDATE tb_inventory 
               SET inv_denom = '$denomAdd', 
                    inv_deduc = '$denomDeduc', 
                    inv_qty = '$itq', 
                    inv_dateModified = CURDATE() 
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
                    inv_dateAdded,
                    inv_dateModified
                    ) VALUES(
                         '$itn', 
                         '$itc', 
                         '$denom', 
                         '$itq', 
                         '$itnn', 
                         CURDATE(),
                         CURDATE()
                    )"
          );
          if($query) {
               echo json_encode(array("code"=>1, "msg"=>"Item added to inventory"));
          }
     }

