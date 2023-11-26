<?php 
     require_once '../../php/dbh_inc.php';
     session_start();

     $type = $_POST['type'];

     if($type == "modifyCall") {   
          $_SESSION['itemid'] = $_POST['id'];
          $id = $_SESSION['itemid'];
          $query = $conn->query("SELECT * FROM tb_inventory as a INNER JOIN tb_prtype as b ON a.inv_prtype = b.ipt_id WHERE inv_id = '$id'");
          $row = $query->fetch_assoc();

          echo json_encode(array(
               "name"=>$row['inv_product'],
               "cat"=>$row['inv_prtype'],
               "note"=>$row['inv_note'],
               "qty"=>$row['inv_qty'],
               "met"=>$row['ipt_metric'],
               "metAbv"=>$row['ipt_metricAbbv']
          ));
     }
     else if($type == "modifyUpdate") {

          $id = $_SESSION['itemid'];
          $query = $conn->query("SELECT * FROM tb_inventory as a INNER JOIN tb_prtype as b ON a.inv_prtype = b.ipt_id WHERE inv_id = '$id'");
          $row = $query->fetch_assoc();

          if(isset($_POST['name'])) {
               $name = $_POST['name'];
               $name = strtoupper($name);

               if($row['inv_product'] == $name) {
                    echo json_encode(array(
                         "code"=>1,
                         "msg"=>"Item name similar. No changes made."
                    ));
               }
               else {
                    $query = $conn->query("UPDATE tb_inventory SET inv_product = '$name' WHERE inv_id = '$id'");

                    echo json_encode(array(
                         "code"=>2,
                         "msg"=>"Item renamed."
                    ));
               }
          }
          else if(isset($_POST['cat'])) {
               $cat = $_POST['cat'];

               if($row['inv_prtype'] == $cat) {
                    echo json_encode(array(
                         "code"=>1,
                         "msg"=>"No changes made."
                    ));
               }
               else {
                    $query = $conn->query("UPDATE tb_inventory SET inv_prtype = '$cat' WHERE inv_id = '$id'");

                    echo json_encode(array(
                         "code"=>2,
                         "msg"=>"Category modified."
                    ));
               }
          }
          else if(isset($_POST['qty'])) {
               $qty = $_POST['qty'];

               if($row['inv_qty'] == $qty) {
                    echo json_encode(array(
                         "code"=>1,
                         "msg"=>"No changes made."
                    ));
               }
               else {
                    $query = $conn->query("UPDATE tb_inventory SET inv_qty = '$qty' WHERE inv_id = '$id'");

                    echo json_encode(array(
                         "code"=>2,
                         "msg"=> $row['ipt_metric']." modified."
                    ));
               }
          }
          else if(isset($_POST['note'])) {
               $note = $_POST['note'];

               if($row['inv_note'] == $note) {
                    echo json_encode(array(
                         "code"=>1,
                         "msg"=>"No changes made."
                    ));
               }
               else {
                    $query = $conn->query("UPDATE tb_inventory SET inv_note = '$note' WHERE inv_id = '$id'");

                    echo json_encode(array(
                         "code"=>2,
                         "msg"=>"Notes modified."
                    ));
               }
          }
          else if(isset($_POST['data'])) {
               parse_str($_POST['data'], $formData);

               $name = $formData['changeAll_name'];
               $cat = $formData['changeAll_category'];
               $qty = $formData['changeAll_qty'];
               $note = $formData['changeAll_note'];

               if($row['inv_qty'] == $qty && $row['inv_prtype'] == $cat && $row['inv_product'] == $name && $row['inv_note'] == $note) {
                    echo json_encode(array(
                         "code"=>1,
                         "msg"=>"No changes made."
                    ));
               }
               else {
                    $query = $conn->query("UPDATE tb_inventory SET inv_product = '$name', inv_prtype = '$cat', inv_qty = '$qty', inv_note = '$note' WHERE inv_id = '$id'");

                    echo json_encode(array(
                         "code"=>2,
                         "msg"=>$name . " modified."
                    ));
               }
          }
     }
?>