<?php
$err_message = '';
$message = '';
// Change this to your connection info.
define('DBHOST', 'localhost'); //define your website host
define('DBUSER', 'root');//define your database username
define('DBPASS', '');//define your database password leave if no password is set
define('DBNAME', 'secure');// database name
// Try and connect using the info above.
try {
	$pdo = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
// If there is an error with the connection, stop the script and display the error.
	catch( PDOException $exception ) {
	echo "Connection error :" . $exception->getMessage();
}
//Function to check if session is expird
function SessionExpire() {
	//sets time for the session to expire. the time is in seconds
		$session_duration = 600; 
	//checks if login time is set
   
	if(isset($_SESSION['user']['loggedin_time']) and isset($_SESSION['user']['id'])){  
		if(((time() - $_SESSION['user']['loggedin_time']) > $session_duration)){ 
			return true; 
		} 
	}
	return false;
}
?>