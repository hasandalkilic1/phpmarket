<?php
$dsn = 'mysql:dbname=test_db;host=localhost';
$user = 'root';
$password = '';

$db_name="test_db";
$sname="localhost";

$errors = array();
 
try
{
	$db = new PDO($dsn,$user,$password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn = mysqli_connect($sname, $user, $password, $db_name);
}
catch(PDOException $e)
{
	echo "PDO error".$e->getMessage();
	die();
}
 
define('PRODUCT_IMG_URL','../assets/product-images/');

if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE user_name='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['user_name'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password_1;

  	$query = "INSERT INTO users (user_name, email, password, is_admin) 
  			  VALUES('$username', '$email', '$password','0')";
  	mysqli_query($conn, $query);
  	$_SESSION['user_name'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: login.php');
  }
}
?>