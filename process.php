<?php
//Create Session
ob_start();
session_start();
//If the Signup button is triggered
if (isset($_POST['signup'])) {
  $valid = 1;

  /* Validation to check if fullname is inputed */
  if (empty($_POST['fullName'])) {
    $valid = 0;
    $err_message .= " FullName can not be empty<br>";
  }
  //Filtering fullname if not empty
  else {
    $fullname = filter_var($_POST['fullName'], FILTER_SANITIZE_STRING);
  }

  /* Validation to check if email is inputed */
  if (empty($_POST['email'])) {
    $valid = 0;
    $err_message .= 'Email address can not be empty<br>';
  }
  /* Validation to check if email is valid */ else {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
      $valid = 0;
      $err_message .= 'Email address must be valid<br>';
    }
    /* Validation to check if email already exist */ else {
      // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
      $statement = $pdo->prepare("SELECT * FROM user WHERE email=?");
      $statement->execute(array($_POST['email']));
      $total = $statement->rowCount();
      //If There is a match gives an error message
      if ($total) {
        $valid = 0;
        $err_message .= 'An account is already asociated with the provided email address<br>';
      }
    }
  }
  /* Validation to check if password is inputed */
  if (empty($_POST['password']) || empty($_POST['re_password'])) {
    $valid = 0;
    $err_message .= "Password can not be empty<br>";
  }
  /* Validation to check if passwords match*/

  if (!empty($_POST['password']) && !empty($_POST['re_password'])) {
    if ($_POST['password'] != $_POST['re_password']) {
      $valid = 0;
      $err_message .= "Passwords do not match<br>";
    }
    //If Passwords Matches Generates Hash
    else {
      //Generating Password hash
      $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    }
  }

  if ($valid == 1) {
    //if There Error Messages are empty Store data in the database 
    if (empty($err_message)) {
      //Saving Data Into Database
      $statement = $pdo->prepare("INSERT INTO user (fullName,email,password) VALUES (?,?,?)");
      $statement->execute(array($fullname, $_POST['email'], $hashed_password));
      $message .= "You have successfully registered proceed to <a href='login.php'>Login</a>.";
    } else {
      $err_message .= "Problem in registration.Please check your connection and Try Again!";
    }
  }
}

if (isset($_POST['login'])) {
  //Checks if Both input fields are empty
  if (empty($_POST['email'] || empty($_POST['password']))) {
    $err_message .= 'Email and/or Password can not be empty<br>';
  }
  //Checks if email is valid

  else {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if ($email === false) {
      $err_message .= 'Email address must be valid<br>';
    } else {
      //Checks if email exists

      $statement = $pdo->prepare("SELECT * FROM user WHERE email=?");
      $statement->execute(array($email));
      $total = $statement->rowCount();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);

      if ($total == 0) {
        $err_message .= 'Email Address does not match<br>';
      } else {
        //if email exists save all data in the same column of the email in the row array

        foreach ($result as $row) {
          $stored_password = $row['password'];
        }
      }
    }
    //Checks Provided password matches the password in database if it does logs user in
    if (password_verify($_POST['password'], $stored_password)) {
      //setting the session variables
      $_SESSION['user'] = $row;
      //setting the session login time
      $_SESSION['user']['loggedin_time'] = time();
      header("location: index.php");
    } else {
      $err_message .= 'Password does not match<br>';
    }
  }
}
