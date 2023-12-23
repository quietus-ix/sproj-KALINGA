import { loadContent } from "./index.js";
import { loadTableContent } from "./index.js";

$(document).ready(function() {
     $('main').on('click', '#createBundlePromptBtn', function() {
          loadContent('main', 'bundleMaker_create.php');
     });
});