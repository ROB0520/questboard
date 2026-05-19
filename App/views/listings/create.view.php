<?= loadPartial('head') ?>
<?= loadPartial('navbar') ?>
<?= loadPartial('top-banner') ?>

<section class="flex justify-center items-center mt-20">
	<div class="bg-card p-8 rounded-lg shadow-md w-full md:w-600 mx-6">
		<h2 class="text-4xl text-center font-bold mb-4">Publish New Quest</h2>
		<form method="POST" action="/listings">
			<h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
				Quest Details
			</h2>

			<?= loadPartial('errors', ['errors' => $errors ?? []]) ?>

			<div class="mb-4">
				<input
					type="text"
					name="title"
					placeholder="Quest Title (Title)"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['title'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<textarea
					name="description"
					placeholder="Quest Description (Description)"
					class="w-full px-4 py-2 border rounded focus:outline-none"><?= $_POST['description'] ?? '' ?></textarea>
			</div>
			<div class="mb-4">
				<input
					type="text"
					name="salary"
					placeholder="Contract Reward (Salary)"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['salary'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="text"
					name="requirements"
					placeholder="Required Skills (Requirements)"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['requirements'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="text"
					name="benefits"
					placeholder="Guild Rewards (Benefits)"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['benefits'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="text"
					name="tags"
					placeholder="Specializations (Tags, comma separated)"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['tags'] ?? '' ?>" />
			</div>
			<h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
				Guild Information & Region
			</h2>
			<div class="mb-4">
				<input
					type="text"
					name="company"
					placeholder="Guild Name (Company)"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['company'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="text"
					name="address"
					placeholder="Guild Hall Address (Address)"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['address'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="text"
					name="city"
					placeholder="Kingdom (City)"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['city'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="text"
					name="state"
					placeholder="Region (State)"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['state'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="text"
					name="phone"
					placeholder="Guild Contact Number (Phone)"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['phone'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="email"
					name="email"
					placeholder="Guild Messenger Address For Applications (Email)"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $_POST['email'] ?? '' ?>" />
			</div>
			<button
				class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
				Publish Quest
			</button>
			<a
				href="/listings"
				class="block text-center w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded focus:outline-none">
				Return to Quest Board
			</a>
		</form>
	</div>
</section>

<?= loadPartial('bottom-banner') ?>
<?= loadPartial('footer') ?>