<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Mentoring - Login</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="assets/css/feather.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Main Wrapper -->
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left" style="background: url(assets/img/hack/login-page.jpg);">
						<img class="img-fluid" src="assets/img/logo-white.png" alt="Logo">
					</div>
					<div class="login-right">
						<div class="login-right-wrap">
							<h1>Login</h1>
							<p class="account-subtitle">Access to our dashboard</p>

							<!-- Form -->
							<form action="action/login-action.php" method="POST">
								<div class="form-group">
									<input class="form-control emailalert" name="email" value="<?php if(isset($_SESSION["emailvalue"])){echo $_SESSION["emailvalue"];} ?>" type="text" placeholder="Email">
									<span class="text-danger text-capitalize">
										<?php 
											if (isset($_SESSION['emailalert'])) {
										?>
										<style type="text/css">
											.emailalert{
												border: 1px solid red;
											}
										</style>
										<?php
											echo $_SESSION['emailalert'];
											session_unset();
											}
										 ?>
									</span>
								</div>
								<div class="form-group">
									<input class="form-control passwordalert" name="password" value="<?php if(isset($_SESSION["passwordvalue"])){echo $_SESSION["passwordvalue"];} ?>" type="text" placeholder="Password">
									<span class="text-danger text-capitalize">
										<?php 
											if (isset($_SESSION['passwordalert'])) {
										?>
										<style type="text/css">
											.passwordalert{
												border: 1px solid red;
											}
										</style>
										<?php
											echo $_SESSION['passwordalert'];
											session_unset();
											}
										 ?>
									</span>
								</div>
								<div class="form-group">
									<button class="btn btn-primary btn-block" type="submit">Login</button>
								</div>
							</form>
							<!-- /Form -->

							<div class="text-center forgotpass">
								<a href="forgot-password.php">Forgot Password?</a>
							</div>
							<div class="login-or">
								<span class="or-line"></span>
								<span class="span-or">or</span>
							</div>

							<!-- Social Login -->
							<div class="social-login">
								<span>Login with</span>
								<a href="#" class="facebook">
									<i class="fab fa-facebook-f"></i>
								</a>
								<a href="#" class="google">
									<i class="fab fa-google"></i>
								</a>
							</div>
							<!-- /Social Login -->

							<div class="text-center dont-have">
								Don’t have an account? 
								<a href="register.php">Register</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>

</body>

</html>