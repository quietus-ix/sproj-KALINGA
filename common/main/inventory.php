<?php
	require_once '../php/dbh_inc.php';
?>

<div class="flex w-full h-full relative z-0">

	<!-- loading animation -->

	<div class="main-controls flex flex-col h-full w-[13%] border-e-2 border-gray-300 p-3">

		<div x-data="{ isOpen: false }" class="relative inline-block">
			<!-- Dropdown toggle button -->
			<button @click="isOpen = !isOpen" class="relative z-10 flex items-center w-full py-2 px-3 text-primary bg-quatenary border border-transparent rounded-md focus:border-secondary focus:ring-opacity-40 focus:ring-secondary focus:ring focus:outline-none capitalize font-medium">
				<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512" class="w-5 h-5 me-2 text-primary">
					<path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/>
				</svg>
				new
			</button>

			<!-- Dropdown menu -->
			<div x-show="isOpen" 
			@click.away="isOpen = false" x-transition:enter="transition ease-out duration-100" 
			x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100" 
			x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="absolute left-0 z-20 w-48 py-2 mt-2 origin-top-left bg-primary rounded-md shadow-xl">

				<a href="#" onclick="addItem_modal.showModal()" class="flex items-center px-4 py-3 text-sm text-quatenary capitalize transition-colors duration-300 transform hover:bg-gray-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512" class="w-5 h-5 me-2 text-tertiary">
						<path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384v38.6C310.1 219.5 256 287.4 256 368c0 59.1 29.1 111.3 73.7 143.3c-3.2 .5-6.4 .7-9.7 .7H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zm48 96a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm16 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v48H368c-8.8 0-16 7.2-16 16s7.2 16 16 16h48v48c0 8.8 7.2 16 16 16s16-7.2 16-16V384h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H448V304z"/>
					</svg>
					new item
				</a>
				<!-- add item modal -->
					<dialog id="addItem_modal" class="modal">
						<div id="addItem_modal_container" class="modal-box rounded-md bg-primary">
							<form method="dialog">
								<button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
							</form>
							<h3 class="font-[Questrial] text-lg">Add a donation item</h3>
							<hr class="border border-gray-200 my-2">
							<form id="addItem_form" class="form-control w-full mt-5 gap-5">							            
			
								<div>
									<label for="addItem_name" class="block text-sm text-tertiary">Item name</label>

									<input name="addItem_name" type="text" placeholder="Give it a name" class="block mt-2 w-full placeholder-gray-400/70 border-b-2 border-quatenary bg-transparent px-5 py-2.5 text-quatenary focus:border-b-secondary focus:outline-none" />
								</div>

								<div>
									<label for="addItem_category" class="block text-sm text-tertiary">Item category</label>

									<select id="trigger_category" name="addItem_category" class="block mt-2 w-full border-b-2 border-quatenary bg-transparent px-5 py-2.5 text-quatenary focus:border-b-secondary focus:outline-none">
										<?php
											$query = mysqli_query($conn, "SELECT * FROM tb_prtype WHERE ipt_id != 'null'");

											while($data = mysqli_fetch_array($query)) {
										?>
										<option value="<?php echo $data['ipt_id']?>"><?php echo $data['ipt_type']?></option>
										<?php } ?>
									</select>
								</div>

								<div>
									<label for="addItem_qty" class="block text-sm text-tertiary">
										<span id="metric_name" class="capitalize">quantity</span>
										<span id="metric_abbv">(qty)</span>
									</label>

									<input name="addItem_qty" type="number" min="1" placeholder="Enter amount" class="block mt-2 w-full placeholder-gray-400/70 border-b-2 border-quatenary bg-transparent px-5 py-2.5 text-quatenary focus:border-b-secondary focus:outline-none" />
								</div>

								<div>
									<label for="note" class="block text-sm text-tertiary capitalize">notes</label>

									<textarea name="addItem_note" placeholder="Is there anything to take note about this item?" class="block mt-2 w-full  placeholder-gray-400/70 rounded-md border border-gray-200 bg-gray-200 px-4 h-32 py-2.5 text-quatenary focus:border-secondary focus:outline-none"></textarea>
								</div>

								<div class="flex items-center gap-4 mt-3">
									<button type="reset" class="w-1/5 px-4 py-2 mt-2 text-sm font-medium tracking-wide text-quatenary capitalize transition-colors duration-300 transform border border-gray-400 rounded-md sm:mt-0 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-tertiary focus:ring-opacity-40">
										Reset
									</button>

									<button type="submit" class="w-4/5 px-4 py-2 text-sm font-medium tracking-wide text-primary capitalize transition-colors duration-300 transform bg-secondary rounded-md hover:bg-orange-400 focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-40">
										Add
									</button>
								</div>

							</form>
						</div>
					</dialog>
				<!-- end -->

				<a href="#" onclick="addCategory_modal.showModal()" class="flex items-center px-4 py-3 text-sm text-quatenary capitalize transition-colors duration-300 transform hover:bg-gray-200">
					<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512" class="w-5 h-5 me-2 text-tertiary">
						<path d="M512 416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H192c20.1 0 39.1 9.5 51.2 25.6l19.2 25.6c6 8.1 15.5 12.8 25.6 12.8H448c35.3 0 64 28.7 64 64V416zM232 376c0 13.3 10.7 24 24 24s24-10.7 24-24V312h64c13.3 0 24-10.7 24-24s-10.7-24-24-24H280V200c0-13.3-10.7-24-24-24s-24 10.7-24 24v64H168c-13.3 0-24 10.7-24 24s10.7 24 24 24h64v64z"/>
					</svg>
					new category
				</a>
				<!-- add category modal -->
					<dialog id="addCategory_modal" class="modal">
						<div id="addCategory_modal_container" class="modal-box rounded-md bg-primary">
							<form method="dialog">
								<button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
							</form>
							<h3 class="font-[Questrial] text-lg">Add an item category</h3>
							<hr class="border border-gray-200 my-2">
							<form id="addCategory_form" class="form-control w-full mt-5 gap-3">				            
			
								<div>
									<label for="addCat_name" class="block text-sm text-tertiary">Category name</label>

									<input name="addCat_name" type="text" placeholder="Give it a name" class="block mt-2 w-full placeholder-gray-400/70 border-b-2 border-quatenary bg-transparent px-5 py-2.5 text-quatenary focus:border-b-secondary focus:outline-none" />
								</div>

								<div class="flex gap-4 w-full">
									<div class="w-4/5">
										<label for="addCat_metric" class="block text-sm text-tertiary">Category Metric</label>

										<input name="addCat_metric" type="text" placeholder="Is it per pack or what?" class="block mt-2 w-full placeholder-gray-400/70 border-b-2 border-quatenary bg-transparent px-5 py-2.5 text-quatenary focus:border-b-secondary focus:outline-none" />
									</div>

									<div class="w-1/5">
										<label for="addCat_metricabbv" class="block text-sm text-tertiary">
											<span class="capitalize">Abbrivation</span>
										</label>

										<input name="addCat_metricabbv" type="text" class="block mt-2 w-full placeholder-gray-400/70 border-b-2 border-quatenary bg-transparent px-5 py-2.5 text-quatenary focus:border-b-secondary focus:outline-none" />
									</div>
								</div>

								<div class="flex items-center gap-4 mt-3">
									<button type="reset" class="w-1/5 px-4 py-2 mt-2 text-sm font-medium tracking-wide text-quatenary capitalize transition-colors duration-300 transform border border-gray-400 rounded-md sm:mt-0 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-tertiary focus:ring-opacity-40">
										Reset
									</button>

									<button type="submit" class="w-4/5 px-4 py-2 text-sm font-medium tracking-wide text-primary capitalize transition-colors duration-300 transform bg-secondary rounded-md hover:bg-orange-400 focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-40">
										Add
									</button>
								</div>

							</form>
						</div>
					</dialog>
				<!-- end -->
			</div>
		</div>

		<hr class="border border-gray-300 my-3">

		<div id="inv_tab" class="w-full flex items-center bg-secondary rounded-lg py-2 px-3 cursor-pointer my-1">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" class="w-4 h-4 me-2 text-primary tabflex">
				<path d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z"/>
			</svg>
			<a href="#" class="capitalize text-base text-primary tabflex">items</a>
		</div>

		<div id="cat_tab" class="w-full flex items-center hover:bg-gray-200 rounded-lg py-2 px-3 cursor-pointer my-1">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="w-4 h-4 me-2 text-quatenary">
				<path d="M64 480H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H288c-10.1 0-19.6-4.7-25.6-12.8L243.2 57.6C231.1 41.5 212.1 32 192 32H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64z"/>
			</svg>
			<a href="#" class="capitalize text-base text-quatenary">category</a>
		</div>

		<div id="pack_tab" class="w-full flex items-center hover:bg-gray-200 rounded-lg py-2 px-3 cursor-pointer my-1">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="w-4 h-4 me-2 text-quatenary">
				<path d="M50.7 58.5L0 160H208V32H93.7C75.5 32 58.9 42.3 50.7 58.5zM240 160H448L397.3 58.5C389.1 42.3 372.5 32 354.3 32H240V160zm208 32H0V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192z"/>
			</svg>
			<a href="#" class="capitalize text-base text-quatenary">packages</a>
		</div>
	</div>

	<div class="h-full w-full py-2 px-3">

		<table id="inv_tbl" class="w-full stripe display compact">
			<thead class="">
				<tr class="">
					<th>Name</th>
					<th>Type</th>
					<th>Quantity</th>
					<th>Status</th>
					<th></th>
				</tr>
			</thead>

			<tbody class="">
				<?php
					$query = mysqli_query($conn, "SELECT * FROM tb_inventory AS a INNER JOIN tb_prtype AS b ON a.inv_prtype = b.ipt_id");

					foreach ($query as $data) {
				?>
					<tr id="tr_<?php echo $data['inv_id'] ?>" class="group/row hover:bg-gray-200">
						<td class=""><?php echo $data['inv_product']; ?> </td>
						<td class=""><?php echo $data['ipt_type'] ?></td>
						<td class=""><?php echo $data['inv_qty'] . ' ' . $data['ipt_metricAbbv'] ?></td>
						<td class="">
							<a href="#" id="note_btn" onclick="note_modal.showModal()" class="tooltip tooltip-bottom <?php if(empty($data['inv_note'])) {echo 'hidden';} ?>" data-tip="<?php echo $data['inv_note'] ?>" data-ref="<?php echo $data['inv_id'] ?>">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" stroke="currentColor" class="w-4 h-4 text-quatenary">
									<path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H288V368c0-26.5 21.5-48 48-48H448V96c0-35.3-28.7-64-64-64H64zM448 352H402.7 336c-8.8 0-16 7.2-16 16v66.7V480l32-32 64-64 32-32z"/>
								</svg>
							</a>
						</td>
						<td>
							<div class="flex items-center gap-4 invisible group-hover/row:visible">
								
								<button 
									id="rename_btn" 
									onclick="rename_modal.showModal()" 
									class="w-max h-max p-3 tooltip tooltip-bottom" 
									data-tip="Rename" 
									data-ref="<?php echo $data['inv_id'] ?>"
								>
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" stroke="currentColor" class="w-4 h-4 text-quatenary">
										<path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/>
									</svg>
								</button>

								<button 
									id="changeCat_btn" 
									onclick="changeCat_modal.showModal()" 
									class="w-max h-max p-3 tooltip tooltip-bottom" 
									data-tip="Change category" 
									data-ref="<?php echo $data['inv_id'] ?>"
								>
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" stroke="currentColor" class="w-4 h-4 text-quatenary">
										<path d="M64 480H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H288c-10.1 0-19.6-4.7-25.6-12.8L243.2 57.6C231.1 41.5 212.1 32 192 32H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64z"/>
									</svg>
								</button>

								<button 
									id="editQty" 
									onclick="qty_modal.showModal()" 
									class="w-max h-max p-3 tooltip tooltip-bottom"
									data-tip="Increase/reduce quantity"
									data-ref="<?php echo $data['inv_id'] ?>"
								>
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" stroke="currentColor" class="w-4 h-4 text-quatenary">
										<path d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z"/>
									</svg>
								</button>	

								<button 
									id="changeAll_btn" 
									onclick="changeAll_modal.showModal()" 
									class="w-max h-max p-3 tooltip tooltip-bottom"
									data-tip="Change all"
									data-ref="<?php echo $data['inv_id'] ?>"
								>
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" stroke="currentColor" class="w-4 h-4 text-quatenary">
										<path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
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

<!-- rename item name modal -->
	<dialog id="rename_modal" class="modal">
		<div id="rename_modal_container" class="modal-box rounded-md bg-primary">
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
			</form>
			<h3 class="font-[Questrial] text-lg">Rename item</h3>
			<hr class="border border-gray-200 my-2">
			<form id="rename_form" class="form-control w-full mt-5 gap-3">				            

				<div>
					<label for="rename_name" class="block text-sm text-tertiary">Item name</label>
					<input id="rename_name" type="text" placeholder="Give it a name" class="block mt-2 w-full placeholder-gray-400/70 border-b-2 border-quatenary bg-transparent px-5 py-2.5 text-quatenary focus:border-b-secondary focus:outline-none" />
				</div>

				<div class="flex items-center gap-4 mt-3">
					<button type="reset" class="w-1/5 px-4 py-2 mt-2 text-sm font-medium tracking-wide text-quatenary capitalize transition-colors duration-300 transform border border-gray-400 rounded-md sm:mt-0 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-tertiary focus:ring-opacity-40">
						Reset
					</button>

					<button type="submit" class="w-4/5 px-4 py-2 text-sm font-medium tracking-wide text-primary capitalize transition-colors duration-300 transform bg-secondary rounded-md hover:bg-orange-400 focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-40">
						Rename
					</button>
				</div>

			</form>
		</div>
	</dialog>
<!-- end -->

<!-- change item category modal -->
	<dialog id="changeCat_modal" class="modal">
		<div id="changeCat_modal_container" class="modal-box rounded-md bg-primary">
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
			</form>
			<h3 class="font-[Questrial] text-lg">Change item category</h3>
			<hr class="border border-gray-200 my-2">
			<form id="changeCat_form" class="form-control w-full mt-5 gap-3">				            
				<div>
					<select id="changeCat" class="block mt-2 w-full border-b-2 border-quatenary bg-transparent px-5 py-2.5 text-quatenary focus:border-b-secondary focus:outline-none">
						<?php
							$query = mysqli_query($conn, "SELECT * FROM tb_prtype WHERE ipt_id != 'null'");

							foreach ($query as $row) {
						?>
						<option 
							value="<?php echo $row['ipt_id']?>"
						>
							<?php echo $row['ipt_type']?>
						</option>
						<?php } ?>
					</select>
				</div>

				<div class="flex items-center gap-4 mt-3">
					<button type="reset" class="w-1/5 px-4 py-2 mt-2 text-sm font-medium tracking-wide text-quatenary capitalize transition-colors duration-300 transform border border-gray-400 rounded-md sm:mt-0 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-tertiary focus:ring-opacity-40">
						Reset
					</button>

					<button type="submit" class="w-4/5 px-4 py-2 text-sm font-medium tracking-wide text-primary capitalize transition-colors duration-300 transform bg-secondary rounded-md hover:bg-orange-400 focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-40">
						Change
					</button>
				</div>

			</form>
		</div>
	</dialog>
<!-- end -->

<!-- change qty modal -->
	<dialog id="qty_modal" class="modal">
		<div id="qty_modal_container" class="modal-box rounded-md bg-primary w-1/6">
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
			</form>
			<h3 id="qty_header" class="font-[Questrial] text-lg">Change </h3>
			<hr class="border border-gray-200 my-2">
			<form id="qty_form" class="form-control w-full mt-5 gap-3">				            

				<div>
					<label id="qty_label" for="qty_amount" class="block text-sm text-tertiary">placeholder</label>
					<input id="qty_amount" min="1" type="number" class="block mt-2 w-full placeholder-gray-400/70 border-b-2 border-quatenary bg-transparent px-5 py-2.5 text-quatenary focus:border-b-secondary focus:outline-none" />
				</div>

				<div class="flex items-center gap-4 mt-3">
					<button type="reset" class="w-1/5 p-2 flex justify-center items-center mt-2 text-sm font-medium tracking-wide text-quatenary transition-colors duration-300 transform border border-gray-400 rounded-md sm:mt-0 hover:bg-gray-200 focus:outline-none focus:ring focus:ring-tertiary focus:ring-opacity-40">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-quatenary">
							<path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
						</svg>
					</button>

					<button type="submit" class="w-4/5 px-4 py-2 text-sm font-medium tracking-wide text-primary capitalize transition-colors duration-300 transform bg-secondary rounded-md hover:bg-orange-400 focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-40">
						Save
					</button>
				</div>
			</form>
		</div>
	</dialog>
<!-- end -->

<!-- edit note modal -->
	<dialog id="note_modal" class="modal">
		<div id="note_modal_container" class="modal-box rounded-md bg-primary">
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
			</form>
			<h3 class="font-[Questrial] text-lg">Note</h3>
			<hr class="border border-gray-200 my-2">
			<form id="note_form" class="form-control w-full mt-5 gap-3">				            

				<div>
					<textarea id="note_input" class="block mt-2 w-full  placeholder-gray-400/70 rounded-md border border-gray-200 bg-gray-200 px-4 h-32 py-2.5 text-quatenary focus:border-secondary focus:outline-none"></textarea>
				</div>

				<div class="flex items-center gap-4 mt-3">
					<button type="reset" class="w-1/5 p-2 flex justify-center items-center mt-2 text-sm font-medium tracking-wide text-quatenary transition-colors duration-300 transform border border-gray-400 rounded-md sm:mt-0 hover:bg-gray-200 focus:outline-none focus:ring focus:ring-tertiary focus:ring-opacity-40">
						Reset
					</button>

					<button type="submit" class="w-4/5 px-4 py-2 text-sm font-medium tracking-wide text-primary capitalize transition-colors duration-300 transform bg-secondary rounded-md hover:bg-orange-400 focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-40">
						Edit
					</button>
				</div>
			</form>
		</div>
	</dialog>
<!-- end -->

<!-- change all modal -->
	<dialog id="changeAll_modal" class="modal">
		<div id="changeAll_modal_container" class="modal-box rounded-md bg-primary">
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
			</form>
			<h3 class="font-[Questrial] text-lg">Modify donation item</h3>
			<hr class="border border-gray-200 my-2">
			<form id="changeAll_form" class="form-control w-full mt-5 gap-5">							            

				<div>
					<label for="changeAll_name" class="block text-sm text-tertiary">Item name</label>

					<input id="changeAll_name" name="changeAll_name" type="text" class="block mt-2 w-full placeholder-gray-400/70 border-b-2 border-quatenary bg-transparent px-5 py-2.5 text-quatenary focus:border-b-secondary focus:outline-none" />
				</div>

				<div>
					<label for="changeAll_category" class="block text-sm text-tertiary">Item category</label>

					<select id="changeAll_category" name="changeAll_category" class="trigger_category block mt-2 w-full border-b-2 border-quatenary bg-transparent px-5 py-2.5 text-quatenary focus:border-b-secondary focus:outline-none">
						<?php
							$query = mysqli_query($conn, "SELECT * FROM tb_prtype WHERE ipt_id != 'null'");

							while($data = mysqli_fetch_array($query)) {
						?>
						<option value="<?php echo $data['ipt_id']?>"><?php echo $data['ipt_type']?></option>
						<?php } ?>
					</select>
				</div>

				<div>
					<label for="changeAll_qty" class="block text-sm text-tertiary">
						<span id="metric_name" class="capitalize">quantity</span>
						<span id="metric_abbv">(qty)</span>
					</label>

					<input id="changeAll_qty" name="changeAll_qty" type="number" min="1" placeholder="Enter amount" class="block mt-2 w-full placeholder-gray-400/70 border-b-2 border-quatenary bg-transparent px-5 py-2.5 text-quatenary focus:border-b-secondary focus:outline-none" />
				</div>

				<div>
					<label for="note" class="block text-sm text-tertiary capitalize">notes</label>

					<textarea id="changeAll_note" name="changeAll_note" placeholder="Is there anything to take note about this item?" class="block mt-2 w-full  placeholder-gray-400/70 rounded-md border border-gray-200 bg-gray-200 px-4 h-32 py-2.5 text-quatenary focus:border-secondary focus:outline-none"></textarea>
				</div>

				<div class="flex items-center gap-4 mt-3">
					<button type="reset" class="w-1/5 px-4 py-2 mt-2 text-sm font-medium tracking-wide text-quatenary capitalize transition-colors duration-300 transform border border-gray-400 rounded-md sm:mt-0 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-tertiary focus:ring-opacity-40">
						Reset
					</button>

					<button type="submit" class="w-4/5 px-4 py-2 text-sm font-medium tracking-wide text-primary capitalize transition-colors duration-300 transform bg-secondary rounded-md hover:bg-orange-400 focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-40">
						Save
					</button>
				</div>

			</form>
		</div>
	</dialog>
<!-- end -->