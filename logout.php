<?php 
ob_start();
session_start();
//includes data base config
include('dbconfig.php');
//Unset the session variable 
unset($_SESSION['user']);
//destroy created session
session_destroy();
// Redirect to login page
header("location: login.php");
//check if session is expired
if(isset($_GET["session_expire"])) {
	$url= "login.php?session_expire=" . $_GET["session_expire"];
	//Destroy session if time's out
	unset($_SESSION['user']);
	//redirect to login if expired
	 header("Location:$url");
	 
}
