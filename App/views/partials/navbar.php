<?php

use Framework\Session;

?>

<header class="bg-primary text-white p-4">
	<div class="container mx-auto flex justify-between items-center max-md:flex-col max-md:gap-4">
		<h1 class="text-3xl font-semibold">
			<a href="/"><span class="text-accent">Quest</span>Board</a>
		</h1>
		<nav class="flex flex-col md:flex-row gap-4 items-center">
			<?php if (Session::has('user')) : ?>
				<p class="line-clamp-1">
					Welcome Back, <span class="truncate"><?= Session::get('user')["name"] ?></span>!
				</p>
				<form method="POST" action="/auth/logout">
					<button type="submit" class="text-white hover:underline">Logout</button>
				</form>
				<a
					href="/listings/create"
					class="bg-accent hover:brightness-90 text-white px-4 py-2 rounded hover:shadow-md transition duration-300"><i class="fa fa-edit"></i> Post Quest</a>
			<?php else : ?>
				<a href="/auth/login" class="text-white hover:underline ">Login</a>
				<a href="/auth/register" class="text-white hover:underline">Register</a>
			<?php endif; ?>
		</nav>
	</div>
</header>