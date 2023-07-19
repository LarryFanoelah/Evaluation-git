<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="assets1/images/icons/drh-png.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets1/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets1/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets1/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets1/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets1/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets1/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets1/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets1/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets1/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div  class="wrap-login100">

            <form action="{{ url('/login') }}" class="login100-form validate-form" method="post">
					@csrf
					<span style="margin-bottom: 10%;" class="login100-form-title p-b-43">
						Veuillez vous connecter
					</span>


					<div  style="margin-bottom: 5%;"class="wrap-input100 validate-input" data-validate = "Valid names is required">
						<input  class="input100" type="text" name="email" value="admin@gmail.com">
						<span class="focus-input100"></span>

					</div>


					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="mdp" value="admin">
						<span class="focus-input100"></span>

					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">


						</div>


					</div>


					<div class="container-login100-form-btn">
						<!-- <button class="login100-form-btn">
							Se connecter
						</button> -->
						<input  class="login100-form-btn" type="submit" value="Se connecter">
					</div>


				</form>

				<div class="login100-more" style="background-image: url('assets1/images/lolo.jpg');">
				</div>
			</div>
		</div>
	</div>





<!--===============================================================================================-->
	<script src="assets1/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets1/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="assets1/vendor/bootstrap/js/popper.js"></script>
	<script src="assets1/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets1/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets1/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets1/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="assets1/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assets1/js/main.js"></script>

</body>
</html>
