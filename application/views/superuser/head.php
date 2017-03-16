<?php if(isset($message)): ?>
	<div class="alert alert-success alert-dismissable" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>Message!</strong> <?= $message; ?>
	</div>
<?php endif; ?>
<a href="<?= site_url('/superuser'); ?>">
	<span aria-hidden="true">superuser</span>
</a>