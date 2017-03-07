<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'form-control',
	'autofocus' => 1,
	'required' => 'required'
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
	$login['placeholder'] = 'Email or Username';
} else if ($login_by_username) {
	$login_label = 'Login';
	$login['placeholder'] = 'Username';
} else {
	$login_label = 'Email';
	$login['placeholder'] = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Password',
	'required' => 'required'
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<!-- Custom styles for login form -->
<link href="<?= base_url("/public/css/signin.css"); ?>" rel="stylesheet">
<div class="container-fluid">
	<div class="form-signin">
		<h2 class="form-signin-heading">Please sign in</h2>
		<?php echo form_open( site_url(implode('/', $this->uri->segment_array()), is_https() ? 'https' : 'http'));?>

			<?php echo form_label($login_label, $login['id'], array('class' => 'sr-only')); ?>
			<?php echo form_input($login); ?>
			<?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>


			<?php echo form_label('Password', $password['id'], array('class' => 'sr-only')); ?>
			<?php echo form_password($password); ?>
			<?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>

			<?php if ($show_captcha) {
				if ($use_recaptcha) { ?>

				<?php echo $recaptcha_html; ?>
				<div class="label-danger" style="color: white;">
				<?php echo form_error('g-recaptcha-check'); ?>
				</div>
			<?php } else { ?>
					<p>Enter the code exactly as it appears:</p>
					<?php echo $captcha_html; ?>
				<div>
				<?php echo form_label('Confirmation Code : ', $captcha['id']); ?>
				<?php echo form_input($captcha); ?>
				<div class="label-danger" style="color: white;"><?php echo form_error($captcha['name']); ?></div>
				</div>
			<?php }
			} ?>

			<div class="checkbox">
					<?php echo form_checkbox($remember); ?>
					<?php echo form_label('Remember me', $remember['id']); ?>
			</div>
			<?php echo anchor('/auth/forgot_password/', 'Forgot the password?'); ?>
		<?php echo form_submit('submit', 'Let me in', "class='btn btn-primary btn-block'"); ?>
		<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register', 'class="btn btn-default btn-block"'); ?>
		<a href="<?= site_url(); ?>" class="btn btn-default btn-block">&#0171; Back</a>


		<?php echo form_close(); ?>
	</div>
</div>
