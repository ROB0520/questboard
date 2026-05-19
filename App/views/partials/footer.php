<footer class="border-t border-white/10 mt-6">
	<div class="grid gap-10 md:grid-cols-3 px-6 pt-6">
		<div>
			<h2 class="text-3xl font-bold text-accent"> Quest<span class="text-white">Board</span> </h2>
			<p class="mt-4 text-sm leading-relaxed text-gray-400"> A guild board for adventurers seeking legendary quests across the realm. </p>
		</div>
		<div>
			<h3 class="text-lg font-semibold text-white"> Guild Navigation </h3>
			<ul class="mt-4 space-y-2 text-sm text-gray-400">
				<li> <a href="/" class="hover:text-accent] transition"> Guild Hall </a> </li>
				<li> <a href="/listings" class="hover:text-accent] transition"> Quest Board </a> </li>
				<li> <a href="/listings/create" class="hover:text-accent] transition"> Publish Quest </a> </li>
			</ul>
		</div>
		<div>
			<h3 class="text-lg font-semibold text-white"> Realm Status </h3>
			<div class="mt-4 flex items-center gap-3 text-sm text-gray-400">
				<div class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></div> <span> All guild systems operational </span>
			</div>
		</div>
	</div>
	<div class="mt-10 p-6 border-t border-white/5 text-center text-sm text-gray-500"> QuestBoard © <?= date('Y') ?> • Built for adventurers across the realm </div>
</footer>

</body>

</html>