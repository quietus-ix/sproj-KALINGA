<?php
	require_once '../php/dbh_inc.php';
?>

<div class="tw-flex tw-w-full tw-h-full tw-relative tw-z-0">

	<div class="main-controls tw-flex tw-flex-col tw-h-full tw-w-[13%] tw-border-e-2 tw-border-gray-300 tw-p-3">

		<div x-data="{ isOpen: false }" class="tw-relative tw-inline-block">
			<!-- Dropdown toggle button -->
			<button @click="isOpen = !isOpen" class="tw-relative tw-z-10 tw-flex tw-items-center tw-w-full tw-py-2 tw-px-3 tw-text-primary tw-bg-quatenary tw-border tw-border-transparent tw-rounded-md focus:tw-border-secondary focus:tw-ring-opacity-40 focus:tw-ring-secondary focus:tw-ring focus:tw-outline-none tw-capitalize tw-font-medium">
				<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512" class="tw-w-5 tw-h-5 tw-me-2 tw-text-primary">
					<path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/>
				</svg>
				new
			</button>

			<!-- Dropdown menu -->
			<div x-show="isOpen" 
			@click.away="isOpen = false" x-transition:enter="tw-transition tw-ease-out tw-duration-100" 
			x-transition:enter-start="tw-opacity-0 tw-scale-90" x-transition:enter-end="tw-opacity-100 tw-scale-100" x-transition:leave="tw-transition tw-ease-in tw-duration-100" 
			x-transition:leave-start="tw-opacity-100 tw-scale-100" x-transition:leave-end="tw-opacity-0 tw-scale-90" class="tw-absolute tw-left-0 tw-z-20 tw-w-48 tw-py-2 tw-mt-2 tw-origin-top-left tw-bg-primary tw-rounded-md tw-shadow-xl">

				<a href="#" onclick="addItem_modal.showModal()" class="tw-flex tw-items-center tw-px-4 tw-py-3 tw-text-sm tw-text-quatenary tw-capitalize tw-transition-colors tw-duration-300 tw-transform hover:tw-bg-gray-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512" class="tw-w-5 tw-h-5 tw-me-2 tw-text-tertiary">
						<path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384v38.6C310.1 219.5 256 287.4 256 368c0 59.1 29.1 111.3 73.7 143.3c-3.2 .5-6.4 .7-9.7 .7H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zm48 96a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm16 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v48H368c-8.8 0-16 7.2-16 16s7.2 16 16 16h48v48c0 8.8 7.2 16 16 16s16-7.2 16-16V384h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H448V304z"/>
					</svg>
					new item
				</a>
				<!-- add item modal -->
					<dialog id="addItem_modal" class="tw-modal">
						<div id="addItem_modal_container" class="tw-modal-box tw-rounded-md tw-bg-primary">
							<form method="dialog">
								<button class="tw-btn tw-btn-sm tw-btn-circle tw-btn-ghost tw-absolute tw-right-2 tw-top-2">✕</button>
							</form>
							<h3 class="tw-font-[Questrial] tw-text-lg">Add a donation item</h3>
							<hr class="tw-border tw-border-gray-200 tw-my-2">
							<form id="addItem_form" class="tw-form-control w-full max-w-xs tw-mt-5 tw-gap-5">							            
			
								<div>
									<label for="addItem_name" class="tw-block tw-text-sm tw-text-tertiary">Item name</label>

									<input name="addItem_name" type="text" placeholder="Give it a name" class="tw-block tw-mt-2 tw-w-full tw-placeholder-gray-400/70 tw-border-b-2 tw-border-quatenary tw-bg-transparent tw-px-5 tw-py-2.5 tw-text-quatenary focus:tw-border-b-secondary focus:tw-outline-none" />
								</div>

								<div>
									<label for="addItem_category" class="tw-block tw-text-sm tw-text-tertiary">Item category</label>

									<select id="trigger_category" name="addItem_category" class="tw-block tw-mt-2 tw-w-full tw-border-b-2 tw-border-quatenary tw-bg-transparent tw-px-5 tw-py-2.5 tw-text-quatenary focus:tw-border-b-secondary focus:tw-outline-none">
										<?php
											$query = mysqli_query($conn, "SELECT * FROM tb_prtype WHERE ipt_id != 'null'");

											while($data = mysqli_fetch_array($query)) {
										?>
										<option value="<?php echo $data['ipt_id']?>"><?php echo $data['ipt_type']?></option>
										<?php } ?>
									</select>
								</div>

								<div>
									<label for="addItem_qty" class="tw-block tw-text-sm tw-text-tertiary">
										<span id="metric_name" class="tw-capitalize">quantity</span>
										<span id="metric_abbv">(qty)</span>
									</label>

									<input name="addItem_qty" type="number" min="1" placeholder="Enter amount" class="tw-block tw-mt-2 tw-w-full tw-placeholder-gray-400/70 tw-border-b-2 tw-border-quatenary tw-bg-transparent tw-px-5 tw-py-2.5 tw-text-quatenary focus:tw-border-b-secondary focus:tw-outline-none" />
								</div>

								<div>
									<label for="note" class="tw-block tw-text-sm tw-text-tertiary tw-capitalize">notes</label>

									<textarea name="addItem_note" placeholder="Is there anything to take note about this item?" class="tw-block tw-mt-2 tw-w-full  tw-placeholder-gray-400/70 tw-rounded-md tw-border tw-tw-border-gray-200 tw-bg-gray-200 tw-px-4 tw-h-32 tw-py-2.5 tw-text-quatenary focus:tw-border-secondary focus:tw-outline-none"></textarea>
								</div>

								<div class="tw-flex tw-items-center tw-gap-4 tw-mt-3">
									<button type="reset" class="tw-w-1/5 tw-px-4 tw-py-2 tw-mt-2 tw-text-sm tw-font-medium tw-tracking-wide tw-text-quatenary tw-capitalize tw-transition-colors tw-duration-300 tw-transform tw-border tw-border-gray-400 tw-rounded-md sm:tw-mt-0 hover:tw-bg-gray-100 focus:tw-outline-none focus:tw-ring focus:tw-ring-tertiary focus:tw-ring-opacity-40">
										Reset
									</button>

									<button type="submit" class="tw-w-4/5 tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-tracking-wide tw-text-primary tw-capitalize tw-transition-colors tw-duration-300 tw-transform tw-bg-secondary tw-rounded-md hover:tw-bg-orange-400 focus:tw-outline-none focus:tw-ring focus:tw-ring-secondary focus:tw-ring-opacity-40">
										Add
									</button>
								</div>

							</form>
						</div>
					</dialog>
				<!-- end -->

				<a href="#" onclick="addCategory_modal.showModal()" class="tw-flex tw-items-center tw-px-4 tw-py-3 tw-text-sm tw-text-quatenary tw-capitalize tw-transition-colors tw-duration-300 tw-transform hover:tw-bg-gray-200">
					<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512" class="tw-w-5 tw-h-5 tw-me-2 tw-text-tertiary">
						<path d="M512 416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H192c20.1 0 39.1 9.5 51.2 25.6l19.2 25.6c6 8.1 15.5 12.8 25.6 12.8H448c35.3 0 64 28.7 64 64V416zM232 376c0 13.3 10.7 24 24 24s24-10.7 24-24V312h64c13.3 0 24-10.7 24-24s-10.7-24-24-24H280V200c0-13.3-10.7-24-24-24s-24 10.7-24 24v64H168c-13.3 0-24 10.7-24 24s10.7 24 24 24h64v64z"/>
					</svg>
					new category
				</a>
				<!-- add category modal -->
					<dialog id="addCategory_modal" class="tw-modal">
						<div id="addCategory_modal_container" class="tw-modal-box tw-rounded-md tw-bg-primary">
							<form method="dialog">
								<button class="tw-btn tw-btn-sm tw-btn-circle tw-btn-ghost tw-absolute tw-right-2 tw-top-2">✕</button>
							</form>
							<h3 class="tw-font-[Questrial] tw-text-lg">Add an item category</h3>
							<hr class="tw-border tw-border-gray-200 tw-my-2">
							<form id="addCategory_form" class="tw-form-control w-full tw-mt-5 tw-gap-3">				            
			
								<div>
									<label for="addCat_name" class="tw-block tw-text-sm tw-text-tertiary">Category name</label>

									<input name="addCat_name" type="text" placeholder="Give it a name" class="tw-block tw-mt-2 tw-w-full tw-placeholder-gray-400/70 tw-border-b-2 tw-border-quatenary tw-bg-transparent tw-px-5 tw-py-2.5 tw-text-quatenary focus:tw-border-b-secondary focus:tw-outline-none" />
								</div>

								<div class="tw-flex tw-gap-4 tw-w-full">
									<div class="tw-w-4/5">
										<label for="addCat_metric" class="tw-block tw-text-sm tw-text-tertiary">Category Metric</label>

										<input name="addCat_metric" type="text" placeholder="Is it per pack or what?" class="tw-block tw-mt-2 tw-w-full tw-placeholder-gray-400/70 tw-border-b-2 tw-border-quatenary tw-bg-transparent tw-px-5 tw-py-2.5 tw-text-quatenary focus:tw-border-b-secondary focus:tw-outline-none" />
									</div>

									<div class="tw-w-1/5">
										<label for="addCat_metricabbv" class="tw-block tw-text-sm tw-text-tertiary">
											<span class="tw-capitalize">Abbrivation</span>
										</label>

										<input name="addCat_metricabbv" type="text" class="tw-block tw-mt-2 tw-w-full tw-placeholder-gray-400/70 tw-border-b-2 tw-border-quatenary tw-bg-transparent tw-px-5 tw-py-2.5 tw-text-quatenary focus:tw-border-b-secondary focus:tw-outline-none" />
									</div>
								</div>

								<div class="tw-flex tw-items-center tw-gap-4 tw-mt-3">
									<button type="reset" class="tw-w-1/5 tw-px-4 tw-py-2 tw-mt-2 tw-text-sm tw-font-medium tw-tracking-wide tw-text-quatenary tw-capitalize tw-transition-colors tw-duration-300 tw-transform tw-border tw-border-gray-400 tw-rounded-md sm:tw-mt-0 hover:tw-bg-gray-100 focus:tw-outline-none focus:tw-ring focus:tw-ring-tertiary focus:tw-ring-opacity-40">
										Reset
									</button>

									<button type="submit" class="tw-w-4/5 tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-tracking-wide tw-text-primary tw-capitalize tw-transition-colors tw-duration-300 tw-transform tw-bg-secondary tw-rounded-md hover:tw-bg-orange-400 focus:tw-outline-none focus:tw-ring focus:tw-ring-secondary focus:tw-ring-opacity-40">
										Add
									</button>
								</div>

							</form>
						</div>
					</dialog>
				<!-- end -->
			</div>
		</div>

		<hr class="tw-border tw-border-gray-300 tw-my-3">

		<div id="inv_tab" class="tw-w-full tw-flex tw-items-center hover:tw-bg-gray-200 tw-rounded-lg tw-py-2 tw-px-3 tw-cursor-pointer tw-my-1">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" class="tw-w-4 tw-h-4 tw-me-2 tw-text-quatenary">
				<path d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z"/>
			</svg>
			<a href="#" class="tw-capitalize tw-text-base tw-text-quatenary">items</a>
		</div>

		<div id="cat_tab" class="tw-w-full tw-flex tw-items-center tw-bg-secondary  tw-rounded-lg tw-py-2 tw-px-3 tw-cursor-pointer tw-my-1">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="tw-w-4 tw-h-4 tw-me-2 tw-text-primary tabflex">
				<path d="M88.7 223.8L0 375.8V96C0 60.7 28.7 32 64 32H181.5c17 0 33.3 6.7 45.3 18.7l26.5 26.5c12 12 28.3 18.7 45.3 18.7H416c35.3 0 64 28.7 64 64v32H144c-22.8 0-43.8 12.1-55.3 31.8zm27.6 16.1C122.1 230 132.6 224 144 224H544c11.5 0 22 6.1 27.7 16.1s5.7 22.2-.1 32.1l-112 192C453.9 474 443.4 480 432 480H32c-11.5 0-22-6.1-27.7-16.1s-5.7-22.2 .1-32.1l112-192z"/>
			</svg>
			<a href="#" class="tw-capitalize tw-text-base tw-text-primary tabflex">category</a>
		</div>

		<div id="pack_tab" class="tw-w-full tw-flex tw-items-center hover:tw-bg-gray-200 tw-rounded-lg tw-py-2 tw-px-3 tw-cursor-pointer tw-my-1">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="tw-w-4 tw-h-4 tw-me-2 tw-text-quatenary">
				<path d="M50.7 58.5L0 160H208V32H93.7C75.5 32 58.9 42.3 50.7 58.5zM240 160H448L397.3 58.5C389.1 42.3 372.5 32 354.3 32H240V160zm208 32H0V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192z"/>
			</svg>
			<a href="#" class="tw-capitalize tw-text-base tw-text-quatenary">packages</a>
		</div>
	</div>

	<div class="tw-h-full tw-w-full tw-py-2 tw-px-3">

		<table id="cat_tbl" class="tw-w-full stripe display compact">
			<thead class="">
				<tr class="">
					<th>ID</th>
					<th>Category</th>
					<th>Metric</th>
					<th>Abbrivation</th>
					<th></th>
				</tr>
			</thead>

			<tbody class="">
				<?php
					$query = mysqli_query($conn, "SELECT * FROM tb_prtype WHERE ipt_id != 'null'");

					foreach ($query as $data) {
				?>
					<tr class="tw-group/row hover:tw-bg-gray-200">
						<td class=""><?php echo $data['ipt_id']; ?> </td>
						<td class=""><?php echo $data['ipt_type'] ?></td>
						<td class=""><?php echo $data['ipt_metric'] ?></td>
						<td class=""><?php echo $data['ipt_metricAbbv'] ?></td>
						<td>
							<div class="tw-flex tw-items-center tw-gap-4 tw-invisible group-hover/row:tw-visible">
								<button 
									id="renameCat_btn" 
									onclick="renameCat_modal.showModal()" 
									class="tw-w-max tw-h-max tw-p-3 tw-tooltip tw-tooltip-bottom" 
									data-tip="Rename" 
									data-ref="<?php echo $data['ipt_id'] ?>"
								>
									<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512" class="tw-w-4 tw-h-4 tw-text-tertiary">
										<path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/>
									</svg>
								</button>

								<button 
									id="changeMetric_btn" 
									onclick="changeMetric_modal.showModal()" 
									class="tw-w-max tw-h-max tw-p-3 tw-tooltip tw-tooltip-bottom" 
									data-tip="Modify metric & abbrevation" 
									data-ref="<?php echo $data['ipt_id'] ?>"
								>
									<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512" class="tw-w-4 tw-h-4 tw-text-tertiary">
										<path d="M224 96a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm122.5 32c3.5-10 5.5-20.8 5.5-32c0-53-43-96-96-96s-96 43-96 96c0 11.2 1.9 22 5.5 32H120c-22 0-41.2 15-46.6 36.4l-72 288c-3.6 14.3-.4 29.5 8.7 41.2S33.2 512 48 512H464c14.8 0 28.7-6.8 37.8-18.5s12.3-26.8 8.7-41.2l-72-288C433.2 143 414 128 392 128H346.5z"/>
									</svg>
								</button>

								<button 
									id="delCategory_btn" 
									class="tw-w-max tw-h-max tw-p-3 tw-tooltip tw-tooltip-bottom"
									data-tip="Remove"
									data-ref="<?php echo $data['ipt_id'] ?>"
								>
									<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512" class="tw-w-4 tw-h-4 tw-text-tertiary">
										<path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
									</svg>
								</button>	
							</div>
						</td>
					</tr>
				<?php } ?>
			</tbody>

			<tfoot>
				<tr>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

