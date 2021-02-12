<?php

if(isset($_POST['submit'])) 
{
	SignUp();
} 

function SignUp() 
{
	
			if(!empty($_POST['email'])) 
			{
				global $con;
				echo "hii";
				$email=$_POST['email'];
				$query = mysqli_query($con,"SELECT * FROM user WHERE User_id = '$email'"); 
				
				if(!$row = mysqli_fetch_array($query)) 
				{ 
						newuser(); 
						
				} 
				else { 
				$output=array('success' => true);
					echo json_encode($output);
				
				} 
			} 
} 


function NewUser() 
{
	global $con;
	$fullname = $_POST['fname']; 
	$email = $_POST['email']; 
	$pass = $_POST['pwd']; 
	$password=md5($pass);
	$filename=$_FILES['p-pic']['name'];
	$_SESSION['User_id']=$email;
	$_SESSION['U_name']=$fullname; 
	$filename=$_FILES['p-pic']['name'];
	$tempname=$_FILES['p-pic']['tmp_name'];
	$target_dir="C:/xampp/htdocs/Pixelbug/User/Pixelbug/Upload_user/";
	$target_file=$target_dir.basename($_FILES['p-pic']['name']);

	if(move_uploaded_file($tempname,$target_file))
	{
	//echo "uploaded";
	}
	$query = "INSERT INTO user (U_name,User_id,U_PWD,profile_photo) VALUES ('$fullname','$email','$password','$filename')"; 
	$data = mysqli_query ($con,$query); 
	if($data) {
				echo "<script> window.open('index.php','_self')</script>";
		  
	} 
} 
mysqli_close($con); ?>