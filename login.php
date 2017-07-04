<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>

	<title>User registration system using php and mysql</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="intro">
	<pre><h1>Note Maker              			 	 <a href="index.php" style="color:cyan;font-size: 22px;text-decoration: none;">Register</a>     <a href="login.php" style="color:cyan;font-size: 22px;text-decoration: none;">Login</a>    </h1></pre>
</div>
<div class="header">
	<h2>Login</h2>
</div>

<form method="post" action="login.php">
	<!-- display validation errors here -->
	<?php include('errors.php'); ?>
	<div class="input-group">
		<label>Username</label>
		<input type="text" style="color: red;" name="username">
	</div>
	
	<div class="input-group">
		<label>Password</label>
		<input type="password" style="color: red;" name="password">
	</div>
	
	<div class="input-group">
		<button type="submit" name="login" class="btn">Login</button>
	</div>
	<p style="color:  #ffff99;">
		Not a member yet? <a href="index.php" style="color: cyan;">Sign Up</a>
	</p>
</form>
</body>
</html>