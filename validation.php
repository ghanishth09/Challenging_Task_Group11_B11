<?php

session_start();
$con = mysqli_connect('localhost','root','admin@1234');

mysqli_select_db($con, 'logindb');

$email = $_POST['email'];
$pass = $_POST['pass'];
$hash_val = md5($pass);

$s = "select * from registration where email = '$email' && pass = '$hash_val' ";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if ($num==1) {
	header('location:register2.html');
} else{
	echo '<script>alert("Enter Correct Password")</script>';
	header('location:login.html');
}

?>
