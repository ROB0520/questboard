<?= loadPartial('head') ?>
<?= loadPartial('navbar') ?>

<div class="flex justify-center items-center mt-20">
	<div class="bg-card p-8 rounded shadow-md w-full md:w-500 mx-6 border max-w-xl">
		<h2 class="text-4xl text-center font-bold mb-4">Enter The Guild Hall</h2>

		<?= loadPartial('errors', ['errors' => $errors ?? []]) ?>

		<form method="POST" action="/auth/login">
			<div class="mb-4">
				<input
					type="email"
					name="email"
					placeholder="Guild Messenger Address (Email)"
					class="w-full px-4 py-2 border rounded focus:outline-none" />
			</div>
			<div class="mb-4">
				<input
					type="password"
					name="password"
					placeholder="Guild Passphrase (Password)"
					class="w-full px-4 py-2 border rounded focus:outline-none" />
			</div>
			<button
				type="submit" class="w-full bg-accent hover:bg-accent text-white px-4 py-2 rounded focus:outline-none">
				Login
			</button>

			<p class="mt-4 text-gray-500">
				New adventurer?
				<a class="text-accent" href="/auth/register">Join the Guild</a>
			</p>
		</form>
	</div>
</div>

<?= loadPartial('footer') ?>