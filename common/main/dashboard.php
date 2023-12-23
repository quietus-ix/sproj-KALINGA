<?php
     require_once '../php/dbh_inc.php';

     $arrItems  = array();
     $arrQty    = array();
     $arrMetric = array();
     $index     = 0;

     $qr = $conn->query("SELECT * FROM tb_inventory");

     if($qr->num_rows > 0) {
          while($qr_data = $qr->fetch_assoc()) {
               $itemName = $qr_data['inv_product'];
               $itemQty  = $qr_data['inv_qty'];
               $itemCat  = $qr_data['inv_prtype'];

               $qrmet = $conn->query("SELECT ipt_metric FROM tb_prtype WHERE ipt_id = '$itemCat'");
               $selmet = $qrmet->fetch_column();

               $arrItems[$index]  = $itemName;
               $arrQty[$index]    = $itemQty;
               $arrMetric[$index] = $selmet;
               
               $index++;
          }
     }
?>

<div class="w-full h-full p-4 overflow-y-auto">
     
     <!-- statistics container -->
          <div class="w-full h-3/5 flex flex-col md:flex-row gap-4">
               <!-- welcome card -->
               <div class="w-full md:w-1/4 h-1/3 md:h-full p-3 md:p-0 flex flex-col items-center bg-primary shadow-lg rounded-lg overflow-hidden">
                    <div class="w-full h-4/6 flex justify-center">
                         <img src="../../src/assets/img/illus_01.svg" class="w-72" alt="">
                    </div>
                    <div class="w-full h-1/6 flex flex-col items-center">
                         <h1 class="text-base md:text-3xl font-[Questrial] font-bold">Welcome</h1>
                         <h4 class="text-sm md:text-xl">Start adding items and help the world</h4>
                         <button id="start_inv" type="button" class="mt-2 py-2 px-3 bg-secondary text-primary capitalize rounded">add items</button>
                    </div>
               </div>

               <!-- statistics and summary card -->
               <div class="w-full md:w-3/4 h-2/3 md:h-full flex flex-col bg-primary shadow-lg rounded-lg overflow-hidden">
                    <!-- chart section -->
                    <div id="stats_container" class="w-full h-max md:h-3/4 p-3 relative z-0">

                    </div>
                    <script type="text/javascript">
                         var myChart = echarts.init(document.getElementById('stats_container'));
                         window.addEventListener('resize', function() {
                              myChart.resize();
                         });

                         var option = {
                              title: {
                                   text: 'Items per type'
                              },
                              tooltip: {},
                              legend: {
                                   orient: 'horizontal',
                                   right: '10',
                                   data: ['Quantity/Pieces']
                              },
                              xAxis: {
                                   type: 'category',
                                   data: [<?php
                                             $arrlengthItems = count($arrItems);
                                             for($ctrA = 0; $ctrA < $arrlengthItems; $ctrA++){     
                                                  echo "'" . $arrItems[$ctrA] . "',";	            
                                        } ?>]
                              },
                              yAxis: {},
                              series: [ 
                                   {
                                   name: 'Quantity/Pieces',
                                   type: 'bar',
                                   data: [
                                        <?php
                                             $arrlengthQty = count($arrQty);
                                             for($ctrA = 0; $ctrA < $arrlengthQty; $ctrA++){
                                                  echo "'" . $arrQty[$ctrA] . "',";	  
                                             }
                                        ?>
                                        ]
                                   }
                              ]
                         };
                         myChart.setOption(option);
                    </script> 

                    <!-- counters section -->
                    <div class="w-full h-max md:h-1/4 bg-gray-200 flex flex-col md:flex-row relative z-10">
                         <!-- counter: total # of donation items -->
                         <div class="w-full md:w-1/3 h-full flex flex-col gap-3 p-4 cursor-pointer bg-primary group/card1">
                              <div class="flex items-center">
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512" class="w-4 h-4 me-2 text-tertiary group-hover/card1:text-gray-500">
                                        <path d="M248 0H208c-26.5 0-48 21.5-48 48V160c0 35.3 28.7 64 64 64H352c35.3 0 64-28.7 64-64V48c0-26.5-21.5-48-48-48H328V80c0 8.8-7.2 16-16 16H264c-8.8 0-16-7.2-16-16V0zM64 256c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H224c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H184v80c0 8.8-7.2 16-16 16H120c-8.8 0-16-7.2-16-16V256H64zM352 512H512c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H472v80c0 8.8-7.2 16-16 16H408c-8.8 0-16-7.2-16-16V256H352c-15 0-28.8 5.1-39.7 13.8c4.9 10.4 7.7 22 7.7 34.2V464c0 12.2-2.8 23.8-7.7 34.2C323.2 506.9 337 512 352 512z"/>
                                   </svg>
                                   <h3 class="text-tertiary text-base md:text-xl group-hover/card1:text-gray-500">Donation items</h3>
                              </div>
                              <div class="px-5 text-base md:text-xl font-bold text-quatenary flex justify-end">
                              <?php
                                   $q = $conn->query("SELECT COUNT(*) FROM tb_inventory WHERE inv_qty != 0");
                                   $c = $q->fetch_column();

                                   if($c > 0) {
                                        echo $c;
                                   } else {
                                        echo 0;
                                   }
                              ?>
                              </div>
                         </div>
                         <!-- counter: total # of donation packages -->
                         <div class="w-full md:w-1/3 h-full flex flex-col gap-3 p-4 cursor-pointer hover:bg-gray-300 group/card2">
                              <div class="flex items-center">
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512" class="w-4 h-4 me-2 text-gray-400 group-hover/card2:text-gray-500">
                                        <path d="M256 48c0-26.5 21.5-48 48-48H592c26.5 0 48 21.5 48 48V464c0 26.5-21.5 48-48 48H381.3c1.8-5 2.7-10.4 2.7-16V253.3c18.6-6.6 32-24.4 32-45.3V176c0-26.5-21.5-48-48-48H256V48zM571.3 347.3c6.2-6.2 6.2-16.4 0-22.6l-64-64c-6.2-6.2-16.4-6.2-22.6 0l-64 64c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L480 310.6V432c0 8.8 7.2 16 16 16s16-7.2 16-16V310.6l36.7 36.7c6.2 6.2 16.4 6.2 22.6 0zM0 176c0-8.8 7.2-16 16-16H368c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H16c-8.8 0-16-7.2-16-16V176zm352 80V480c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V256H352zM144 320c-8.8 0-16 7.2-16 16s7.2 16 16 16h96c8.8 0 16-7.2 16-16s-7.2-16-16-16H144z"/>
                                   </svg>
                                   <h3 class="text-gray-400 text-base md:text-xl group-hover/card2:text-gray-500">Donation packages</h3>
                              </div>
                              <div class="px-5 text-base md:text-xl font-bold text-quatenary flex justify-end">
                              <?php
                                   $q = $conn->query("SELECT COUNT(*) FROM tb_bundles");
                                   $c = $q->fetch_column();

                                   if($c > 0) {
                                        echo $c;
                                   } else {
                                        echo 0;
                                   }
                              ?>
                              </div>
                         </div>
                         <!-- feature: category with the most items -->
                         <div class="w-full md:w-1/3 h-full flex flex-col gap-3 p-4 cursor-pointer hover:bg-gray-300 group/card3">
                              <div class="flex items-center">
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512" class="w-4 h-4 me-2 text-gray-400 group-hover/card3:text-gray-500">
                                        <path d="M96 0C60.7 0 32 28.7 32 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H96zM208 288h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H144c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V80zM496 192c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V336z"/>
                                   </svg>
                                   <h3 class="text-gray-400 text-base md:text-xl group-hover/card3:text-gray-500">Featured category</h3>
                              </div>
                              <div class="px-5 text-base md:text-xl font-bold text-quatenary flex justify-end">
                              <?php
                                   $q = $conn->query(
                                        "SELECT tb_prtype.ipt_type,
                                        COUNT(tb_inventory.inv_id) AS count
                                        FROM tb_inventory 
                                        INNER JOIN tb_prtype 
                                        ON tb_inventory.inv_prtype = tb_prtype.ipt_id
                                        GROUP BY tb_prtype.ipt_type
                                        ORDER BY count 
                                        DESC LIMIT 1
                                   ");
                                   
                                   $g = $q->fetch_assoc();
                                   
                                   if($g > 0) {
                                        echo $g['ipt_type'] . ' (' . $g['count'] . ')';
                                   } else {
                                        echo 'none';
                                   }
                              ?>
                              </div>
                         </div>
                    </div>
               </div>
               
          </div>
     <!-- end -->

     <!-- another container -->
          <div class="w-full h-1/3 flex mt-4 bg-primary rounded-lg shadow-lg justify-center items-center text-3xl">
               description nadi ka system tani pro dason nalang danay kay i have bigger problems to code
          </div>
     <!-- end -->

     <!-- summary container -->
          <div class="w-full h-max flex flex-col p-4 bg-primary rounded-lg shadow-lg mt-4 overflow-hidden">
               <div class="flex items-center font-bold">
                    <div class="text-3xl me-5">
                         Summary Report
                    </div>
                    <div class="flex items-center gap-2">
                         <button type="button" id="sr_inventory_tab" class="btn bg-quatenary text-primary uppercase hover:text-quatenary">inventory</button>
                         <button type="button" id="sr_category_tab" class="btn bg-quatenary text-primary uppercase hover:text-quatenary">per category</button>
                    </div>
               </div>

               <div id="report_content" class="w-full h-max">
                    <?php  include './dashboard_srInventory.php' ?>
               </div>
               
               <!-- <div class="divider divider-start text-xl">Inventory</div> -->
               
          </div>
     <!-- end -->
</div>

