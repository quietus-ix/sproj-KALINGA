<?php
	require_once '../php/dbh_inc.php';

	$query = $conn->prepare("SELECT bnd_id FROM tb_bundles");
	$query->execute();

	$query->store_result();

	if($query->num_rows() > 0) {
?>
<div class="flex w-full h-full relative z-0">
	here
</div>
<?php
	} else {
?>
<div class="w-full h-full flex flex-col justify-center items-center">
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"  class="text-secondary w-16 h-16 mb-2">
			<path d="M256 48c0-26.5 21.5-48 48-48H592c26.5 0 48 21.5 48 48V464c0 26.5-21.5 48-48 48H381.3c1.8-5 2.7-10.4 2.7-16V253.3c18.6-6.6 32-24.4 32-45.3V176c0-26.5-21.5-48-48-48H256V48zM571.3 347.3c6.2-6.2 6.2-16.4 0-22.6l-64-64c-6.2-6.2-16.4-6.2-22.6 0l-64 64c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L480 310.6V432c0 8.8 7.2 16 16 16s16-7.2 16-16V310.6l36.7 36.7c6.2 6.2 16.4 6.2 22.6 0zM0 176c0-8.8 7.2-16 16-16H368c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H16c-8.8 0-16-7.2-16-16V176zm352 80V480c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V256H352zM144 320c-8.8 0-16 7.2-16 16s7.2 16 16 16h96c8.8 0 16-7.2 16-16s-7.2-16-16-16H144z"/>
	</svg>
	<h1 class="text-3xl font-bold mb-4">No bundles created yet</h1>
	<button type="button" id="createBundlePromptBtn" class="btn bg-secondary hover:bg-orange-600 duration-300 text-primary uppercase">Create a bundle</button>
</div>
<?php
	}
?>