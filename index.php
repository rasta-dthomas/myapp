<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device=width, initial-scale=1.0">
	<title>My LAMP Web App</title>
	<link rel="stylesheet" href="css/banner.css">
</head>
<body>
	<!-- Banner with Collapsible-style Navigation Menu -->
	<header class="banner">
		<div class="banner-logo">RPG IT Solutions, LLC.</div>

		<details class="banner-menu">
			<summary class="menu-toggle">Menu</summary>
			<nav class="menu-links">
				<a href="form/form.php?page=form">Form</a>
				<a href="phpinfo.php?page=phpinfo">PHP Info</a>
			</nav>
		</details>
	</header>
	<hr>

	<!-- Dynamic Content Area -->
	<main>
		<?php
			$page = isset($_GET['page']) ? $_GET['page'] : 'form';

			switch ($page) {
				case 'phpinfo':
					if (file_exists('phpinfo.php')) {
						include 'phpinfo.php';
					} else {
						echo '<p>PHP Info page not found.</p>';
					}
					break;
			}
		?>

	</main>
</body>
</html>
