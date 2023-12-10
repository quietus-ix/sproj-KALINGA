export function loadTableContent(target, src, table, column) {
   $.ajax({
      url: src,
      method: 'GET',
      success: function(data) {
         $(target).html(data);

         new DataTable(table, {
            initComplete: function () {
                  this.api()
                     .columns(column)
                     .every(function () {
                           let column = this;
            
                           let select = document.createElement('select');
                           select.add(new Option(''));
                           column.footer().replaceChildren(select);
            
                           select.addEventListener('change', function () {
                              var val = DataTable.util.escapeRegex(select.value);
            
                              column
                                 .search(val ? '^' + val + '$' : '', true, false)
                                 .draw();
                           });
            
                           // Add list of options
                           column
                              .data()
                              .unique()
                              .sort()
                              .each(function (d, j) {
                                 select.add(new Option(d));
                              });
                  });
            }
         });
      }
   });
}

export function loadContent(target, src) {
   $.ajax({
      url: src,
      method: 'GET',
      success: function(data) {
         $(target).html(data);
      }
   });
}

$(document).ready(()=>{
   loadContent('main', 'dashboard.php');
   loadContent('main #report_content', 'dashboard_srInventory.php');

   $('#nav_dashboard').click(()=>{
      $('.tabs div').removeClass('active-nav');
      $('#nav_dashboard').addClass('active-nav');

      loadContent('main', 'dashboard.php');
      loadContent('main #report_content', 'dashboard_srInventory.php');
   });
   $('#nav_inventory').click(()=>{
      $('.tabs div').removeClass('active-nav');
      $('#nav_inventory').addClass('active-nav');

      loadTableContent('main', 'inventory.php', '#inv_tbl', [1]);
   });
   $('#nav_settings').click(()=>{
      $('.tabs div').removeClass('active-nav');
      $('#nav_settings').addClass('active-nav');

      // TODO: content for this
   });
   $('#nav_faq').click(()=>{
      $('.tabs div').removeClass('active-nav');
      $('#nav_faq').addClass('active-nav');

      // TODO: content for this
   });

   
   let navClicked = false;
   $('#navExpand').click(()=>{
      if(!navClicked) {
         $('nav').removeClass('shrinkNav');
         $('nav').addClass('expandNav');
         $('#navExpand_icon').html('<path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>');
         setTimeout(()=>{
            $('nav').css('width', '20%');
         }, 300);
         $('.nav-label').fadeIn(300);
         navClicked = true;
      }
      else {
         $('nav').removeClass('expandNav');
         $('nav').addClass('shrinkNav');
         $('#navExpand_icon').html('<path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/>');
         setTimeout(()=>{
            $('nav').css('width', '6%');
         }, 300);
         $('.nav-label').fadeOut(100);
         navClicked = false;
      }
   });

   // tabs inside inventory
   $('main').on('click', '#inv_tab', function(){
      loadTableContent('main', 'inventory.php', '#inv_tbl', [1]);
   });
   $('main').on('click', '#cat_tab', function(){
      loadTableContent('main', 'category.php', '#cat_tbl', [2]);
   });
   $('main').on('click', '#pack_tab', function(){
      loadContent('main', 'packmaker.php');
   });

});