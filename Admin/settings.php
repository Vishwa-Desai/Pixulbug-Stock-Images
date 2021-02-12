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

	$sql1="select * from settings";
	$run1=mysqli_query($con,$sql1);
	global $name1,$admin,$contact,$desc1,$email1;
while($row=mysqli_fetch_array($run1))
{
			$name1=$row['web_name'];
			$email1=$row['email'];
			$desc1=$row['web_desc'];
			$admin=$row['Admin']; 
			$contact=$row['contact'];
}

 ?>

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
											<label class="col-md-2 col-sm-3">Description:</label>
											<div class="col-md-10 col-sm-9">
												<textarea class="form-control" rows="3" cols="3" name="website_desc" placeholder="<?php echo $desc1 ?>"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 col-sm-3">Admin:</label>
											<div class="col-md-10 col-sm-9">
												<input type="text" class="form-control" name="website_URL" placeholder="<?php echo $admin ?>">
											</div>
										</div>
										
										
										<div class="form-group">
											<label class="col-md-2 col-sm-3">Contact email:</label>
											<div class="col-md-10 col-sm-9">
												<input type="email" class="form-control" name="email" placeholder="<?php echo $email1?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 col-sm-3">Contact Number:</label>
											<div class="col-md-10 col-sm-9">
												<input type="text" class="form-control" name="email" placeholder="<?php echo $contact?>">
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

