<?php 
//include 'dab.php';
$db = mysqli_connect('localhost','root','','registration');
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
		$id=$_GET['id'];
}

$select= mysqli_query($db,"SELECT * FROM registration.users WHERE id='$id'");
$fetch=mysqli_fetch_array($select);

if (isset($_POST['button_update'])) {
	# code...
	$title = mysqli_real_escape_string($db,$_POST['title']);
	$content = mysqli_real_escape_string($db,$_POST['content']);

	$update=mysqli_query($db,"UPDATE users SET title='$title',content='$content'WHERE id='$id'");

	if($update)
	{
		?>
		<script>alert('record updated successfully');</script>
		<?php
		header('location:homepage.php');
	}
	else
	{
		?>
		<script>alert('record failed to be updated ');</script>
		<?php
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update records</title>
</head>
<body>
<form method="post">
<table>
	<tr>
		<td>Title</td><td><input type="text" name="title" value="<?php echo $fetch['title']; ?>" required></td>
	</tr>
	<tr>
		<td>Content</td><td><input type="text" name="content" value="<?php echo $fetch['content']; ?>" required ></td>
	</tr>
</table>
<input type="submit" name="button_update" value="Update" />
</form>
</body>
</html>