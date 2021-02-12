<?php
include 'dbConfig.php';

	global $con;
	if(isset($_POST['accept_id']))
	{
	$accept_id=$_POST['accept_id'];
	$accept_pro="UPDATE `contributor` SET `accepted`=1 where c_id='$accept_id'";
	$run_accept=mysqli_query($con,$accept_pro);
	}
	if(isset($_POST['delete_id']))
	{
	$delete_id=$_POST['delete_id'];
	$delete_pro="UPDATE `contributor` SET `accepted`=2  where c_id='$delete_id'";
	$run_delete=mysqli_query($con,$delete_pro);
	}
?>