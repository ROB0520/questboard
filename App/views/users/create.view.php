<?= loadPartial('head') ?>
<?= loadPartial('navbar') ?>


<div class="flex justify-center items-center mt-20">
	<div class="bg-card p-8 rounded shadow-md w-full md:w-500 mx-6 border max-w-xl">
		<h2 class="text-4xl text-center font-bold mb-4">Join The Adventurer Guild</h2>

		<?= loadPartial('errors', ['errors' => $errors ?? []]) ?>

		<form method="POST" action="/auth/register">
			<div class="mb-4">
				<input
					type="text"
					name="name"
					placeholder="Adventurer Name (Full Name)"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $old['name'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="email"
					name="email"
					placeholder="Guild Messenger Address (Email)"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $old['email'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="text"
					name="city"
					placeholder="Kingdom (City)"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $old['city'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="text"
					name="state"
					placeholder="Region (State)"
					class="w-full px-4 py-2 border rounded focus:outline-none"
					value="<?= $old['state'] ?? '' ?>" />
			</div>
			<div class="mb-4">
				<input
					type="password"
					name="password"
					placeholder="Guild Passphrase (Password)"
					class="w-full px-4 py-2 border rounded focus:outline-none" />
			</div>
			<div class="mb-4">
				<input
					type="password"
					name="password_confirm"
					placeholder="Confirm Passphrase (Confirm Password)"
					class="w-full px-4 py-2 border rounded focus:outline-none" />
			</div>
			<button
				type="submit" class="w-full bg-accent hover:bg-accent-hover text-white px-4 py-2 rounded focus:outline-none">
				Register
			</button>

			<p class="mt-4 text-gray-500">
				Already part of the guild?
				<a class="text-accent" href="/auth/login">Enter Guild Hall</a>
			</p>
		</form>
	</div>
</div>

<?= loadPartial('footer') ?>