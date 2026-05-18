<?php if (isset($_SESSION['success_msg'])) : ?>
	<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
		<?= $_SESSION['success_msg'] ?>
	</div>
	<?php unset($_SESSION['success_msg']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error_msg'])) : ?>
	<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
		<?= $_SESSION['error_msg'] ?>
	</div>
	<?php unset($_SESSION['error_msg']); ?>
<?php endif; ?>