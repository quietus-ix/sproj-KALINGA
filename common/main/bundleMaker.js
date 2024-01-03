$(document).ready(function () {
   $("main").on("click", "#createBundlePromptBtn", function () {
      loadTablePlainContent("main", "bundleMaker_create.php", "#bundleTable");
   });
   $("main").on("click", "#createBundle", function () {
      loadTablePlainContent("main", "bundleMaker_create.php", "#bundleTable");
   });

   // took me 2 hours
   $("main").on("click", "#addItem", function (e) {
      addRow();
   });

   $("main").on("click", ".delItem", function () {
      $(this).closest("tr").remove();
   });

   $("main").on("click", ".editBundle_btn", function (e) {
      let id = $(this).attr("id");
      $.ajax({
         type: "POST",
         url: "./bundleMaker_edit.php",
         data: { id },
         cache: false,
         success: function (e) {
            $("main").html(e);
            new DataTable("#bundleTable", {
               info: false,
               ordering: false,
               paging: false,
               searching: false,
               retrieve: true,
            });
         },
      });
   });

   $("main").on("submit", "#create_bundle", function (e) {
      e.preventDefault();
      let data = $(this).serialize();

      $.ajax({
         type: "POST",
         url: "./includes/bundleCreate.php",
         data: data,
         cache: false,
         dataType: "json",
         success: function (r) {
            if (r.code == 1) {
               $("body #alert_warning").addClass("alertShow flex");
               $("body #alert_warning").removeClass("hidden");
               $("body #alert_warning_text").html(r.msg);
               setTimeout(() => {
                  $("body #alert_warning").removeClass("alertShow flex");
                  $("body #alert_warning").addClass("hidden");
               }, 3000);
            } else if (r.code == 2) {
               $("body #alert_success").addClass("alertShow flex");
               $("body #alert_success").removeClass("hidden");
               $("body #alert_success_text").html(r.msg);
               setTimeout(() => {
                  $("body #alert_success").removeClass("alertShow flex");
                  $("body #alert_success").addClass("hidden");
               }, 3000);
               loadTablePlainContent(
                  "main",
                  "bundleMaker.php",
                  "#bundleDisplay_tbl"
               );
            }
         },
         error: function (r) {
            alert(r.msg);
         },
      });
   });

   $("main").on("submit", "#edit_bundle", function (e) {
      e.preventDefault();
      let data = $(this).serialize();

      $.ajax({
         type: "POST",
         url: "./includes/bundleEdit.php",
         data: data,
         cache: false,
         dataType: "json",
         success: function (r) {
            if (r.code == 1) {
               $("body #alert_warning").addClass("alertShow flex");
               $("body #alert_warning").removeClass("hidden");
               $("body #alert_warning_text").html(r.msg);
               setTimeout(() => {
                  $("body #alert_warning").removeClass("alertShow flex");
                  $("body #alert_warning").addClass("hidden");
               }, 3000);
            } else if (r.code == 2) {
               $("body #alert_success").addClass("alertShow flex");
               $("body #alert_success").removeClass("hidden");
               $("body #alert_success_text").html(r.msg);
               setTimeout(() => {
                  $("body #alert_success").removeClass("alertShow flex");
                  $("body #alert_success").addClass("hidden");
               }, 3000);
               loadTablePlainContent(
                  "main",
                  "bundleMaker.php",
                  "#bundleDisplay_tbl"
               );
            }
         },
      });
   });
});
