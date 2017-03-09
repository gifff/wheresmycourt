<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
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
<div class="container-fluid">
	<div class="panel panel-primary">
	<div class="panel-heading">
	Log in
	</div>
	<div class="panel-body">
		<?php echo form_open($this->uri->uri_string()); ?>

			<div class="row">
				<div class="col-md-2"><?php echo form_label($login_label, $login['id']); ?></div>
				<div class="col-md-3"><?php echo form_input($login); ?></div>
				<div class="col-md-3" style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></div>
			</div>
			<div class="row">
				<div class="col-md-2"><?php echo form_label('Password', $password['id']); ?></div>
				<div class="col-md-3"><?php echo form_password($password); ?></div>
				<div class="col-md-3" style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></div>
			</div>

			<?php if ($show_captcha) {
				if ($use_recaptcha) { ?>
			<div class="row">
				<div class="col-md-2" colspan="2">
					<div id="recaptcha_image"></div>
				</div>
				<div class="col-md-3">
					<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
					<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
					<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<div class="recaptcha_only_if_image">Enter the words above</div>
					<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
				</div>
				<div class="col-md-3"><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></div>
				<div class="col-md-3" style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></div>
				<?php echo $recaptcha_html; ?>
			</div>
			<?php } else { ?>
			<div class="row">
				<div class="col-md-2">
					<p>Enter the code exactly as it appears:</p>
				</div>
				<div class="col-md-3">
					<?php echo $captcha_html; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2"><?php echo form_label('Confirmation Code', $captcha['id']); ?></div>
				<div class="col-md-3"><?php echo form_input($captcha); ?></div>
				<div class="col-md-3" style="color: red;"><?php echo form_error($captcha['name']); ?></div>
			</div>
			<?php }
			} ?>

			<div class="row">
				<div class="col-md-2">
					<?php echo form_checkbox($remember); ?>
					<?php echo form_label('Remember me', $remember['id']); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?>
					<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>
				</div>
			</div>

		<?php echo form_submit('submit', 'Let me in', "class='btn btn-primary'"); ?>
		<a href="<?= site_url(); ?>" class="btn btn-default">Back</a>
		<?php echo form_close(); ?>
	</div>
	</div>
</div>