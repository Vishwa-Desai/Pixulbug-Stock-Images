<?php
session_start();
if(isset($_SESSION['User_id']))
{
	$User_id=$_SESSION['User_id'];
	$uname=$_SESSION['U_name'];
}
include 'insert.php';
if(isset($_POST['submit'])) 
{
	if(!isset($_SESSION['User_id']))
	{
		echo "<script> window.open('login1.php','_self')</script>";
	}
	else
	{
	global $con;
	$name = $_POST['name'];  
	$phone= $_POST['phone'];
	$msg=$_POST['comment'];
	$query = "INSERT INTO feedback(User_id,Msg,phone_no,U_name) VALUES('$User_id','$msg','$phone','$name')"; 
	$data = mysqli_query($con,$query); 
	if($data) {
	echo json_encode(array("statusCode"=>200));
	}	 
	else
	{
		echo json_encode(array("statusCode"=>201));
	
	} 
	
} 
}
?>