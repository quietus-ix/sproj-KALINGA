<?php
require_once '../php/dbh_inc.php';

if (!empty($_POST['id'])) {
   $id = $_POST['id'];
}

$itemSel = $conn->query("SELECT inv_id, inv_product FROM tb_inventory");
$bundles = $conn->query(
   "SELECT * FROM tb_bundleitems AS a
      JOIN tb_inventory AS b ON a.item_id = b.inv_id
      JOIN tb_bundles AS c ON a.bundle_id = c.bnd_id
   WHERE bundle_id = '$id'"
);
$bundleItem = $bundles->fetch_assoc();
?>

<form method="post" id="edit_bundle" class="flex gap-5 p-5 justify-center bg-primaryfd w-full h-full overflow-y-auto relative">
   <!-- bundle naming fields -->
   <div class="flex-flex-col">
      <div class="flex gap-3 h-max w-max px-5 py-4 bg-primary rounded shadow-lg">
         <div class="w-96">
            <label for="bundle_name" class="block text-sm text-tertiary">Bundle name</label>
            <input type="hidden" name="bundleID" value="<?php echo $id ?>">
            <input name="bundle_name" type="text" class="block mt-1 w-full placeholder-gray-400/70 border-b-2 border-gray-400 bg-transparent px-5 py-2.5 text-quatenary focus:border-b-secondary focus:outline-none" placeholder="Name this bundle" value="<?php echo $bundleItem['bnd_name'] ?>" />
         </div>
      </div>
   </div>

   <div class="flex-flex-col bg-primary h-max w-full px-5 py-4 rounded">
      <div class="flex justify-between items-center">
         <h1 class="text-tertiary text-3xl">Items</h1>
         <button id="addItem" class="btn bg-quatenary text-primary text-lg flex items-center hover:bg-tertiary" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 me-1">
               <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            Add
         </button>
      </div>
      <table id="bundleTable">
         <thead>
            <tr>
               <th class="w-3/4"></th>
               <th class="1/4"></th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($bundles as $itemRow) {
            ?>
               <tr>
                  <td>
                     <select name="bundle_item_name[]" class="block w-full border-b-2 border-gray-400 bg-transparent px-5 py-2.5 text-quatenary focus:border-b-secondary focus:outline-none">
                        <option disabled> Item select </option>
                        <?php
                        foreach ($itemSel as $item) {
                           if ($item['inv_id'] == $itemRow['inv_id']) {
                              echo '<option value="' . $item["inv_id"] . '" selected>' . $item["inv_product"] . '</option>';
                           } else {
                              echo '<option value="' . $item["inv_id"] . '">' . $item["inv_product"] . '</option>';
                           }
                        }
                        ?>
                     </select>
                  </td>
                  <td>
                     <input name="bundle_item_qty[]" type="number" min="1" class="block w-full placeholder-gray-400/70 border-b-2 border-gray-400 bg-transparent px-2 py-2.5 text-quatenary focus:border-b-secondary focus:outline-none" placeholder="Quantity" value="<?php echo $itemRow['qty'] ?>" />
                  </td>
                  <td>
                     <button type="button" class="delItem btn bg-err text-primary"><i class="bi bi-x-square"></i></button>
                  </td>
               </tr>
            <?php } ?>
         </tbody>
      </table>
   </div>
   <div class="w-2/3 p-3 mx-auto bg-primary rounded shadow flex justify-between items-center fixed bottom-6">
      <div class="divider divider-start">Save your bundle to avoid losing progress</div>
      <button type="submit" class="btn btn-neutral text-lg w-32">Save</button>
   </div>
</form>