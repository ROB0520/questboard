<?= loadPartial('head') ?>
<?= loadPartial('navbar') ?>
<?= loadPartial('top-banner') ?>

<section class="container mx-auto p-4 mt-4">
	<div class="rounded-lg shadow-md bg-card p-3">
		<div class="flex justify-between items-center">
			<a class="block p-4 text-link" href="/listings">
				<i class="fa fa-arrow-alt-circle-left"></i>
				Back To Listings
			</a>
			<div class="flex space-x-4 ml-4">
				<a href="/edit" class="px-4 py-2 bg-accent hover:brightness-90 text-white rounded">Edit</a>
				<!-- Delete Form -->
				<form method="POST">
					<button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">Delete</button>
				</form>
				<!-- End Delete Form -->
			</div>
		</div>
		<div class="p-4">
			<h2 class="text-xl font-semibold <?= !isset($listing) ? "text-red-600 italic" : "" ?>">
				<?= isset($listing) ? $listing->title : 'Job Title Not Found' ?>
			</h2>
			<p class="text-gray-700 text-lg mt-2">
				<?= isset($listing) ? $listing->description : 'No description available for this listing.' ?>
			</p>
			<ul class="my-4 bg-background p-4 inset-shadow-sm rounded">
				<li class="mb-2"><strong>Salary:</strong> <?= isset($listing) ? formatSalary($listing->salary) : 'N/A' ?></li>
				<li class="mb-2">
					<strong>Location:</strong> <?= isset($listing) ? $listing->city . ', ' . $listing->state : 'N/A' ?>
				</li>
				<li class="mb-2">
					<strong>Tags:</strong> <?= isset($listing) ? $listing->tags : 'N/A' ?>
				</li>
			</ul>
		</div>
	</div>
</section>

<section class="container mx-auto p-4">
	<h2 class="text-xl font-semibold mb-4">Job Details</h2>
	<div class="rounded-lg shadow-md bg-card text-black p-4">
		<h3 class="text-lg font-semibold mb-2 text-primary">
			Job Requirements
		</h3>
		<p>
			<?= isset($listing) ? $listing->requirements : 'No requirements specified for this listing.' ?>
		</p>
		<h3 class="text-lg font-semibold mt-4 mb-2 text-primary">Benefits</h3>
		<p>
			<?= isset($listing) ? $listing->benefits : 'No benefits specified for this listing.' ?>
		</p>
	</div>
	<p class="my-5">
		Put "Job Application" as the subject of your email and attach your
		resume.
	</p>
	<!-- The Subject line of the email will be pre-filled with the job title for better context -->
	<a
		href="<?= isset($listing) ? 'mailto:' . $listing->email . '?subject=' . rawurlencode('Job Application for ' . $listing->title) : '#' ?>"
		class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer text-tag-foreground bg-tag hover:bg-indigo-200">
		<?= isset($listing) ? "Apply Now" : "Email Not Available" ?>
	</a>
</section>

<?= loadPartial('bottom-banner') ?>
<?= loadPartial('footer') ?>