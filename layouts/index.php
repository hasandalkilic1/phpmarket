<?php require_once('../inc/config.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header" style="text-align: center;">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="index.php" style="text-align: center;">
  	
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" placeholder="Username">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" placeholder="E-Mail">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1" placeholder="Password">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2" placeholder="Password">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="index2.php">Sign in</a>
  	</p>
  </form>
</body>
</html>