<?= loadPartial('head') ?>
<?= loadPartial('navbar') ?>
<?= loadPartial('top-banner') ?>

<!-- Job Listings -->
<section>
	<div class="container mx-auto p-4 mt-4">
		<div class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">
			<?php if (isset($keywords)): ?>
				Quest Results for "<?= htmlspecialchars($keywords) ?>"
			<?php else: ?>
				All Available Quests
			<?php endif; ?>
		</div>

		<?= loadPartial('message') ?>

		<div class="grid grid-cols-1 md:grid-cols-[repeat(auto-fit,minmax(400px,1fr))] gap-4 mb-6">
			<?php foreach (($listings ?? []) as $listing) : ?>
				<div class="rounded-lg shadow-md bg-card">
					<div class="p-4">
						<h2 class="text-xl font-semibold"><?= $listing->title ?></h2>
						<p class="text-lg mt-2">
							<?= substr($listing->description, 0, 100) . '...' ?>
						</p>
						<ul class="my-4 bg-background p-4 rounded space-y-2 inset-shadow-sm">
							<li><strong>Contract Reward:</strong> <?= formatSalary($listing->salary) ?></li>
							<li>
								<strong>Region:</strong> <?= $listing->city ?>, <?= $listing->state ?>
							</li>
							<?php if (!empty($listing->tags)) : ?>
								<li>
									<strong>Specializations:</strong> <?= $listing->tags ?>
								</li>
							<?php endif; ?>
						</ul>
						<a href="/listings/<?= $listing->id ?>"
							class="block w-full text-center px-5 py-2.5 shadow rounded border text-base font-medium text-tag-foreground bg-tag hover:bg-primary/15 transition duration-300 row-start-last self-end">
							View Quest
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
</section>

<?= loadPartial('bottom-banner') ?>
<?= loadPartial('footer') ?>