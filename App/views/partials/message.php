<?php

use Framework\Session;

$flashSucessMsg = Session::getFlashMessage('success_msg');
$flashErrorMsg = Session::getFlashMessage('error_msg');

?>

<?php if (isset($flashSucessMsg)) : ?>
	<div class="mb-6 rounded-2xl border border-emerald-500/20 bg-emerald-500/10 backdrop-blur-md p-4 shadow-lg">
		<div class="flex items-start gap-3">
			<div class="mt-1 text-emerald-300"> <i class="fa-solid fa-shield-halved"></i> </div>
			<div>
				<h3 class="font-semibold text-emerald-200"> Guild Notice </h3>
				<p class="text-emerald-100/80 mt-1"> <?= $flashSucessMsg ?> </p>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php if (isset($flashErrorMsg)) : ?>
	<div class="mb-6 rounded-2xl border border-red-500/20 bg-red-500/10 backdrop-blur-md p-4 shadow-lg">
		<div class="flex items-start gap-3">
			<div class="mt-1 text-red-300"> <i class="fa-solid fa-triangle-exclamation"></i> </div>
			<div>
				<h3 class="font-semibold text-red-200"> Guild Warning </h3>
				<p class="text-red-100/80 mt-1"> <?= $flashErrorMsg ?> </p>
			</div>
		</div>
	</div>
<?php endif; ?>