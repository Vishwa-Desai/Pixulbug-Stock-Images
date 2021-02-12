
<?php include 'dbConfig.php'; ?>
<?php
	if(isset($_GET['deny']))
	{
		$delete_id=$_GET['deny'];
		echo $delete_id;
		$delete_pro="delete from photo1 where photo_id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_pro);
		if($run_delete)
		{
				echo "<script> alert('A photo has been deleted') </script>";
				echo "<script> window.open('manage-photo.php','_self')</script>";
		}
												
	}
?>