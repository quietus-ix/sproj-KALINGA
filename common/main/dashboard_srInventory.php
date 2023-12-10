<?php
     require_once '../php/dbh_inc.php';

     // current month
     $currentMonth = $conn->query(
          "SELECT * FROM tb_inventory AS a
          INNER JOIN tb_prtype AS b
               ON a.inv_prtype = b.ipt_id
          WHERE inv_dateAdded = CURDATE()"
     );
     $current = $currentMonth->fetch_assoc();

     // past month
     $pastMonth = $conn->query(
          "SELECT * FROM tb_inventory AS a
          INNER JOIN tb_prtype AS b
               ON a.inv_prtype = b.ipt_id
          WHERE inv_dateAdded != CURDATE()"
     );
     $past = $pastMonth->fetch_assoc();
?>

<div class="flex flex-col mt-6">
     <div class="divider divider-start text-xl mb-2">Current Month</div>

     <table class="table overflow-auto">
          <thead>
               <tr">
                    <th class="w-6/12">Donation Item</th>
                    <th class="w-2/12">Metric</th>
                    <th class="w-2/12">Added/Decreased this month</th>
                    <th class="w-2/12">Total</th>
               </tr>
          </thead>
          <tbody>
               <?php
                    if($currentMonth->num_rows > 0) {
                         foreach($currentMonth as $data) {
               ?>
               <tr>
                    <td><?php echo $data['inv_product'] ?></td>
                    <td><?php echo $data['ipt_metric'].' ('.$data['ipt_metric'].')' ?></td>
                    <?php 
                         if($data['inv_denom'] > 0) {
                              echo '<td class="text-green-500">+'.$data['inv_denom'].'</td>';
                         } else if($data['inv_denom'] < 0) {
                              echo '<td class="text-red-600">-'.$data['inv_denom'].'</td>';
                         } else if ($data['inv_denom'] == 0) {
                              echo '<td class="text-gray-600">0</td>';
                         } 
                    ?>
                    <td><?php echo $data['inv_qty'] ?></td>
               </tr>
               <?php
                         }
                    } else {
                         echo '<tr><td class="w-full d-flex-justify-center text-xl">No items to display</td></tr>';
                    }
               ?>
          </tbody>
     </table>

     <div class="divider divider-start text-xl mt-5 mb-2">Past Month</div>

     <table class="table overflow-auto">
          <thead>
               <tr">
                    <th class="w-6/12">Donation Item</th>
                    <th class="w-2/12">Metric</th>
                    <th class="w-2/12">Added/Decreased this month</th>
                    <th class="w-2/12">Total</th>
               </tr>
          </thead>
          <tbody>
               <?php
                    if($pastMonth->num_rows > 0) {
                         foreach($pastMonth as $data) {
               ?>
               <tr>
                    <td><?php echo $data['inv_product'] ?></td>
                    <td><?php echo $data['ipt_metric'].' ('.$data['ipt_metric'].')' ?></td>
                    <?php 
                         if($data['inv_denom'] > 0) {
                              echo '<td class="text-green-500">+'.$data['inv_denom'].'</td>';
                         } else if($data['inv_denom'] < 0) {
                              echo '<td class="text-red-600">-'.$data['inv_denom'].'</td>';
                         } else if ($data['inv_denom'] == 0) {
                              echo '<td class="text-gray-600">0</td>';
                         } 
                    ?>
                    <td><?php echo $data['inv_qty'] ?></td>
               </tr>
               <?php
                         }
                    } else {
                         echo '<tr><td class="w-full d-flex-justify-center text-xl">No items to display</td></tr>';
                    }
               ?>
          </tbody>
     </table>
</div>