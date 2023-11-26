import { loadInventory } from "./index.js";

$(document).ready(function(){
     $('main').on('click', '#start_inv', function(){
          $('#nav_inventory').addClass('active-nav');
    
          loadInventory();
    
          $('#nav_dashboard, #nav_makePackage, #nav_settings, #nav_faq').removeClass('active-nav');
     });
});
