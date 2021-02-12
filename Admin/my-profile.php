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
				<div class="container-fluid">
					<!-- /row -->
					<div class="row">	
						<div class="col-md-12 col-sm-12">
							<div class="card">
							
								<div class="card-header">
									<h4><?php echo "Welcome $name";?></h4>
								</div>
								
								<div class="card-body">
								
								<a href="messages.html">
									<div class="message-apt">
										<div class="user-img">
								<img src="assets/img/<?php echo $photo;?> " class="img-responsive img-circle" style="max-width:100px;" alt="">
										</div>
										</div>
									<br><br><br>
									<div class="row">
										<!-- col-md-6 -->
										<div class="col-md-5 col-12">
														
											<div class="form-group">
												<div class="contact-img">
											<img src="User/Pixelbug/upload_user/<?php echo $photo?>" class="img-circle img-responsive" alt="">
												</div>
											</div>
											
										<!-- col-md-6 -->
										</div><br>
										<table class="table">
									<thead>
										<tr> 
											<td> Name </td>
											<td><?php echo $name ?></td>
													
											<td> </td>
											
										</tr>
										
										<tr> 
											<td> ID </td>
											<td><?php echo $id  ?></td>
										
											<!--<td><a href="update_id.php?update=<?php //echo $id; ?>" style="color:BLUE;"> Edit</td> </a>-->
											
											<td> </td>
											
										</tr>
										
										
										<tr> 
											<td> Email </td>
											<td><?php echo $mail ?> </td>
										
											
											
										</tr>
										<?php
									if(isset($_GET['update']))
									{
										if(isset($_GET['newid']))
										{
										$update_id=$_GET['update'];
										$newId=$_GET['newid'];
										$update_pro="update admin set Adm_id='$newId' where Adm_id='$update_id'";
										$run_update=mysqli_query($con,$update_pro);
										$row_update=mysqli_fetch_array($run_update);
										
				
										
										if($run_update)
										{
												echo "<script> alert('A user has been updated $update_id') </script>";
												echo "<script> window.open('my-profile.php','_self')</script>";
										}
										}
																				
									}
									?>
																		
									
									</thead>
								</table>
							
										
										
										<br><br>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>	
			</div>
			<div class="modal fade" id="viewmoreModal" tabindex="-1" role="dialog" aria-labelledby="
	exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModal">Modal title</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		   <form action="my-profile.php" method="get">
		  <div class="modal-body">
			  <div class="form-group">
					<label> Email : </label>
						<input type="text" name="username" class="form-control form-contol-sm" placeholder="Enter Email">
						<?php $newID=$_GET['username']; echo $newID; ?>
				</div>
				
		 </div>
		<div class="modal-footer">
		<a href="my-profile.php?newid=<?php echo $newID; ?>" <button type="button" class="btn btn-primary" style="width:170px; border-color:white;">Save changes</button> </a>
      
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

</html>

