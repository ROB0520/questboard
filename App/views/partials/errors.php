<?php if (isset($errors) && !empty($errors)) : ?>
	<div class="space-y-4 mb-6">
		<?php foreach ($errors as $error) : ?>
			<div class="rounded-2xl border border-red-500/20 bg-red-500/10 backdrop-blur-md p-4 shadow-lg">
				<div class="flex items-start gap-3">
					<div class="mt-1 text-red-300"> <i class="fa-solid fa-circle-exclamation"></i> </div>
					<div>
						<h3 class="font-semibold text-red-200"> Quest Validation Failed </h3>
						<p class="text-red-100/80 mt-1"> <?= $error ?> </p>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>