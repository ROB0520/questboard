<?= loadPartial('head') ?>
<?= loadPartial('navbar') ?>
<?= loadPartial('top-banner') ?>

<!-- Post a Job Form Box -->
<section class="flex justify-center items-center mt-20">
	<div class="bg-card p-8 rounded-lg shadow-md w-full md:w-600 mx-6">
		<h2 class="text-4xl text-center font-bold mb-4">Create Job Listing</h2>
		<!-- <div class="message bg-red-100 p-3 my-3">This is an error message.</div>
        <div class="message bg-green-100 p-3 my-3">
          This is a success message.
        </div> -->
		<form method="POST" action="/listings">
			<h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
				Job Info
			</h2>
			<?php if (isset($errors) && !empty($errors)) : ?>
				<div class="space-y-3 mb-4">
					<?php foreach ($errors as $error) : ?>
						<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
							<?= $error ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<div class="mb-4">
				<input
					type="text"
					name="title"
					placeholder="Job Title"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['title'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<textarea
					name="description"
					placeholder="Job Description"
					class="w-full px-4 py-2 border rounded focus:outline-none">
					<?= $_POST['description'] ?? '' ?>
				</textarea>
			</div>
			<div class="mb-4">
				<input
					type="text"
					name="salary"
					placeholder="Annual Salary"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['salary'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="text"
					name="requirements"
					placeholder="Requirements"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['requirements'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="text"
					name="benefits"
					placeholder="Benefits"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['benefits'] ?? '' ?>" />
			</div>
			<h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
				Company Info & Location
			</h2>
			<div class="mb-4">
				<input
					type="text"
					name="company"
					placeholder="Company Name"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['company'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="text"
					name="address"
					placeholder="Address"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['address'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="text"
					name="city"
					placeholder="City"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['city'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="text"
					name="state"
					placeholder="State"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['state'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="text"
					name="phone"
					placeholder="Phone"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['phone'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="email"
					name="email"
					placeholder="Email Address For Applications"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['email'] ?? '' ?>" />
			</div>
			<button
				class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
				Save
			</button>
			<a
				href="/"
				class="block text-center w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded focus:outline-none">
				Cancel
			</a>
		</form>
	</div>
</section>

<?= loadPartial('bottom-banner') ?>
<?= loadPartial('footer') ?>