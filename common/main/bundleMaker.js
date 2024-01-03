import { loadContent } from "./index.js";
import { loadTablePlainContent } from "./index.js";

$(document).ready(function () {
   $("main").on("click", "#createBundlePromptBtn", function () {
      loadTablePlainContent("main", "bundleMaker_create.php", "#bundleTable");
   });

   // let cloned = $("#bundleTable tr:last").clone();
   // $("main").on("#addItem", function (e) {
   //    e.preventDefault();
   //    cloned.clone().appendTo("#bundleTable");
   // });

   // $("main").on("click", "#addItem", function () {
   //    $("main .divider").append(
   //       '<div class="w-full px-3 py-2 flex"><select class="block w-full border-b-2 border-gray-400 bg-transparent px-5 py-2.5 text-quatenary focus:border-b-secondary focus:outline-none"><option disabled selected > Item select </option> <?php while ($item = $query->fetch_column()) { ?> <option> <?php echo $item ?> </option> <?php } ?></div>'
   //    );
   // });

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
               loadTableContent("main", "inventory.php", "#inv_tbl", [1]);
            } else if (r.code == 2) {
               $("body #alert_success").addClass("alertShow flex");
               $("body #alert_success").removeClass("hidden");
               $("body #alert_success_text").html(r.msg);
               setTimeout(() => {
                  $("body #alert_success").removeClass("alertShow flex");
                  $("body #alert_success").addClass("hidden");
               }, 3000);
               loadTableContent("main", "inventory.php", "#inv_tbl", [1]);
            }
         },
      });
   });
});
