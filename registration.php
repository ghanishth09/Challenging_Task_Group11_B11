<?php

session_start();
$con = mysqli_connect('localhost','root','admin@1234');

mysqli_select_db($con, 'logindb');

$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$phone_no = $_POST['phone_no'];
$dob = $_POST['birthdate'];
$gender = $_POST['radio'];

$s = "select * from registration where email = '$email' ";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if ($num==1) {
	echo" Email already registered";
} else{
	$reg= " insert into registration(fname,lname,email,pass,phone_no,dob,gender) values ('$fname','$lname','$email',md5('$pass'),'$phone_no','$dob','$gender')";
	mysqli_query($con,$reg);
	echo"Registration Successful";
}
header('location:login.html');
?>