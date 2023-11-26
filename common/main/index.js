export function loadInventory() {
   $.ajax({
      url: './inventory.php',
      method: 'GET',
      success: function(data) {
         $('main').html(data);

         new DataTable('#inv_tbl', {
            initComplete: function () {
                  this.api()
                     .columns([0, 1])
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

export function loadCategory() {
   $.ajax({
      url: './category.php',
      method: 'GET',
      success: function(data) {
         $('main').html(data);
         // $('main #inv_tbl').DataTable();

         new DataTable('#cat_tbl', {
            initComplete: function () {
                  this.api()
                     .columns([2])
                     .every(function () {
                           let column = this;
            
                           // Create select element
                           let select = document.createElement('select');
                           select.add(new Option(''));
                           column.footer().replaceChildren(select);
            
                           // Apply listener for user change in value
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

export function loadDashboard() {
   $.ajax({
      url: 'dashboard.php',
      method: 'GET',
      success: function(data) {
         $('main').html(data);
      }
   });
}

$(document).ready(()=>{
   loadDashboard();

   function toPage(url, elem) {
      fetch(url)
         .then(response => response.text())
         .then(data => {
            $(elem).html(data);
      });
   }

   $('#nav_dashboard').click(()=>{
      $('#nav_dashboard').addClass('active-nav');

      loadDashboard();

      $('#nav_inventory, #nav_makePackage, #nav_settings, #nav_faq').removeClass('active-nav');
   });
   $('#nav_inventory').click(()=>{
      $('#nav_inventory').addClass('active-nav');

      loadInventory();

      $('#nav_dashboard, #nav_makePackage, #nav_settings, #nav_faq').removeClass('active-nav');
   });
   $('#nav_makePackage').click(()=>{
      $('#nav_makePackage').addClass('active-nav');

      // toPage('maker/index.php', 'main');

      $('#nav_dashboard, #nav_inventory, #nav_settings, #nav_faq').removeClass('active-nav');
   });
   $('#nav_settings').click(()=>{
      $('#nav_settings').addClass('active-nav');

      // toPage('settings/index.php', 'main');

      $('#nav_dashboard, #nav_inventory, #nav_makePackage, #nav_faq').removeClass('active-nav');
   });
   $('#nav_faq').click(()=>{
      $('#nav_faq').addClass('active-nav');

      // toPage('faq/index.php', 'main');

      $('#nav_dashboard, #nav_inventory, #nav_makePackage, #nav_settings').removeClass('active-nav');
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

   $('main').on('click', '#inv_tab', function(){
      loadInventory();
   });
   $('main').on('click', '#cat_tab', function(){
      loadCategory();
   });

});