<?php
session_start();
if(!isset($_SESSION['Adm_id']))
{
		echo "<script> window.open('login1.php?not_admin=You are not an Admin','_self') </script>";
}

	

?><!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from codeminifier.com/job-stock-landing-page/job-stock/dashboard/freelancers.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Dec 2019 09:25:01 GMT -->
<?php include 'header.php'?>
<?php include 'navbar.php'?>
<?php include 'slider.php'?>

	
<body>
	
			<!-- Sidebar Navigation -->
			<div id="page-wrapper">
				<div class="row page-titles">
					<div class="col-md-5 align-self-center">
						<h3 class="text-themecolor">Manage Freelancers</h3>
					</div>
					<div class="col-md-7 align-self-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0)">For Employer</a></li>
							<li class="breadcrumb-item active">Manage Freelancrs</li>
						</ol>
					</div>
				</div>
				<div class="container-fluid">
					<!-- /row -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card">
							
								<div class="card-header">
									<div class="pull-right">
									<form action="#" method="post">
										<select class="form-control" name="option">
											<option>Short By</option>
											<option>Category</option>
											<option>Name</option>
									
										</select>
									</form>
									</div>
									<input type="text" class="form-control wide-width" placeholder="Search & type" />
								</div>
								
								<div class="card-body">
									<ul class="list">
										<?php	get(); ?>
									</ul>
									
									<div class="flexbox padd-10">
										<ul class="pagination">
											<li class="page-item">
											  <a class="page-link" href="#" aria-label="Previous">
												<i class="ti-arrow-left"></i>
												<span class="sr-only">Previous</span>
											  </a>
											</li>
											<li class="page-item active"><a class="page-link" href="#">1</a></li>
											<li class="page-item"><a class="page-link" href="#">2</a></li>
											<li class="page-item"><a class="page-link" href="#">3</a></li>
											<li class="page-item">
											  <a class="page-link" href="#" aria-label="Next">
												<i class="ti-arrow-right"></i>
												<span class="sr-only">Next</span>
											  </a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>	
			</div>
			<!-- /#page-wrapper -->
			
			<!-- Send Message -->
			<div id="SendMessage" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<form>
							<div class="modal-header theme-bg">						
								<h4 class="modal-title">Send Message</h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							</div>
							<div class="modal-body">					
								<div class="form-group">
									<label>Title</label>
									<input type="text" class="form-control">
								</div>
								<div class="form-group">
									<label>Address</label>
									<textarea class="form-control big-height"></textarea>
								</div>					
							</div>
							<div class="modal-footer">
								<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
								<input type="submit" class="btn btn-success" value="Send">
							</div>
						</form>
					</div>
				</div>
			</div>
										
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
						
			</div>
			<?php include 'footer.php'?>
		</div>
	<div class="job-info">
										<?php
										
											function get()
											{
												global $con;
												if(isset($_POST['option']))
												{
													
													$op1=$_POST['option'];
														print_r($op1);
													if($op1=='Name')
													{
															$select="select * from user order by U_name DESC";
													}
													else if($op1=='')
													{
															$select="select * from user";
													}
												}
												$select="select * from user";
												$run=mysqli_query($con,$select);
												/*if(!$check1_res)
												{
														printf("Error : %s",mysqli_error($con));
														exit(0);
												}*/
												while($row=mysqli_fetch_array($run))
												{												
														$User_id=$row['User_id'];
														$name=$row['U_name'];  
														$profile_photo=$row['profile_photo'];
												
												echo	" 
													<li class='manage-list-row clearfix'>
													<div class='job-info'>
													<div class='job-img'>
													<img src='assets/img/$profile_photo' class='attachment-thumbnail' alt='Academy Pro Theme'>
												</div>
												
												<div class='job-details'>
													<h3 class='job-name'><a class='job_name_tag' href='#'>$name</a></h3>
													<small class='job-company'><i class='ti-home'></i>Email : $User_id</small>
													 
													
												</div>
												</div>
												
												<div class='job-buttons'>
													
													<a href='More_info.php'> <button type='button' class='btn btn-success'  data-placement='top'>View More</button></a> 
													<a href='delete.php?delete=$User_id'><button type='button' class='btn btn-danger' data-placement='top' >Delete </button></a>
												</div>
												</li>";
												}
											}?>
										
		<!-- /#wrapper -->

		

			<footer class="footer"> ©Copyright PixelBug </footer>
		</div>
		<!-- /#wrapper -->

		<!-- jQuery -->
		<script src="assets/plugins/js/jquery.min.js"></script>
		<script src="assets/plugins/js/bootstrap.min.js"></script>
		<script src="assets/plugins/js/metisMenu.min.js"></script>	
		<script src="assets/plugins/js/jquery.slimscroll.js"></script>
		<script src="assets/plugins/js/datepicker.js"></script>
		<script src="assets/plugins/js/ckeditor.js"></script>
		<script src="assets/plugins/js/select2.min.js"></script>
		<script src="assets/js/loader.js"></script>

		<!-- Custom Theme JavaScript -->
		<script src="assets/js/custom.js"></script>

	</body>

<!-- Mirrored from codeminifier.com/job-stock-landing-page/job-stock/dashboard/freelancers.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Dec 2019 09:25:01 GMT -->
</html>

