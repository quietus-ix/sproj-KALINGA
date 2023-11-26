import {loadInventory} from './index.js';
import { loadCategory } from './index.js';

$(document).ready(()=>{
	$('main').on('change', '#trigger_category', ()=>{
		let catval = $('#trigger_category').val();

		$.post('./includes/inc_catDisplay.php', {id: catval}, (res)=> {
			$('main #metric_name').html(res.metricName);
			$('main #metric_abbv').html("(" + res.metricAbbv + ")");
		}, 'json');
	});

	$('main').on('submit', '#addItem_form', (e)=>{
		e.preventDefault();
		let data = $('#addItem_form').serialize();

		$.ajax({
			type: "POST",
			url: "./includes/inc_addItem.php",
			data: data,
			cache: false,
			dataType: "json",
			success: function(response){
				if(response.code == 1) {
					$('body #alert_success').addClass('alertShow tw-flex');
					$('body #alert_success').removeClass('tw-hidden');
					$('body #alert_success_text').html(response.msg);
					setTimeout(()=>{
						$('body #alert_success').removeClass('alertShow tw-flex');
						$('body #alert_success').addClass('tw-hidden');
					},3000);
					loadInventory();
				}
				else if(response.code == 2) {
					$('body #alert_success').addClass('alertShow tw-flex');
					$('body #alert_success').removeClass('tw-hidden');
					$('body #alert_success_text').html(response.msg);
					setTimeout(()=>{
						$('body #alert_success').removeClass('alertShow tw-flex');
						$('body #alert_success').addClass('tw-hidden');
					},3000);
					loadInventory();

					$.ajax({

					});
				}
				else if(response.code == 3) {
					$('main #addItem_modal_container').addClass('shakeH tw-ring-4 tw-ring-red-400');
					setTimeout(()=>{
						$('main #addItem_modal_container').removeClass('shakeH tw-ring-4 tw-ring-red-400');
					},1000);
				}
			}
		});
	});

	$('main').on('submit', '#addCategory_form', (e)=>{
		e.preventDefault();
		let data = $('#addCategory_form').serialize();

		$.ajax({
			type: "POST",
			url: "./includes/inc_addCat.php",
			data: data,
			cache: false,
			dataType: "json",
			success: function(response){
				if(response.code == 1) {
					$('body #alert_success').addClass('alertShow tw-flex');
					$('body #alert_success').removeClass('tw-hidden');
					$('body #alert_success_text').html(response.msg);
					setTimeout(()=>{
						$('body #alert_success').removeClass('alertShow tw-flex');
						$('body #alert_success').addClass('tw-hidden');
					},3000);
					loadCategory();
				}
				else if(response.code == 2) {
					$('body #alert_warning').addClass('alertShow tw-flex');
					$('body #alert_warning').removeClass('tw-hidden');
					$('body #alert_warning_text').html(response.msg);
					setTimeout(()=>{
						$('body #alert_warning').removeClass('alertShow tw-flex');
						$('body #alert_warning').addClass('tw-hidden');
					},3000);
					loadCategory();
				}
				else if(response.code == 3) {
					$('main #addCategory_modal_container').addClass('shakeH tw-ring-4 tw-ring-red-400');
					setTimeout(()=>{
						$('main #addCategory_modal_container').removeClass('shakeH tw-ring-4 tw-ring-red-400');
					},1000);
				}
			}
		});
	});

	$('main').on('click', '#rename_btn', function() {
		let id = $(this).attr('data-ref');
		
		$.ajax({
			type: "POST",
			url: "./includes/inc_modifyItem.php",
			data: {id, type: "modifyCall"},
			cache: false,
			dataType: "json",
			success: function(e) {
				$('main #rename_name').val(e.name);
			}
		});
	});
	$('main').on('submit', '#rename_form', function(e) {
		e.preventDefault();

		let name = $('main #rename_name').val();
		
		$.ajax({
			type: "POST",
			url: "./includes/inc_modifyItem.php",
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
					loadInventory();
				}
				else if(e.code == 2) {
					$('body #alert_success').addClass('alertShow tw-flex');
					$('body #alert_success').removeClass('tw-hidden');
					$('body #alert_success_text').html(e.msg);
					setTimeout(()=>{
						$('body #alert_success').removeClass('alertShow tw-flex');
						$('body #alert_success').addClass('tw-hidden');
					},3000);
					loadInventory();
				}
			}
		});
	});

	$('main').on('click', '#changeCat_btn', function() {
		let id = $(this).attr('data-ref');
		
		$.ajax({
			type: "POST",
			url: "./includes/inc_modifyItem.php",
			data: {id, type: "modifyCall"},
			cache: false,
			dataType: "json",
			success: function(e) {
				$('main #changeCat').val(e.cat);
			}
		});
	});
	$('main').on('submit', '#changeCat_form', function(e) {
		e.preventDefault();
		let cat = $('main #changeCat').val();
		
		$.ajax({
			type: "POST",
			url: "./includes/inc_modifyItem.php",
			data: {cat, type: "modifyUpdate"},
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
					loadInventory();
				}
				else if(e.code == 2) {
					$('body #alert_success').addClass('alertShow tw-flex');
					$('body #alert_success').removeClass('tw-hidden');
					$('body #alert_success_text').html(e.msg);
					setTimeout(()=>{
						$('body #alert_success').removeClass('alertShow tw-flex');
						$('body #alert_success').addClass('tw-hidden');
					},3000);
					loadInventory();
				}
			}
		});
	});

	$('main').on('click', '#editQty', function() {
		let id = $(this).attr('data-ref');
		
		$.ajax({
			type: "POST",
			url: "./includes/inc_modifyItem.php",
			data: {id, type: "modifyCall"},
			cache: false,
			dataType: "json",
			success: function(e) {
				$('main #qty_header').html("Change "+e.met);
				$('main #qty_label').html(e.met+" ("+e.metAbv+")");
				$('main #qty_amount').val(e.qty);
			}
		});
	});
	$('main').on('submit', '#qty_form', function(e) {
		e.preventDefault();
		let qty = $('main #qty_amount').val();
		
		$.ajax({
			type: "POST",
			url: "./includes/inc_modifyItem.php",
			data: {qty, type: "modifyUpdate"},
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
					loadInventory();
				}
				else if(e.code == 2) {
					$('body #alert_success').addClass('alertShow tw-flex');
					$('body #alert_success').removeClass('tw-hidden');
					$('body #alert_success_text').html(e.msg);
					setTimeout(()=>{
						$('body #alert_success').removeClass('alertShow tw-flex');
						$('body #alert_success').addClass('tw-hidden');
					},3000);
					loadInventory();
				}
			}
		});
	});

	$('main').on('click', '#note_btn', function() {
		let id = $(this).attr('data-ref');
		
		$.ajax({
			type: "POST",
			url: "./includes/inc_modifyItem.php",
			data: {id, type: "modifyCall"},
			cache: false,
			dataType: "json",
			success: function(e) {
				$('main #note_input').val(e.note);
			}
		});
	});
	$('main').on('submit', '#note_form', function(e) {
		e.preventDefault();
		let note = $('main #note_input').val();
		
		$.ajax({
			type: "POST",
			url: "./includes/inc_modifyItem.php",
			data: {note, type: "modifyUpdate"},
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
					loadInventory();
				}
				else if(e.code == 2) {
					$('body #alert_success').addClass('alertShow tw-flex');
					$('body #alert_success').removeClass('tw-hidden');
					$('body #alert_success_text').html(e.msg);
					setTimeout(()=>{
						$('body #alert_success').removeClass('alertShow tw-flex');
						$('body #alert_success').addClass('tw-hidden');
					},3000);
					loadInventory();
				}
			}
		});
	});

	$('main').on('click', '#changeAll_btn', function() {
		let id = $(this).attr('data-ref');
		
		$.ajax({
			type: "POST",
			url: "./includes/inc_modifyItem.php",
			data: {id, type: "modifyCall"},
			cache: false,
			dataType: "json",
			success: function(e) {
				$('main #changeAll_name').val(e.name);
				$('main #changeAll_category').val(e.cat);
				$('main #changeAll_qty').val(e.qty);
				$('main #changeAll_note').val(e.note);
			}
		});
	});
	$('main').on('submit', '#changeAll_form', function(e) {
		e.preventDefault();
		let data = $('main #changeAll_form').serialize();
		let formData = new FormData();
		formData.append('data', data);
		formData.append('type', 'modifyUpdate');
		
		$.ajax({
			type: "POST",
			url: "./includes/inc_modifyItem.php",
			data: formData,
			cache: false,
			dataType: "json",
			contentType: false,
               processData: false,
			success: function(e) {
				if(e.code == 1) {
					$('body #alert_warning').addClass('alertShow tw-flex');
					$('body #alert_warning').removeClass('tw-hidden');
					$('body #alert_warning_text').html(e.msg);
					setTimeout(()=>{
						$('body #alert_warning').removeClass('alertShow tw-flex');
						$('body #alert_warning').addClass('tw-hidden');
					},3000);
					loadInventory();
				}
				else if(e.code == 2) {
					$('body #alert_success').addClass('alertShow tw-flex');
					$('body #alert_success').removeClass('tw-hidden');
					$('body #alert_success_text').html(e.msg);
					setTimeout(()=>{
						$('body #alert_success').removeClass('alertShow tw-flex');
						$('body #alert_success').addClass('tw-hidden');
					},3000);
					loadInventory();
				}
			}
		});
	});
});

