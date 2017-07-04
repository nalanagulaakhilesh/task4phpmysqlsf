<?php include('server.php'); 
//include('dab.php');


$us=$_SESSION['username'];
	$title ="";
	$content ="";
$d = mysqli_connect('localhost','root','','registration');
//$fet = "SELECT username FROM users WHERE username='$username' limit 1";
if(isset($_POST['button_insert']))
{
	$title = mysqli_real_escape_string($d,$_POST['title']);
	//$title=$_POST['title'];
	//$content=$_POST['content'];
	$content = mysqli_real_escape_string($d,$_POST['content']);
	$ins=("INSERT INTO users (username,title, content) VALUES ('$us','$title','$content')");
	mysqli_query($db, $ins);
	if ($ins) {
		# code...
?>
	<script>alert('Record Inserted Succesfully');</script>
<?php
}
else
{
	?>
	<script>alert('error in adding record');</script>
	<?php
	}

}
	//if user is not logged in, they cannot access this page
	if (empty($_SESSION['username'])) {
		# code...
		header('location: login.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>User registration system</title>
	<link rel="stylesheet" type="text/css" href="styhom.css">
</head>
<body>
<div class="intro1">
	<pre><h1>Note Maker              			 			 <?php if (isset($_SESSION["username"])): ?><a href="homepage.php?logout='1'" style="color: cyan;font-size: 22px;text-decoration:none;">Logout</a>
		<?php endif ?></h1></pre>
</div>
<div class="header1">
	<h2>Home Page</h2>
</div>

<div class="content">
	<?php if (isset($_SESSION['success'])): ?>
		<div class="error success">
			<h3>
				<?php
					echo $_SESSION['success'];
					unset($_SESSION['success']);
				?>
			</h3>
		</div>
	<?php endif ?>

	<?php if (isset($_SESSION["username"])): ?>
		<div class="Welcome"><p>Greetings!! <strong><?php echo $_SESSION['username']; ?></div></strong></p>
		<p><a href="homepage.php?logout='1'" style="color: red;"></a></p>
		<?php endif ?>
</div>
<br>
<br>
<pre style="text-align: center;color:cyan;font-family: Arial, Helvetica, sans-serif;">Welcome to the official site of  <strong>Note Maker</strong>!  Here you can prepare your own notes and edit them whenever you wish to!
Happy Noting!! </pre>
<br>
<br>
<center>
<form method="post" action="homepage.php">
<div class="tab">
<table cellpadding="5">
	<tr>
		<td style="font-family: Arial, Helvetica, sans-serif;font-size: 22px;color: cyan">Category  </td><td><input type="text" name="title" placeholder="Enter The Category of Your Note (eg. bank, address,meeting,reminder)"  style="font-size: 19px;background-color: cyan;width: 90%;height: 40px;" required></td>
	</tr>
	<tr>
		<td style="font-family: Arial, Helvetica, sans-serif;font-size: 22px;color: cyan;">Content    </td><td><input type="text" name="content" placeholder="Enter Your Note" style="font-size: 19px; background-color: cyan; width: 90%;height: 40px;" required></td>
	</tr>
</table>
</div>
<div class="createnote">
<input type="submit" name="button_insert" value="Create Note" style="font-size: 22px;margin-left: 10px;margin-top: 20px;border-style: solid; border-color: orange;background-color: #ffff99;color: #000066;cursor: pointer;height: 40px;border-radius: 5px;"  />
</div>
</form>
</center>
<center>
<br>
<br>
<div  class="header1" style="font-size: 40px;">
Notes<br><br></div>
<table cellpadding="5" border="1" bgcolor="white">
	<tr>
		<th>Title</th><th>Your Content</th><th>Edit</th><th>Delete</th>
	</tr>
<?php
	$show=mysqli_query( $d,"SELECT * FROM registration.users WHERE username='$us'");
	
	while ($res=mysqli_fetch_array($show)) {
?>
	<tr>
		<td><?php echo $res['title'];?></td><td><?php echo $res['content'];?></td><td><a href="update.php?id=<?php echo $res['id'];?>">Edit</a></td><td><a href="delete.php?id=<?php echo $res['id'];?>" onClick="return confirm('are u sure u want to delete this record')">Delete</a></td>
	</tr>
<?php
	}

?>
</table>
<?php  echo $_SESSION['username'] ;?>
</center>
</body>
</html>