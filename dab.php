<?php
$db = mysqli_connect('localhost','root','','registration');
if (!mysqli_connect("localhost","root","",'registration')) {
	echo "Connection error";
}

if (!mysqli_select_db($db,"registration")) {
	# code...
	echo " Selection error";
}

?>