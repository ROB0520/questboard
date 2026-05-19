<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
	<link rel="icon" type="image/ico" href="/images/favicon.ico">
	<style type="text/tailwindcss">
		@theme inline {
			--color-background: #0b1114;
			--color-foreground: #d6ddd6;

			--color-primary: #121a1f;
			--color-accent: #7f8f5b;

			--color-card: rgba(18, 26, 31, 0.82);

			--color-heading: #f3f4f1;

			--color-link: #d6ddd6;

			--color-tag: rgba(22, 34, 28, 0.85);

			--color-tag-foreground: #dce6d8;

			--color-footer: #070b0d;

			--font-heading: 'Cinzel', serif;
			--font-body: 'Inter', sans-serif;

			--radius: 1rem;

			/* Additional custom properties, for my preference */
			--color-border: rgba(160, 174, 140, 0.12);

			--color-input: rgba(160, 174, 140, 0.08);

			--radius-sm: calc(var(--radius) * 0.6);
			--radius-md: calc(var(--radius) * 0.8);
			--radius-lg: var(--radius);
			--radius-xl: calc(var(--radius) * 1.4);
			--radius-2xl: calc(var(--radius) * 1.8);
			--radius-3xl: calc(var(--radius) * 2.2);
			--radius-4xl: calc(var(--radius) * 2.6);

		}


		@layer base {
			* {
				@apply border-border;
			}

			body {
				@apply bg-background text-foreground font-body;
			}

			h1,
			h2,
			h3,
			h4,
			h5,
			h6 {
				@apply font-heading;
			}

			a {
				@apply text-link;
			}

			header {
				@apply bg-primary text-white;
			}
		}
    </style>
	<style>
		.showcase-overlay {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: 1;
			background-color: rgba(0, 0, 0, 0.5);
		}

		.showcase {
			background-image: url('/images/showcase.png');
			background-repeat: repeat-x;
			background-size: auto 100%;
		}
	</style>
	<title>QuestBoard</title>
</head>

<body class="bg-background min-h-dvh">