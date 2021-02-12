<?php
include 'insert.php'; 
if(isset($_POST['submit'])) 
{
	SignUp();
} 

function SignUp() 
{
	
			if(!empty($_POST['email'])) 
			{
				global $con;
				$email=$_POST['email'];
				$query = mysqli_query($con,"SELECT * FROM user WHERE User_id = '$email'"); 
				
				if(!$row = mysqli_fetch_array($query)) 
				{ 
						newuser(); 
						
				} 
				else { echo "SORRY,YOU ARE ALREADY REGISTERED."; 
				} 
			} 
} 


function NewUser() 
{
	global $con;
	$fullname = $_POST['fname']; 
	$email = $_POST['email']; 
	$password = $_POST['pwd']; 
	$filename=$_FILES['p-pic']['name'];
	
	$query = "INSERT INTO user (U_name,User_id,U_PWD,profile_photo) VALUES ('$fullname','$email','$password','$filename')"; 
	$data = mysqli_query ($con,$query); 
	if($data) {
		echo "<script> alert('$fullname YOUR REGISTRATION IS COMPLETED...') </script>";
				echo "<script> window.open('home.php','_self')</script>";
		  
	} 
} 
mysqli_close($con);
?>

