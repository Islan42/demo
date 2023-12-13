<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php require 'partials/banner.php' ?>

<main>
	<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		<?php if($_SESSION['user'] ?? false): ?>
			<p>Hello there, <?= $_SESSION['user']['email'] ?>.</p>
		<?php else: ?>
			<p>Hello World!</p>
		<?php endif; ?>
	</div>
</main>

<?php require 'partials/footer.php' ?>