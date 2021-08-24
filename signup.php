<?php require_once('dbconfig.php') ?>
<?php include('process.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Signup-php login System</title>
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
				<form method="POST">
					<h2 class="text-center"><strong>Create</strong> an account.</h2>

					<?php if ($err_message) : ?>
						<div class="callout text-danger">
							<p><?php echo $err_message; ?></p>
						</div>
					<?php endif; ?>
					<?php if ($message) : ?>
						<div class="callout text-primary">
							<p><?php echo $message; ?></p>
						</div>
					<?php endif; ?>
					<div class="mb-3"><input class="form-control" type="text" name="fullName" placeholder="Full Name" value="<?php if (isset($_POST['fullName'])) echo $_POST['fullName']; ?>" ></div>
					<div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" ></div>
					<div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password" minlength="8" required></div>
					<div class="mb-3"><input class="form-control" type="password" name="re_password" placeholder="Password (repeat)" ></div>
					<div class="mb-3">
						<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox"required>I agree to the license terms.</label></div>
					</div>
					<div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" name="signup" required>Sign Up</button></div><a class="already" href="login.php">You already have an account? Login here.</a>
				</form>
			</div>
		</section>
	</div>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>