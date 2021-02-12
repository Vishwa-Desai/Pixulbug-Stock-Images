<?php
session_start();
if(!isset($_SESSION['Adm_id']))
{
		echo "<script> window.open('login1.php?not_admin=You are not an Admin','_self') </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
	
<head>
<?php include 'header.php'?>
<?php include 'navbar.php'?>
<?php include 'slider.php'?>	
<?php include 'dbConfig.php'?>
</head>
<body>
<?php

	if(isset($_POST['save']))
	{
			$name=$_POST['website_name'];
			$url=$_POST['website_URL'];
			$title=$_POST['website_title'];
			$desc=$_POST['website_desc'];
			$email=$_POST['email'];
		/*	if(isset($_FILES['file']))
			{
				echo $_FILES['file'];
				$filename = $_FILES['file']['name'];
				$file_type= $_FILES['file']['type'];
				$file_size= $_FILES['file']['size'];
				$file_tem_loc=$_FILES['file']['tmp_name'];
				$file_store="images/Upload_admin/".$filename;
				move_uploaded_file($file_tem_loc,$file_store);
			} */
	
		//	$filename=$files['name'];
			

			//print_r($files);
					
			$sql="update `settings` set `web_name`='$name', `web_URL`='$url', `web_desc`='$desc', `email`='$email'";
		    $run=mysqli_query($con,$sql);
                if($run)
                {
					echo "<script> alert('Registred successfully')</script>";
					echo "<script> window.open('index.php,'_self')</script>";
                   
                }
                  else
                  {
                     echo "Not inserted";
                  }
	$sql1="select * from settings";
	$run1=mysqli_query($con,$sql1);

//fetch all rows of table from database
while($row=mysqli_fetch_array($run1)) //run pass as reference
{
			$name1=$row['web_name'];
			$url1=$row['web_URL'];
			$desc1=$row['web_desc'];
			$email1=$row['email']; 
			$files = $row['logo'];
}

} ?>

			<!-- Sidebar Navigation -->

			<div id="page-wrapper">
				<div class="row page-titles">
					<div class="col-md-5 align-self-center">
						<h3 class="text-themecolor">Settings</h3>
					</div>
					<div class="col-md-7 align-self-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0)">Advance</a></li>
							<li class="breadcrumb-item active">Settings</li>
						</ol>
					</div>
				</div>
				<div class="container-fluid">
					<!-- /row -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card">
							
								<div class="card-header">
									<h4>Basic Settings</h4>
								</div>
								
								<div class="card-body">
									<form class="form-horizontal" action="#" method="post">
									
										<div class="form-group">
											<label class="col-md-2 col-sm-3">Name:</label>
											<div class="col-md-10 col-sm-9">
												<input type="text" class="form-control" name="website_name" placeholder="<?php echo $name1 ?>">
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-2 col-sm-3">URL:</label>
											<div class="col-md-10 col-sm-9">
												<input type="text" class="form-control" name="website_URL" placeholder="<?php echo $url1 ?>">
											</div>
										</div>
										
										
										<div class="form-group">
											<label class="col-md-2 col-sm-3">Description:</label>
											<div class="col-md-10 col-sm-9">
												<input type="text" class="form-control" name="website_desc">
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-2 col-sm-3">Contact email:</label>
											<div class="col-md-10 col-sm-9">
												<input type="email" class="form-control" name="email">
											</div>
										</div>
										
										
										
										
										
										<div class="form-group">
											<label class="col-md-2 col-sm-3">Upload Logo:</label>
											<div class="col-md-10 col-sm-9">
												<label class="btn-bs-file btn">
													Browse
													<input type="file" name="file">
												</label>
											</div>
										</div>
										
										<div class="form-group">
											<div class="col-md-12 col-sm-12 text-center">
												<input type="submit" class="btn btn-info sweet-1" name="save" value="save & update">
											</div>
										</div>
										
									</form>
									
								</div>
								
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>	
			</div>
			<!-- /#page-wrapper -->
			<div id="sidebar-wrapper">
				<a id="right-close-sidebar-toggle" href="#" class="theme-bg btn close-toogle toggle">
				Setting Pannel <i class="ti-close"></i></a>
				<div class="right-sidebar" id="side-scroll">
					<div class="user-box">
						<div class="profile-img">
							<img src="assets/img/user-3.jpg" alt="user">
							<!-- this is blinking heartbit-->
							<div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
						</div>
						<div class="profile-text">
							<h4>Daniel Dax</h4>
							 <a href="#" class="user-setting"><i class="ti-settings"></i></a>
							 <a href="#" class="user-mail"><i class="ti-email"></i></a>
							 <a href="#" class="user-call"><i class="ti-headphone"></i></a>
							 <a href="#" class="user-logout"><i class="ti-power-off"></i></a>
						</div>
					
			<footer class="footer"> ©Copyright 2020 Pixelbug</footer>
		</div>
		<!-- /#wrapper -->

		<!-- jQuery -->
		<script src="assets/plugins/js/jquery.min.js"></script>
		<script src="assets/plugins/js/bootstrap.min.js"></script>
		<script src="assets/plugins/js/metisMenu.min.js"></script>	
		<script src="assets/plugins/js/jquery.slimscroll.js"></script>
		<script src="assets/plugins/js/sweetalert.js"></script>
		<script src="assets/plugins/js/datepicker.js"></script>
		<script src="assets/plugins/js/ckeditor.js"></script>
		<script src="assets/plugins/js/select2.min.js"></script>
		<script src="assets/js/loader.js"></script>
		
		<!-- Custom Theme JavaScript -->
		<script src="assets/js/custom.js"></script>
		
		<script>
			ClassicEditor
				.create( document.querySelector( '#editor' ) )
				.catch( error => {
					console.error( error );
				} );
		</script>
		<script>
			ClassicEditor
				.create( document.querySelector( '#editor1' ) )
				.catch( error => {
					console.error( error );
				} );
		</script>

	</body>

<!-- Mirrored from codeminifier.com/job-stock-landing-page/job-stock/dashboard/settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Dec 2019 09:25:00 GMT -->
</html>

