<?php
require_once '../php/dbh_inc.php';

$query = $conn->prepare("SELECT bnd_id FROM tb_bundles");
$query->execute();

$query->store_result();

$itemSel = $conn->query("SELECT inv_product FROM tb_inventory");

$bundles = $conn->query("SELECT bnd_id, bnd_name FROM tb_bundles");

if ($query->num_rows() > 0) {
?>
	<div class="flex w-full h-full relative z-0 p-5">
		<div class="bg-primary flex flex-col shadow-lg p-3 w-full rounded-lg">
			<div class="flex gap-5 items-center">
				<h1 class="text-2xl text-quatenary font-bold">Bundles</h1>
				<button type="button" id="createBundle" class="btn py-1 px-2"><i class="bi bi-plus-square text-2xl"></i></button>
			</div>
			<table id="bundleDisplay_tbl" class="rounded-none table table-zebra max-h-56">
				<thead>
					<tr>
						<th class="w-[5%]">#</th>
						<th class="w-[50%]">Bundle Name</th>
						<th class="w-35%">Items in the bundle</th>
						<th class="w-10%"></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$counter = 1;
					while ($data = $bundles->fetch_assoc()) {
					?>
						<tr class="py-3">
							<td><?php echo $counter ?></td>
							<td class="font-black"><?php echo $data['bnd_name'] ?></td>
							<td>
								<?php
								$idOfBundle = $data['bnd_id'];
								$count = $conn->query("SELECT COUNT(item_id) FROM tb_bundleitems WHERE bundle_id = '$idOfBundle'")->fetch_column();
								echo $count;
								?>
							</td>
							<td>
								<button type="button" class="editBundle_btn btn btn-neurtral" id="<?php echo $data['bnd_id'] ?>"><i class="bi bi-pencil-square"></i></button>
							</td>
						</tr>
					<?php $counter++;
					} ?>
				</tbody>
			</table>
		</div>
	</div>
<?php
} else {
?>
	<div class="w-full h-full flex flex-col justify-center items-center">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="text-secondary w-16 h-16 mb-2">
			<path d="M256 48c0-26.5 21.5-48 48-48H592c26.5 0 48 21.5 48 48V464c0 26.5-21.5 48-48 48H381.3c1.8-5 2.7-10.4 2.7-16V253.3c18.6-6.6 32-24.4 32-45.3V176c0-26.5-21.5-48-48-48H256V48zM571.3 347.3c6.2-6.2 6.2-16.4 0-22.6l-64-64c-6.2-6.2-16.4-6.2-22.6 0l-64 64c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L480 310.6V432c0 8.8 7.2 16 16 16s16-7.2 16-16V310.6l36.7 36.7c6.2 6.2 16.4 6.2 22.6 0zM0 176c0-8.8 7.2-16 16-16H368c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H16c-8.8 0-16-7.2-16-16V176zm352 80V480c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V256H352zM144 320c-8.8 0-16 7.2-16 16s7.2 16 16 16h96c8.8 0 16-7.2 16-16s-7.2-16-16-16H144z" />
		</svg>
		<h1 class="text-3xl font-bold mb-4">No bundles created yet</h1>
		<button type="button" id="createBundlePromptBtn" class="btn bg-secondary hover:bg-orange-600 duration-300 text-primary uppercase">Create a bundle</button>
	</div>
<?php
}
?>