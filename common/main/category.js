import {loadCategory} from './index.js';

$(document).ready(function(){
     $('main').on('click', '#renameCat_btn', function() {
		let id = $(this).attr('data-ref');
		
		$.ajax({
			type: "POST",
			url: "./includes/inc_modifyCat.php",
			data: {id, type: "modifyCall"},
			cache: false,
			dataType: "json",
			success: function(e) {
				$('main #renameCat_name').val(e.name);
			}
		});
	});
     $('main').on('submit', '#renameCat_form', function(e) {
		e.preventDefault();

		let name = $('main #renameCat_name').val();
		
		$.ajax({
			type: "POST",
			url: "./includes/inc_modifyCat.php",
			data: {name, type: "modifyUpdate"},
			cache: false,
			dataType: "json",
			success: function(e) {
				if(e.code == 1) {
					$('body #alert_warning').addClass('alertShow tw-flex');
					$('body #alert_warning').removeClass('tw-hidden');
					$('body #alert_warning_text').html(e.msg);
					setTimeout(()=>{
						$('body #alert_warning').removeClass('alertShow tw-flex');
						$('body #alert_warning').addClass('tw-hidden');
					},3000);
					loadCategory();
				}
				else if(e.code == 2) {
					$('body #alert_success').addClass('alertShow tw-flex');
					$('body #alert_success').removeClass('tw-hidden');
					$('body #alert_success_text').html(e.msg);
					setTimeout(()=>{
						$('body #alert_success').removeClass('alertShow tw-flex');
						$('body #alert_success').addClass('tw-hidden');
					},3000);
					loadCategory();
				}
			}
		});
	});

	$('main').on('click', '#changeMetric_btn', function() {
		let id = $(this).attr('data-ref');
		
		$.ajax({
			type: "POST",
			url: "./includes/inc_modifyCat.php",
			data: {id, type: "modifyCall"},
			cache: false,
			dataType: "json",
			success: function(e) {
				$('main #changeMetric_name').val(e.met);
				$('main #changeMetric_abbv').val(e.metAbv);
			}
		});
	});
	$('main').on('submit', '#changeMetric_form', function(e) {
		e.preventDefault();

		let met = $('main #changeMetric_name').val();
		let abv = $('main #changeMetric_abbv').val();
		
		$.ajax({
			type: "POST",
			url: "./includes/inc_modifyCat.php",
			data: {met, abv, type: "modifyUpdate"},
			cache: false,
			dataType: "json",
			success: function(e) {
				if(e.code == 1) {
					$('body #alert_warning').addClass('alertShow tw-flex');
					$('body #alert_warning').removeClass('tw-hidden');
					$('body #alert_warning_text').html(e.msg);
					setTimeout(()=>{
						$('body #alert_warning').removeClass('alertShow tw-flex');
						$('body #alert_warning').addClass('tw-hidden');
					},3000);
					loadCategory();
				}
				else if(e.code == 2) {
					$('body #alert_success').addClass('alertShow tw-flex');
					$('body #alert_success').removeClass('tw-hidden');
					$('body #alert_success_text').html(e.msg);
					setTimeout(()=>{
						$('body #alert_success').removeClass('alertShow tw-flex');
						$('body #alert_success').addClass('tw-hidden');
					},3000);
					loadCategory();
				}
			}
		});
	});

	$('main').on('click', '#delCategory_btn', function() {
		let id = $(this).attr('data-ref');
		$('main #delCat_modal').addClass('tw-modal-open');
		
		$.ajax({
			type: "POST",
			url: "./includes/inc_modifyCat.php",
			data: {id, type: "modifyCall"},
			cache: false,
			dataType: "json",
			success: function(e) {
				$('main #delCat_id').val(e.id);
				$('main #delCat_target').html(e.name);
				if(e.count > 1) {
					$('main #delCat_count').html('There are <span class="tw-text-secondary tw-font-bold">'+e.count+'</span> items using this category.');
				}
				else if(e.count == 1) {
					$('main #delCat_count').html("There is one item using this category.");
				}
				else {
					$('main #delCat_count').html("");
				}
			}
		});
	});
	$('main').on('click', '#delCat_btn_cancel', function() {
		$('main #delCat_modal').removeClass('tw-modal-open');
	});
	$('main').on('submit', '#delCat_form', function(e) {
		e.preventDefault();

		let delCatId = $('main #delCat_id').val();
		
		$.ajax({
			type: "POST",
			url: "./includes/inc_modifyCat.php",
			data: {delCatId, type: "modifyUpdate"},
			cache: false,
			dataType: "json",
			success: function(e) {
				if(e.code == 2) {
					$('body #alert_warning').addClass('alertShow tw-flex');
					$('body #alert_warning').removeClass('tw-hidden');
					$('body #alert_warning_text').html(e.msg);
					setTimeout(()=>{
						$('body #alert_warning').removeClass('alertShow tw-flex');
						$('body #alert_warning').addClass('tw-hidden');
					},3000);
					loadCategory();
				}
				else if(e.code == 1) {
					$('body #alert_success').addClass('alertShow tw-flex');
					$('body #alert_success').removeClass('tw-hidden');
					$('body #alert_success_text').html(e.msg);
					setTimeout(()=>{
						$('body #alert_success').removeClass('alertShow tw-flex');
						$('body #alert_success').addClass('tw-hidden');
					},3000);
					loadCategory();
				}
			}
		});
	});
	
});