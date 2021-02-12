<?php
include 'insert.php';
global $con;
	if(isset($_GET['delete']))
	{
		$delete_id=$_GET['delete'];
		$accept_pro="delete from user where User_id='$delete_id'";
		$run_accept=mysqli_query($con,$accept_pro);
		if($run_accept)
		{
				unset($_SESSION['User_id']);
				unset($_SESSION['U_name']);
				
				//echo "<script> alert('A photo has been updated') </script>";
				echo "<script> window.open('index.php','_self')</script>";
		}								
	}
?>
