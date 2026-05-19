<!-- Showcase -->
<section
	class="showcase relative bg-cover bg-center bg-no-repeat h-72 flex items-center">
	<div class="showcase-overlay z-10 size-full"></div>
	<div class="container mx-auto text-center z-10">
		<h2 class="text-4xl text-white font-bold mb-4">Embark On Your Next Quest</h2>
		<form class="mb-4 block mx-5 md:mx-auto" method="GET" action="/listings/search">
			<input
				type="text"
				name="keywords"
				placeholder="Quest Type"
				class="w-full md:w-auto mb-2 px-4 py-2 focus:outline-none bg-gray-50 text-black rounded border" />
			<input
				type="text"
				name="location"
				placeholder="Kingdom or Region"
				class="w-full md:w-auto mb-2 px-4 py-2 focus:outline-none bg-gray-50 text-black rounded" />
			<button
				class="w-full md:w-auto bg-accent hover:brightness-90 transition duration-300 text-white px-4 py-2 focus:outline-none rounded">
				<i class="fa fa-search"></i> Search Quests
			</button>
		</form>
	</div>
</section>