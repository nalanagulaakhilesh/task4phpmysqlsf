<?php 
	session_start();

	$username ="";
	$email ="";
	$errors = array();

	//connect to the database
	$db = mysqli_connect('localhost','root','','registration');

	// if the register button is clicked
	if (isset($_POST['register'])) {
		# code...
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);

		// ensure that form fields are filled properly
		if (empty($username)) {
			# code...
			array_push($errors,"Username is required");
		}
		if (empty($email)) {
			# code...
			array_push($errors,"Email is required");
		}
		if (empty($password_1)) {
			# code...
			array_push($errors,"Password is required");
		}

		if ($password_1 != $password_2) {
			# code...
			array_push($errors, "The two passwords do not match");
		}

		// if there r no errors, u have to save the user to the database
		if (count($errors)==0) {
			# code...
			$password = md5($password_1);
			$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
			mysqli_query($db, $sql);
			 // redirect to home page
			$_SESSION['username']= $username;
			$_SESSION['success']= "You are now logged in";
			header('location: homepage.php');
		}

	}

	// log user in from login page
	if (isset($_POST['login'])) {
		# code...
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);

		// ensure that form fields are filled properly
		if (empty($username)) {
			# code...
			array_push($errors,"Username is required");
		}
		if (empty($password)) {
			# code...
			array_push($errors,"Password is required");
		}

		if (count($errors)==0) {
			# code...
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$result = mysqli_query($db, $query);
			if (mysqli_num_rows($result)==1) {
				// log user in
				$_SESSION['username']= $username;
				//$_SESSION['password']= $password_1;
				$_SESSION['success']= "You are now logged in";
				header('location: homepage.php');
			}else{
				array_push($errors, "wrong username password combination");
			}
		}
	}

	//logout
	if (isset($_GET['logout'])) {
		# code...
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}
	?>