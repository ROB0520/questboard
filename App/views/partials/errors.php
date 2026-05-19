<?php if (isset($errors) && !empty($errors)) : ?>
	<div class="space-y-4 mb-6">
		<?php foreach ($errors as $error) : ?>
			<div class="rounded-2xl border border-red-500/20 bg-red-500/10 backdrop-blur-md px-4 py-2 shadow-lg flex flex-row items-start gap-3">
				<div class="text-red-300"> <i class="fa-solid fa-circle-exclamation"></i> </div>
				<div>
					<p class="text-red-100/80"> <?= $error ?> </p>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>