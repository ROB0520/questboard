<?php
$title = "Seeing the Light Through Leadership Knots";
$description = "Discover how I untangled the knots of leadership at ALTC 2025 through team challenges, reflection, and renewed purpose to lead with clarity and confidence.";
$date = "August 1, 2025";
$author = "Alecz Francois V. Reyes";
$authorAcronym = "AR";
$authorAttr = "Web Developer";
$pageTitle = "ALTC 2025 Reflections";
$body = [
	"I stepped into the Annual Leadership Training Course (ALTC) 2025 at NEUST Sumacab Campus with excitement tinged by nervousness, ready to embrace the theme \"I See The Light: Tangled Through the Knots of Leadership.\" The opening remarks from university administrators created an empowering atmosphere, surrounding me with student leaders from across campuses who shared a passion for growth and service. As sessions began, I absorbed insights on responsible leadership and NEUST's vision for sustainable development, feeling both humbled and motivated to contribute to that mission.",
	"The heart of the training unfolded through dynamic workshops, seminars, and team-building challenges that tested our collaboration and self-reflection. On the blue team, hands-on activities built trust and coordination, while the fellowship night, complete with the delegates celebrating unity, reminded me that leadership thrives on genuine connections. These experiences untangled my doubts, shifting my view of leadership from a title to an intentional practice of learning, communicating, and serving.",
	"By the end, posing with my blue team after four transformative days, I emerged with renewed confidence and purpose, ready to lead with integrity back at CICT - Local Student Government. The ALTC illuminated how facing leadership's \"knots\" leads to clarity, leaving me grateful to the University Student Government and determined to inspire my peers as a braver leader."
];
$cta = "What's one leadership knot you're ready to untangle today? Start leading with purpose now.";
$img = "/images/altc-2025.jpg";
$imgAlt = "ALTC 2025 Group Photo";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Montagu+Slab:opsz,wght@16..144,100..700&display=swap" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
	<link rel="icon" type="image/ico" href="/images/favicon.ico">
	<style type="text/tailwindcss">
		@theme inline {
			--font-sans: 'Figtree', sans-serif;
			--font-serif: 'Montagu Slab', serif;
		}
    </style>
	<title><?= $pageTitle ?></title>
</head>

<body>
	<main class="min-h-screen bg-gray-100 text-gray-900 font-sans">
		<header class="border-b border-gray-300">
			<div class="mx-auto max-w-3xl px-6 py-12">
				<div class="mb-6">
					<span class="text-sm font-medium text-gray-600">
						<?= $date ?>
					</span>
				</div>
				<h1 class="text-5xl font-serif font-light leading-tight mb-4 text-balance">
					<?= $title ?>
				</h1>
				<p class="text-lg text-gray-600 leading-relaxed mb-8">
					<?= $description ?>
				</p>
				<div class="border-t border-gray-300 pt-6 flex items-center gap-4">
					<div class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
						<span class="text-sm font-semibold text-gray-900"><?= $authorAcronym ?></span>
					</div>
					<div>
						<p class="font-semibold text-gray-900"><?= $author ?></p>
						<p class="text-sm text-gray-600">
							<?= $authorAttr ?>
						</p>
					</div>
				</div>
			</div>
		</header>

		<article class="mx-auto max-w-3xl px-6 py-16 space-y-6">
			<?php foreach ($body as $paragraph): ?>
				<section class="mb-12">
					<p class="text-lg leading-relaxed text-gray-900 text-justify">
						<?= $paragraph ?>
					</p>
				</section>
			<?php endforeach; ?>

			<img src="<?= $img ?>" alt="<?= $imgAlt ?>" class="w-full rounded-lg shadow-lg mb-12">


			<footer class="border-t border-gray-300 pt-12 mt-16">
				<p class="text-sm text-gray-600">
					<?= $cta ?>
				</p>
			</footer>
		</article>
	</main>

</body>

</html>