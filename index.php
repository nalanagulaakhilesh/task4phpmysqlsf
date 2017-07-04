<?php include('server.php'); ?>



<!DOCTYPE html>
<html>
<head>
	<title>User registration system using php and mysql</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<style>

</style>
<body>
<div class="intro">
	<pre><h1>Note Maker              			 	 <a href="index.php" style="color:cyan;font-size: 22px;text-decoration: none;">Register</a>     <a href="login.php" style="color:cyan;font-size: 22px;text-decoration: none;">Login</a>    </h1></pre>
</div>
<div class="header">
	<h2>Create An Account</h2>
</div>

<form method="post" action="index.php">
	<!-- display validation errors here -->
	<?php include('errors.php'); ?>
	<div class="input-group">
		<label>Username</label>
		<input type="text" style="color: red;" name="username" value="<?php echo $username; ?>" required>
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="text" style="color: red;" name="email" pattern="([a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3})" value="<?php echo $email; ?>" required>
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" style="color: red;" name="password_1" pattern="(?=(?:[^a-zA-Z]*[a-zA-Z]){4})(?=(?:\D*\d){2}).*" placeholder="Min. 2 digits and min. 4 letters are required" required >
	</div>
	<div class="input-group">
		<label>Confirm Password</label>
		<input type="password" style="color: red;" name="password_2"   pattern="(?=(?:[^a-zA-Z]*[a-zA-Z]){4})(?=(?:\D*\d){2}).*"  placeholder="Min. 2 digits and min. 4 letters are required" required>
	</div>
	<div class="input-group">
		<button type="submit" name="register" class="btn">Register</button>
	</div>
	<p style="color: #ffff99;">
		Already a member? <a href="login.php" style="color:cyan;">Sign In</a>
	</p>
</form>
</body>
</html>