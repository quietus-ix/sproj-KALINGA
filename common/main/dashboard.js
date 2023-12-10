import { loadTableContent } from "./index.js";
import { loadContent } from "./index.js";

$(document).ready(function(){
     
     loadContent('main #report_content', 'dashboard_srInventory.php');

     $('main').on('click', '#start_inv', function(){
          $('#nav_inventory').addClass('active-nav');
          
          loadTableContent('main', 'inventory.php', '#inv_tbl', [1]);
          
          $('#nav_dashboard, #nav_makePackage, #nav_settings, #nav_faq').removeClass('active-nav');
     });
     
     // dashboard summary report actions
     $('main').on('click', '#sr_inventory_tab', function(){
          loadContent('main #report_content', 'dashboard_srInventory.php');
     });
     
});
