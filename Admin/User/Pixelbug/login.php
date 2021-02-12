<?php
session_start();
$error="";
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
include 'insert.php';
$username=$_POST['username'];
$password=$_POST['password'];
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($con,$username);
$password = mysqli_real_escape_string($con,$password);
$query = mysqli_query($con,"select * from user where U_PWD='$password' AND User_id='$username'");
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$_SESSION['User_id']=$username; // Initializing Session
header("location: home.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";

}
if($error!="")
{
	echo $error;
}
mysqli_close($con); // Closing Connection
}
}
?>
