<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
?>
<?php echo form_open(site_url(implode('/', $this->uri->segment_array()), is_https() ? 'https' : 'http')); ?>
<div class="container-fluid">
	<div class="panel panel-primary" style="max-width:430px;position:relative;margin: 0 auto;">
	<div class="panel-heading">
	Log in
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-3"><?php echo form_label($login_label, $login['id']); ?></div>
			<div class="col-md-3"><?php echo form_input($login); ?></div>
			<div class="col-md-3"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?"<div class='alert alert-danger'>".$errors[$login['name']]."</div>":''; ?></div>
		</div>
		<div class="row">
			<div class="col-md-5"><?php echo form_submit('reset', 'Get a new password', "class='btn btn-primary'"); ?></div>
			<div class="col-md-4"><a href="<?= site_url('/auth/login'); ?>" class="btn btn-default">Back to login page</a></div>
		</div>
		<?php echo form_close(); ?>
	</div>
	</div>
</div>