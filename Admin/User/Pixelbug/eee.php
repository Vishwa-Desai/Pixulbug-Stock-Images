<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from codeminifier.com/job-stock-landing-page/job-stock/dashboard/manage-candidate.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Dec 2019 09:25:06 GMT -->
<head>
<?php include 'header.php'?>
<?php include 'navbar.php'?>
<?php include 'slider.php'?>
<?php include 'dbConfig.php'?>

</head>
<body>		
				
			<!-- Sidebar Navigation -->
			<div id="page-wrapper">
				<div class="row page-titles">
					<div class="col-md-5 align-self-center">
						<h3 class="text-themecolor">Add Category</h3>
					</div>
					<div class="col-md-7 align-self-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0)">For Employer</a></li>
							<li class="breadcrumb-item active">Add Category</li>
						</ol>
					</div>
				</div>
				<div class="container-fluid">
					<!-- /row -->
					<div class="row">
						<!-- General Information -->
						<div class="card">
						
							<div class="card-header">
								<h4>General Information</h4>

							</div>
							
								
								
								<div class="card-body">
								<br> <br>
									<ul class="list">
									<li class="manage-list-row clearfix">
											<div class="row">
								<form action="add-category.php" method="post">
									<div class="col-sm-4">
										<label>Category Name</label>
										<input type="text" class="form-control" name="category">
									</div>
									<div class="text-center">
								<div class="col-sm-2">	
									<br>
								<input type="submit" style="height:40px;width:100px;margin-top:10px; background-color: #cc0033; border-color:white;" value="Add" name="submit">
								
							</form>
			
									</div>
									
								</div>
								</div><br> 
								<table class="table table-bordered">
									<thead>
										<tr> 
											<th> category No. </th>
											<th> category name </th>
											<th> No of contributors </th>
											<th> No of freelancers </th>
											<th> Edit </th>
											<th> Delete</th>
										</tr>
										
										<?php 	get(); ?>
									
									</thead>
								</table>
							
								
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
												$select="select * from category";
												$select1="select count(c_id) from contributors where cat_id=1";
												$run=mysqli_query($con,$select);
												if(!$run)
												{
														printf("Error : %s",mysqli_error($con));
														exit(0);
												}
												while($row=mysqli_fetch_array($run))
												{				
														$cat_id=$row['cat_id'];
														$catname=$row['cat_name'];
												
							
												echo	" 
												<tr>	
												<td> $cat_id </td>
												<td> $catname </td>
												<td> </td>
												<td>  </td>
												
												
												<td>
													<a href='#'> <button type='button' class='btn btn-success'  data-placement='top'>Edit</button></a> 
												</td>
												<td>
													<a href=''><button type='button' class='btn btn-danger' data-placement='top' >Delete </button></a>
												</td>
												</tr>
												";
												}	
											}?>								

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

	</body>

<!-- Mirrored from codeminifier.com/job-stock-landing-page/job-stock/dashboard/manage-candidate.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Dec 2019 09:25:07 GMT -->
</html>

