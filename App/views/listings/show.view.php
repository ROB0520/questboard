<?php

use Framework\Authorization;

?>

<?= loadPartial('head') ?>
<?= loadPartial('navbar') ?>
<?= loadPartial('top-banner') ?>

<section class="container mx-auto p-4 mt-4">
	<?= loadPartial('message') ?>

	<div class="rounded-lg shadow-md bg-card p-3">
		<div class="flex justify-between items-center">
			<a class="block p-4" href="/listings">
				<i class="fa fa-arrow-alt-circle-left"></i>
				Return To Quest Board
			</a>
			<?php if (isset($listing) && Authorization::isOwner($listing->user_id)) : ?>
				<div class="flex space-x-4 ml-4">
					<a href="/listings/<?= $listing->id ?? "#" ?>/edit" class="px-4 py-2 bg-accent hover:brightness-90 text-white rounded">Edit Quest</a>
					<!-- Delete Form -->
					<form method="POST">
						<input type="hidden" name="_method" value="DELETE">
						<button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">Abandon Quest</button>
					</form>
					<!-- End Delete Form -->
				</div>
			<?php endif; ?>
		</div>
		<div class="p-4">
			<h2 class="text-xl font-semibold <?= !isset($listing) ? "text-red-600 italic" : "" ?>">
				<?= isset($listing) ? $listing->title : 'Job Title Not Found' ?>
			</h2>
			<p class="text-lg mt-2">
				<?= isset($listing) ? $listing->description : 'No description available for this listing.' ?>
			</p>
			<ul class="my-4 bg-background p-4 inset-shadow-sm rounded">
				<li class="mb-2"><strong>Contract Reward:</strong> <?= isset($listing) ? formatSalary($listing->salary) : 'N/A' ?></li>
				<li class="mb-2">
					<strong>Region:</strong> <?= isset($listing) ? $listing->city . ', ' . $listing->state : 'N/A' ?>
				</li>
				<?php if (!empty($listing->tags)) : ?>
					<li>
						<strong>Specializations:</strong> <?= $listing->tags ?>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</section>

<section class="container mx-auto p-4">
	<h2 class="text-xl font-semibold mb-4">Quest Information</h2>
	<div class="rounded-lg shadow-md bg-card p-4">
		<h3 class="text-lg font-semibold mb-2">
			Required Skills
		</h3>
		<p>
			<?= isset($listing) ? $listing->requirements : 'No requirements specified for this listing.' ?>
		</p>
		<h3 class="text-lg font-semibold mt-4 mb-2">Guild Rewards</h3>
		<p>
			<?= isset($listing) ? $listing->benefits : 'No benefits specified for this listing.' ?>
		</p>
	</div>
	<p class="my-5">
		Send your adventurer scroll to the guild messenger to accept this quest.
	</p>
	<!-- The Subject line of the email will be pre-filled with the job title for better context -->
	<a
		href="<?= isset($listing) ? 'mailto:' . $listing->email . '?subject=' . rawurlencode('Job Application for ' . $listing->title) : '#' ?>"
		class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer text-tag-foreground bg-tag hover:bg-primary/15 transition duration-300 <?= isset($listing) ? "" : "opacity-50 cursor-not-allowed" ?>">
		<?= isset($listing) ? "Accept Quest" : "Email Not Available" ?>
	</a>
</section>

<?= loadPartial('bottom-banner') ?>
<?= loadPartial('footer') ?>