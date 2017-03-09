<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ekohort">
    <meta name="author" content="Gifary Dhimas Fadhillah">

    <title><?= $this->config->item('website_name', 'tank_auth');?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url("/public/css/bootstrap.min.css"); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url("/public/css/simple-sidebar.css"); ?>" rel="stylesheet">

	<script src="<?= base_url("/public/js/jquery.min.js"); ?>"></script>
	<script src="<?= base_url("/public/js/bootstrap.min.js"); ?>"></script>
  <?php if(isset($user_id) && isset($username)): ?>
  <script>
    var user_id = <?= $user_id; ?>, username = '<?= $username; ?>';
  </script>
<?php endif; ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- Navigation --/>
	<nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display --/>
		<div class="navbar-header">
			<button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
	</nav>
<!-->
