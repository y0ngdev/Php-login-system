
<?php require_once('dbconfig.php') ?>
<?php include('process.php') ?>
<?php
if(isset($_GET["session_expire"])) {
	$err_message .= "Login Session is Expired. Please Login Again";
}
if(isset($_SESSION["user"])) {
header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Login-php login System</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karla">
	<link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
	<link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="font-family: Karla, sans-serif;">
	<div class="page">
		<section class="register-photo">
			<div class="form-container">
				<div class="image-holder"></div>
				<form method="post">
					<h2 class="text-center"><strong>Login</strong> to your account.</h2>
					<?php if ($err_message) : ?>
						<div class="callout text-danger">

							<p><?php echo $err_message; ?></p>
						</div>
					<?php endif; ?>
					<div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"></div>
					<div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
					<div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" name="login">Login</button></div><a class="already" href="signup.php">Don't have an account? signup here.</a>
				</form>
			</div>
		</section>
	</div>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>