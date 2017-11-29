<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title><?=$title?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<?php echo form_open('login',array('class' => 'form-auth-small')) ?>
								<div align="center" style="color:red"><?php echo validation_errors(); ?></div>
								<div class="form-group">
									<label for="signup-email" class="control-label sr-only">Usuario o Email</label>
									<input type="text" class="form-control" name="username" id="signup-email" value="" placeholder="Usuario o Email">
								</div>
								<div class="form-group">
									<label for="signup-password" class="control-label sr-only">Contraseña</label>
									<input type="password" class="form-control" name="password" id="signup-password" value="" placeholder="Contraseña">
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">ACCEDER</button>
								<div class="bottom">
									<span><i class="fa fa-lock"></i> <a href="#">¿Olvidó su contraseña?</a></span>
								</div>
							<?php echo form_close();?>
						</div>
					</div>
					<div class="clearfix">
						<h1>Frontuari Assistance Control Software <?php echo $this->config->item('application_version'); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