<!-- rename category name modal -->
	<dialog id="renameCat_modal" class="tw-modal">
		<div id="renameCat_modal_container" class="tw-modal-box tw-rounded-md tw-bg-primary">
			<form method="dialog">
				<button class="tw-btn tw-btn-sm tw-btn-circle tw-btn-ghost tw-absolute tw-right-2 tw-top-2">✕</button>
			</form>
			<h3 class="tw-font-[Questrial] tw-text-lg">Rename category</h3>
			<hr class="tw-border tw-border-gray-200 tw-my-2">
			<form id="renameCat_form" class="tw-form-control w-full tw-mt-2 tw-gap-3">				            

				<div>
					<input id="renameCat_name" type="text" class="tw-block tw-mt-2 tw-w-full tw-placeholder-gray-400/70 tw-border-b-2 tw-border-quatenary tw-bg-transparent tw-px-5 tw-py-2.5 tw-text-quatenary focus:tw-border-b-secondary focus:tw-outline-none" />
				</div>

				<div class="tw-flex tw-items-center tw-gap-4 tw-mt-3">
					<button type="reset" class="tw-w-1/5 tw-px-4 tw-py-2 tw-mt-2 tw-text-sm tw-font-medium tw-tracking-wide tw-text-quatenary tw-capitalize tw-transition-colors tw-duration-300 tw-transform tw-border tw-border-gray-400 tw-rounded-md sm:tw-mt-0 hover:tw-bg-gray-100 focus:tw-outline-none focus:tw-ring focus:tw-ring-tertiary focus:tw-ring-opacity-40">
						Reset
					</button>

					<button type="submit" class="tw-w-4/5 tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-tracking-wide tw-text-primary tw-capitalize tw-transition-colors tw-duration-300 tw-transform tw-bg-secondary tw-rounded-md hover:tw-bg-orange-400 focus:tw-outline-none focus:tw-ring focus:tw-ring-secondary focus:tw-ring-opacity-40">
						Rename
					</button>
				</div>

			</form>
		</div>
	</dialog>
