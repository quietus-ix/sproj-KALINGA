<?php
require_once '../../php/dbh_inc.php';
$encode;

$bundle_id_new = $_POST['bundleID'];

if (!empty($_POST['bundle_name']) && !empty($_POST['bundle_item_name']) && !empty($_POST['bundle_item_qty'])) {
   $bundle_name = $_POST['bundle_name'];

   $query = $conn->query("INSERT INTO tb_bundles (bnd_name) VALUES ('$bundle_name')");

   if ($query) {
      $bundle_id = $conn->insert_id;

      foreach ($_POST['bundle_item_name'] as $key => $value) {

         $bundle_item_name = $value;
         $bundle_item_qty = $_POST['bundle_item_qty'][$key];
         if (empty($bundle_item_name) || empty($bundle_item_qty)) {
            $query = $conn->query("DELETE FROM tb_bundles WHERE bnd_id = '$bundle_id'");
            $querytwo = $conn->query("DELETE FROM tb_bundleitems WHERE bundle_id = '$bundle_id'");
            if ($query && $querytwo) {
               $encode = array(
                  "code" => 1,
                  "msg" => "You must select an item on all rows you added or all quantity fields must have an amount"
               );
               echo json_encode($encode);
               exit();
            }
         } else {
            $qty = intval($bundle_item_qty);
            $itemCheck = $conn->query("SELECT inv_qty FROM tb_inventory WHERE inv_id = '$bundle_item_name'")->fetch_column();

            if ($itemCheck < $bundle_item_qty) {
               $query = $conn->query("DELETE FROM tb_bundles WHERE bnd_id = '$bundle_id'");
               $querytwo = $conn->query("DELETE FROM tb_bundleitems WHERE bundle_id = '$bundle_id'");

               if ($query && $querytwo) {
                  $encode = array(
                     "code" => 1,
                     "msg" => "Some items have quantity greater than the item in inventory"
                  );
                  echo json_encode($encode);
                  exit();
               }
            } else {
               $query = $conn->query("INSERT INTO tb_bundleitems (bundle_id, item_id, qty) VALUES ('$bundle_id', '$bundle_item_name', '$bundle_item_qty')");
               $querythree = $conn->query("DELETE FROM tb_bundles WHERE bnd_id = '$bundle_id_new'");
               $querytwo = $conn->query("DELETE FROM tb_bundleitems WHERE bundle_id = '$bundle_id_new'");
               if ($query && $querytwo && $$querythree) {
                  $encode = array(
                     "code" => 2,
                     "msg" => "Bundle successfully edited"
                  );
                  echo json_encode($encode);
               }
            }
         }
      }
   }
} else {
   $encode = array(
      "code" => 1,
      "msg" => "All fields cannot be empty"
   );
   echo json_encode($encode);
}
