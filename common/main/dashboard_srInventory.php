<?php
     require_once '../php/dbh_inc.php';

     $date  = (new DateTime())->format('Y-m-d');
     
     // current day
     $currentDay = $conn->query(
          "SELECT * FROM tb_inventory AS a
          INNER JOIN tb_prtype AS b
               ON a.inv_prtype = b.ipt_id
          WHERE DAYOFMONTH(inv_dateModified) = DAYOFMONTH(CURDATE())"
     );
     $current = $currentDay->fetch_assoc();

     // yesterday
     $thisMonth = $conn->query(
          "SELECT * FROM tb_inventory AS a
          INNER JOIN tb_prtype AS b
               ON a.inv_prtype = b.ipt_id
          WHERE MONTH(inv_dateAdded) = MONTH(CURDATE())"
     );
     $presentMonth = $thisMonth->fetch_assoc();
?>

<div class="flex flex-col mt-6">
     <div class="divider divider-start text-xl mb-2">Today</div>

     <table class="table overflow-auto">
          <thead>
               <tr">
                    <th class="w-6/12">Donation Item</th>
                    <th class="w-2/12">Metric</th>
                    <th class="w-2/12">Added/Decreased this day</th>
                    <th class="w-2/12">Total</th>
               </tr>
          </thead>
          <tbody>
               <?php
                    if($currentDay->num_rows > 0) {
                         foreach($currentDay as $data) {
               ?>
               <tr>
                    <td><?php echo $data['inv_product'] ?></td>
                    <td><?php echo $data['ipt_metric'].' ('.$data['ipt_metric'].')' ?></td>
                    <td>
                         <span class="text-green-500 me-3">
                              <?php
                                   if($data['inv_denom'] > 0) {
                                        echo '+'.$data['inv_denom'] ;
                                   } else {
                                        echo ' ';
                                   }
                              ?>
                         </span>
                         <span class="text-red-500">
                              <?php 
                                   if($data['inv_deduc'] < 0) {
                                        echo $data['inv_deduc'];
                                   } else {
                                        echo ' ';
                                   }
                              ?>
                         </span>
                    </td>
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

     <div class="divider divider-start text-xl mt-5 mb-2">This Month</div>

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
                    if($thisMonth->num_rows > 0) {
                         foreach($thisMonth as $data) {
               ?>
               <tr>
                    <td><?php echo $data['inv_product'] ?></td>
                    <td><?php echo $data['ipt_metric'].' ('.$data['ipt_metric'].')' ?></td>
                    <td>
                         <span class="text-green-500 me-3">
                              <?php
                                   if($data['inv_denom'] > 0) {
                                        echo '+'.$data['inv_denom'] ;
                                   } else {
                                        echo ' ';
                                   }
                              ?>
                         </span>
                         <span class="text-red-500">
                              <?php 
                                   if($data['inv_deduc'] < 0) {
                                        echo $data['inv_deduc'];
                                   } else {
                                        echo ' ';
                                   }
                              ?>
                         </span>
                    </td>
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