<!-- Update Admin id -->
<?php
session_start();
if(!isset($_SESSION['Adm_id']))
{
		echo "<script> window.open('login1.php?not_admin=You are not an Admin','_self') </script>";
}
include 'dbConfig.php';
$sql="select * from `admin` where Adm_id='admin' and Adm_pwd='admin' ";
			$run=mysqli_query($con,$sql);
			$check=mysqli_num_rows($run);
			$row1=mysqli_fetch_assoc($run);
			$id=$row1['Adm_id'];
			$name=$row1['Adm_name'];
			$photo=$row1['profile_photo'];
			$pass=$row1['Adm_pwd'];
			$mail=$row1['Mail_id'];
?><!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from codeminifier.com/job-stock-landing-page/job-stock/dashboard/my-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Dec 2019 09:25:01 GMT -->
<head>
<?php include 'header.php'?>;
<?php include 'navbar.php'?>; 	
<?php include 'slider.php'?>;

</head>
<body>
				
			<!-- Sidebar Navigation -->

			<div id="page-wrapper">
				<div class="row page-titles">
					<div class="col-md-5 align-self-center">
						<h3 class="text-themecolor">My Profile</h3>
					</div>
					<div class="col-md-7 align-self-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item active">My Profile</li>
						</ol>
					</div>
				</div>
				
			<form action="" method="POST">
			  
					<label>Enter Email : </label>
						<input type="text" name="username" class="form-control form-contol-sm" placeholder="Enter Email">
				<div class="modal-footer">
       <a href="update_id.php?update=<?php echo $id; ?>" <button type="button" class="btn btn-primary" style="width:170px; border-color:white;">Save changes</button> </a>
      
      </div>
				
		 </div>
		 
	</div>		
	</div>
</div>
			<footer class="footer"> ©Copyright 2020 Pixelbug </footer>
		</div>
		<!-- /#wrapper -->

		<!-- jQuery -->
		<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/plugins/js/jquery.min.js"></script>
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

	</body>

<!-- Mirrored from codeminifier.com/job-stock-landing-page/job-stock/dashboard/my-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Dec 2019 09:25:02 GMT -->
</html>

<?php include 'dbConfig.php'; ?>
<?php
	if(isset($_GET['update']))
	{
		$update_id=$_GET['update'];
		
		$update_pro="select * from admin where Adm_id='$update_id'";
		$run_update=mysqli_fetch_array($con,$update_pro);
		if($run_update)
		{
				echo "<script> alert('A user has been updated $update_id') </script>";
				echo "<script> window.open('manage-contributors.php','_self')</script>";
		}
												
	}
?>