<!-- end -->

<!-- modify metric modal -->
	<dialog id="changeMetric_modal" class="tw-modal">
		<div id="changeMetric_modal_container" class="tw-modal-box tw-rounded-md tw-bg-primary">
			<form method="dialog">
				<button class="tw-btn tw-btn-sm tw-btn-circle tw-btn-ghost tw-absolute tw-right-2 tw-top-2">✕</button>
			</form>
			<h3 class="tw-font-[Questrial] tw-text-lg">Modify metric</h3>
			<hr class="tw-border tw-border-gray-200 tw-my-2">
			<form id="changeMetric_form" class="tw-form-control w-full tw-mt-2 tw-gap-3">				            

				<div class="tw-flex tw-gap-4 tw-w-full">
					<div class="tw-w-4/5">
						<input id="changeMetric_name" type="text" class="tw-block tw-mt-2 tw-w-full tw-placeholder-gray-400/70 tw-border-b-2 tw-border-quatenary tw-bg-transparent tw-px-5 tw-py-2.5 tw-text-quatenary focus:tw-border-b-secondary focus:tw-outline-none" />
					</div>

					<div class="tw-w-1/5">
						<input id="changeMetric_abbv" type="text" class="tw-block tw-mt-2 tw-w-full tw-placeholder-gray-400/70 tw-border-b-2 tw-border-quatenary tw-bg-transparent tw-px-5 tw-py-2.5 tw-text-quatenary focus:tw-border-b-secondary focus:tw-outline-none" />
					</div>
				</div>

				<div class="tw-flex tw-items-center tw-gap-4 tw-mt-3">
					<button type="reset" class="tw-w-1/5 tw-px-4 tw-py-2 tw-mt-2 tw-text-sm tw-font-medium tw-tracking-wide tw-text-quatenary tw-capitalize tw-transition-colors tw-duration-300 tw-transform tw-border tw-border-gray-400 tw-rounded-md sm:tw-mt-0 hover:tw-bg-gray-100 focus:tw-outline-none focus:tw-ring focus:tw-ring-tertiary focus:tw-ring-opacity-40">
						Reset
					</button>

					<button type="submit" class="tw-w-4/5 tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-tracking-wide tw-text-primary tw-capitalize tw-transition-colors tw-duration-300 tw-transform tw-bg-secondary tw-rounded-md hover:tw-bg-orange-400 focus:tw-outline-none focus:tw-ring focus:tw-ring-secondary focus:tw-ring-opacity-40">
						Save
					</button>
				</div>

			</form>
		</div>
	</dialog>
