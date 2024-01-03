<?php
require_once '../../php/dbh_inc.php';
session_start();

$type = $_POST['type'];

if ($type == "modifyCall") {
     $_SESSION['catid'] = $_POST['id'];
     $id = $_SESSION['catid'];
     $query = $conn->query("SELECT * FROM tb_prtype WHERE ipt_id = '$id'");
     $check = $conn->query("SELECT COUNT(*) FROM tb_inventory WHERE inv_prtype = '$id'");
     $num = $check->fetch_column();
     $row = $query->fetch_assoc();

     if ($num > 0) {
          echo json_encode(array(
               "id" => $row['ipt_id'],
               "name" => $row['ipt_type'],
               "met" => $row['ipt_metric'],
               "metAbv" => $row['ipt_metricAbbv'],
               "count" => $num
          ));
     } else {
          echo json_encode(array(
               "id" => $row['ipt_id'],
               "name" => $row['ipt_type'],
               "met" => $row['ipt_metric'],
               "metAbv" => $row['ipt_metricAbbv']
          ));
     }
} else if ($type == "modifyUpdate") {
     $id = $_SESSION['catid'];
     $query = $conn->query("SELECT * FROM tb_prtype WHERE ipt_id = '$id'");
     $row = $query->fetch_assoc();

     if (isset($_POST['name'])) {
          $name = $_POST['name'];
          $sanName = mysqli_real_escape_string($conn, $name);
          $name = strtolower($name);

          if ($row['ipt_type'] == $name) {
               echo json_encode(array(
                    "code" => 1,
                    "msg" => "Category name similar. No changes made"
               ));
          } else {
               $stmt = $conn->prepare("UPDATE tb_prtype SET ipt_type = ? WHERE ipt_id = ?");
               $stmt->bind_param('ss', $sanName, $id);
               $stmt->execute();
               // $query = $conn->query("UPDATE tb_prtype SET ipt_type = '$name' WHERE ipt_id = '$id'");

               echo json_encode(array(
                    "code" => 2,
                    "msg" => "Category renamed"
               ));
          }
     } else if (isset($_POST['met'])) {
          $met = $_POST['met'];
          $abv = $_POST['abv'];

          if ($row['ipt_metric'] == $met && $row['ipt_metricAbbv'] == $abv) {
               echo json_encode(array(
                    "code" => 1,
                    "msg" => "No changes made"
               ));
          } else {
               $stmt = $conn->prepare("UPDATE tb_prtype SET ipt_metric = ?, ipt_metricAbbv = ? WHERE ipt_id = ?");
               $stmt->bind_param('sss', $met, $abv, $id);
               $stmt->execute();
               // $query = $conn->query("UPDATE tb_prtype SET ipt_metric = '$met', ipt_metricAbbv = '$abv' WHERE ipt_id = '$id'");

               echo json_encode(array(
                    "code" => 2,
                    "msg" => "Metric modified"
               ));
          }
     } else if (isset($_POST['delCatId'])) {
          $target = $_POST['delCatId'];

          $query = $conn->query("SELECT * FROM tb_inventory WHERE inv_prtype = '$target'");

          if ($query->num_rows > 0) {
               $query = $conn->query("UPDATE tb_inventory SET inv_prtype = 'null' WHERE inv_prtype = '$target'");

               if ($query) {
                    $query = $conn->query("DELETE FROM tb_prtype WHERE ipt_id = '$target'");
                    echo json_encode(array(
                         "code" => 1,
                         "msg" => "Category deleted"
                    ));
               } else {
                    echo json_encode(array(
                         "code" => 2,
                         "msg" => "There's a problem deleting this category"
                    ));
               }
          } else {
               $query = $conn->query("DELETE FROM tb_prtype WHERE ipt_id = '$target'");

               if ($query) {
                    echo json_encode(array(
                         "code" => 1,
                         "msg" => "Category deleted"
                    ));
               } else {
                    echo json_encode(array(
                         "code" => 2,
                         "msg" => "There's a problem deleting this category"
                    ));
               }
          }
     }
}
