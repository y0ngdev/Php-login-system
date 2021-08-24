<?php
session_start();
//includes database config
include("dbconfig.php");
// Check if the user is logged in or not
if (!isset($_SESSION['user'])) {
	header('location: login.php');
	exit;
}
// Check if the session has expired or not
if (isset($_SESSION['user'])) {
	if (SessionExpire()) {
		header("Location:logout.php?session_expire=1");
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Dashboard-php login System</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karla">
	<link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
	<link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="font-family: Karla, sans-serif;">
	<div class="page">
		<section class="register-photo">
			<div class="form-container">

				<h2 class="text-center"><strong>User </strong> DashBoard.</h2>


				<div class="callout text-primary">
					Welcome <?php echo $_SESSION['user']['fullName']; ?>. Click here to <a href="logout.php" tite="Logout">Logout.

				</div>


			</div>
		</section>
	</div>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>