<!-- end -->

<!-- remove category modal -->
	<dialog id="delCat_modal" class="tw-modal">
		<div id="delCat_modal_container" class="tw-modal-box tw-rounded-md tw-bg-primary">
			<h3 class="tw-font-[Questrial] tw-text-lg">Warning!</h3>
			<hr class="tw-border tw-border-gray-200 tw-my-2">
			<form id="delCat_form" class="tw-form-control w-full tw-mt-2 tw-gap-3">				            
				
				<div>
					<input type="hidden" id="delCat_id">

					<p class="tw-text-lg tw-text-quatenary">Are you sure you want to delete <span id="delCat_target" class="tw-font-medium tw-text-secondary">a</span> ? <span id="delCat_count"></span> </p>
				</div>

				<div class="tw-flex tw-items-center tw-gap-4 tw-mt-3">
					<button type="submit" class="tw-w-1/2 tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-tracking-wide tw-text-primary tw-capitalize tw-transition-colors tw-duration-300 tw-transform tw-bg-secondary tw-rounded-md hover:tw-bg-orange-400 focus:tw-outline-none focus:tw-ring focus:tw-ring-secondary focus:tw-ring-opacity-40">
						Yes
					</button>

					<button id="delCat_btn_cancel" type="button" class="tw-w-1/2 tw-px-4 tw-py-2 tw-mt-2 tw-text-sm tw-font-medium tw-tracking-wide tw-text-quatenary tw-capitalize tw-transition-colors tw-duration-300 tw-transform tw-border tw-border-gray-400 tw-rounded-md sm:tw-mt-0 hover:tw-bg-gray-100 focus:tw-outline-none focus:tw-ring focus:tw-ring-tertiary focus:tw-ring-opacity-40">
						Cancel
					</button>
				</div>

			</form>
		</div>
	</dialog>
<!-- end -->