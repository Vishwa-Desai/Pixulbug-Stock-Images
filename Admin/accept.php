<?php include 'dbConfig.php'; ?>

<?php
	if(isset($_GET['accept']))
	{
		$accept_id=$_GET['accept'];
		echo $accept_id;
		$accept_pro="UPDATE `photo1` SET `accepted`=1 where photo_id='$accept_id'";
		$run_accept=mysqli_query($con,$accept_pro);
		if($run_accept)
		{
				
				echo "<script> alert('A photo has been updated') </script>";
				echo "<script> window.open('manage-photo.php','_self')</script>";
		}
		}
	
       
?>

		
		
												
	