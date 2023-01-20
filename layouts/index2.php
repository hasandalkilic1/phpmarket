<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<form method="POST" action="login.php" style="text-align: center;">
		<h2>LOGIN</h2>
		<?php if(isset($GET['error'])) { ?>
			<p class="error"> <?php echo $_GET['error']; ?></p>
		<?php } ?>

		<label> Username:</label>
		<input type="POST" name="username" placeholder="Username">
		<br><br>
		<label>Password:</label>
		<input type="password" name="password" placeholder="Password">
		<br><br>
		<input type="submit" name="Login" value="Login">
		
	</form>

</body>
</html>