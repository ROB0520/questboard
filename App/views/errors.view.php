<?= loadPartial('head') ?>
<?= loadPartial('navbar') ?>
<?= loadPartial('top-banner') ?>

<section class="my-16">
	<div class="container mx-auto p-4 mt-4">
		<img
			src="/gifs/skull.gif"
			alt="Error"
			class="mx-auto mb-6 w-48 h-48 drop-shadow-sm">
		<div class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">Error <?= $status ?? "404" ?></div>
		<p class="text-center text-2xl mb-4">
			<?= $message ?? "This quest has vanished beyond the kingdom borders." ?>
		</p>
		<div class="text-center">
			<a href="/" class="px-4 py-2 bg-primary hover:bg-primary/90 text-white rounded">
				Return To The Guild Hall
			</a>
		</div>
	</div>
</section>

<?= loadPartial('footer') ?>