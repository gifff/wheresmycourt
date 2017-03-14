<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
		'required' => 'required',
		'autofocus' => 1,
		'class' => 'form-control'
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'required' => 'required',
	'class' => 'form-control'
);
$nama = array(
	'name'	=> 'nama',
	'id'	=> 'nama',
	'value'	=> set_value('nama'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'required' => 'required',
	'class' => 'form-control'
);
$telp = array(
	'name'	=> 'telp',
	'id'	=> 'telp',
	'value'	=> set_value('telp'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'required' => 'required',
	'class' => 'form-control'
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'required' => 'required',
		'class' => 'form-control'
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'required' => 'required',
		'class' => 'form-control'
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
		'class' => 'form-control'
);
?>
<!-- Custom styles for signup form -->
<link href="<?= base_url("/public/css/signin.css"); ?>" rel="stylesheet">
<div class="form-signin">
<?php echo form_open( site_url(implode('/', $this->uri->segment_array()), is_https() ? 'https' : 'http')); ?>

	
	<?php if ($use_username) { ?>
	<div class="form-group">
		
			<?php echo form_label('Username', $username['id']); ?>
			<?php echo form_input($username); ?>
			<?php echo form_error($username['name'], '<span class="label label-danger">', '</span>'); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
		
	</div>
	<?php } ?>
	<div class="form-group">
		
			<?php echo form_label('Email Address', $email['id']); ?>
			<?php echo form_input($email); ?>
			<?php echo form_error($email['name'], '<span class="label label-danger">', '</span>'); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
		
	</div>
	<div class="form-group">
		
			<?php echo form_label('Password', $password['id']); ?>
			<?php echo form_password($password); ?>
			<?php echo form_error($password['name'], '<span class="label label-danger">', '</span>'); ?>
		
	</div>
	<div class="form-group">
		
			<?php echo form_label('Confirm Password', $confirm_password['id']); ?>
			<?php echo form_password($confirm_password); ?>
			<?php echo form_error($confirm_password['name'], '<span class="label label-danger">', '</span>'); ?>
		
	</div>
	<hr>
	<div class="form-group">
		<?php echo form_label('Nama', $nama['id']); ?>
		<?php echo form_input($nama); ?>
		<?php echo form_error($nama['name'], '<span class="label label-danger">', '</span>'); ?>
	</div>
	<div class="form-group">
		<?php echo form_label('Telp', $telp['id']); ?>
		<?php echo form_input($telp); ?>
		<?php echo form_error($telp['name'], '<span class="label label-danger">', '</span>'); ?>
	</div>

	<hr>

	<?php if ($captcha_registration) {
		if ($use_recaptcha) { ?>
	<div class="form-group">
			<?php echo $recaptcha_html; ?>
			<?php echo form_error('g-recaptcha-check', '<span class="label label-danger">', '</span>'); ?>
	</div>
	<?php } else { ?>
	<div class="form-group">
		
			<label>Enter the code exactly as it appears:</label>
			<?php echo $captcha_html; ?>
		
			<?php echo form_label('Confirmation Code', $captcha['id']); ?>
			<?php echo form_input($captcha); ?>
			<?php echo form_error($captcha['name'], '<span class="label label-danger">', '</span>'); ?>
		
	</div>
	<?php }
	} ?>

<a href="<?= site_url('/auth/login/'); ?>" class="btn btn-default">&#0171; Back</a>
<?php echo form_submit('register', 'Register', array('class' => 'btn btn-primary')); ?>
<?php echo form_close(); ?>
</div>
