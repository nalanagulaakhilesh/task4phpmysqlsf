<?php
//include 'dab.php'
$db = mysqli_connect('localhost','root','','registration');
if (isset($_GET['id']) && is_numeric($_GET['id'])) {


	$id=$_GET['id'];

	$delete=mysqli_query($db,"DELETE FROM users WHERE id='$id'");

	if($delete)
	{
		?>
		<script>alert('record deleted succcessfully')</script>
		<?php
		echo '<script type="text/javascript">window.location="homepage.php";</script>';
	}
	else
	{
		?>
		<script>alert('record could not be deleted ')</script>
		<?php
	}
}
?>