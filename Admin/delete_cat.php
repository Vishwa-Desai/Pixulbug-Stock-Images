<?php include 'dbConfig.php'; ?>
<?php
	if(isset($_GET['delete']))
	{
		$cat_id=$_GET['delete'];
		
		$delete_pro="delete from category where cat_id='$cat_id'";
		$run_delete=mysqli_query($con,$delete_pro);
		if($run_delete)
		{
				echo "<script> alert('A category has been deleted $cat_id') </script>";
				echo "<script> window.open('add-category.php','_self')</script>";
		}
												
	}
?>