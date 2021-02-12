<?php
session_start();
if(!isset($_SESSION['Adm_id']))
{
		echo "<script> window.open('login1.php?not_admin=You are not an Admin','_self') </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from codeminifier.com/job-stock-landing-page/job-stock/dashboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Dec 2019 09:23:50 GMT -->

<?php include 'header.php'?>
<?php include 'navbar.php'?>
<?php include 'slider.php'?>	
	<body>
	
			<!-- Sidebar Navigation -->

			<div id="page-wrapper">
				<div class="row page-titles">
					<div class="col-md-5 align-self-center">
						<h3 class="text-themecolor">Home</h3>
					</div>
					<div class="col-md-7 align-self-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item active">Dashboard</li>
						</ol>
					</div>
				</div>
				<div class="container-fluid">
				
					<!-- /row -->
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="widget standard-widget">
								<div class="row">
									<div class="widget-caption info">
										<div class="col-xs-4 no-pad">
											<i class="icon icon-briefcase"></i>
										</div>
										<div class="col-xs-8 no-pad">
											<div class="widget-detail">
												<h3>5246</h3>
												<span>Jobs Posted</span>
											</div>
										</div>
										<div class="col-xs-12">
											<div class="widget-line bg-info">
												<span style="width:72%;" class="bg-info widget-horigental-line"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6">
							<div class="widget standard-widget">
								<div class="row">
									<div class="widget-caption danger">
										<div class="col-xs-4 no-pad">
											<i class="icon icon-happy"></i>
										</div>
										<div class="col-xs-8 no-pad">
											<div class="widget-detail">
												<h3>5872</h3>
												<span>Active Members</span>
											</div>
										</div>
										<div class="col-xs-12">
											<div class="widget-line bg-danger">
												<span style="width:65%;" class="bg-danger widget-horigental-line"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6">
							<div class="widget standard-widget">
								<div class="row">
									<div class="widget-caption success">
										<div class="col-xs-4 no-pad">
											<i class="icon icon-tools"></i>
										</div>
										<div class="col-xs-8 no-pad">
											<div class="widget-detail">
												<h3>9586</h3>
												<span>Tasks Posted</span>
											</div>
										</div>
										<div class="col-xs-12">
											<div class="widget-line bg-sucess">
												<span style="width:55%;" class="bg-success widget-horigental-line"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6">
							<div class="widget standard-widget">
								<div class="row">
									<div class="widget-caption warning">
										<div class="col-xs-4 no-pad">
											<i class="icon icon-trophy"></i>
										</div>
										<div class="col-xs-8 no-pad">
											<div class="widget-detail">
												<h3>870</h3>
												<span>World Award</span>
											</div>
										</div>
										<div class="col-xs-12">
											<div class="widget-line bg-warning">
												<span style="width:70%;" class="bg-warning widget-horigental-line"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- row -->
					<div class="row">
					
						<!-- Area Chart -->
						<div class="col-md-8 col-sm-12">
							<div class="card">
								<div class="card-header">
									<div class="pull-right">
										<div class="btn-group">
											<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
												<i class="ti-more"></i>
											</button>
											<ul class="dropdown-menu pull-right animated flipInX">
												<li><a href="#">This Month</a></li>
												<li><a href="#">Last Month</a></li>
												<li><a href="#">From 6 Month</a></li>
											</ul>
										</div>
									</div>
									<h4 class="mb-0">Your Profile Views</h4>
								</div>
								<div class="card-body">
									<ul class="list-inline text-center m-t-40">
										<li>
											<h5><i class="fa fa-circle m-r-5 cl-purple"></i>Page View</h5>
										</li>
										<li>
											<h5><i class="fa fa-circle m-r-5 cl-inverse"></i>Appy Job</h5>
										</li>
										<li>
											<h5><i class="fa fa-circle m-r-5 cl-success"></i>Registerd User</h5>
										</li>
									</ul>
									<div class="chart" id="profile-view" style="height: 300px;"></div>
								</div>
							</div>
						</div>
						
						<!-- Donut Chart -->
						<div class="col-md-4 col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="mb-0">View</h4>
								</div>
								<div class="card-body">
									<ul class="list-inline text-center m-t-40">
										<li>
											<h5><i class="fa fa-circle m-r-5 cl-inverse"></i> 12 Sales</h5>
										</li>
										<li>
											<h5><i class="fa fa-circle m-r-5 cl-purple"></i> 20 Order</h5>
										</li>
										<li>
											<h5><i class="fa fa-circle m-r-5 cl-success"></i> 200 Store</h5>
										</li>
									</ul>
									<div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
								</div>
							</div>	
						</div>
						
					</div>
					<!-- /.row -->
					
					<!-- Row -->
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="social social-box">
								<div class="social-slick-4 facebook-box">
									<i class="fa fa-facebook"></i>
									<h3>1240</h3>
									<span>Facebook Shares</span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6">
							<div class="social social-box">
								<div class="social-slick-4 google-plus-box">
									<i class="fa fa-google-plus"></i>
									<h3>1872</h3>
									<span>G Plus Shares</span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6">
							<div class="social social-box">
								<div class="social-slick-4 twitter-box">
									<i class="fa fa-twitter"></i>
									<h3>1750</h3>
									<span>Twitter Shares</span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6">
							<div class="social social-box">
								<div class="social-slick-4 instagram-box">
									<i class="fa fa-instagram"></i>
									<h3>2187</h3>
									<span>Instagra Followers</span>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Row -->
					<div class="row">
						<!-- col-md-6 -->
						<div class="col-md-6">
							<div class="card">
							
								<div class="card-header">
									<h4>Popular Freelancer</h4>
								</div>
								
								<div class="card-body">
									<div class="todo-list todo-list-hover todo-list-divided">
										<div class="todo todo-default">
											<div class="sm-avater list-avater">
												<img src="assets/img/user-1.jpg" class="img-responsive img-circle" alt="" />
												<span class="user-status bage-warning"></span>
											</div>
											<h5 class="ct-title">Michel Chark<span class="ct-designation">UI/UX Designer</span></h5>
											<div class="badge badge-action">
												<a href="#" class="btn btn-user btn-default btn-round btn-outline">Hire</a>
											</div>
										</div>
										<div class="todo todo-default">
											<div class="sm-avater list-avater">
												<img src="assets/img/user-2.jpg" class="img-responsive img-circle" alt="" />
												<span class="user-status bage-status"></span>
											</div>
											<h5 class="ct-title">Michel Chark<span class="ct-designation">SEO Expert</span></h5>
											<div class="badge badge-action">
												<a href="#" class="btn btn-user btn-round btn-success">Hired</a>
											</div>
										</div>
										<div class="todo todo-default">
											<div class="sm-avater list-avater">
												<img src="assets/img/user-3.jpg" class="img-responsive img-circle" alt="" />
												<span class="user-status bage-danger"></span>
											</div>
											<h5 class="ct-title">Michel Chark<span class="ct-designation">PHP Expert</span></h5>
											<div class="badge badge-action">
												<a href="#" class="btn btn-user btn-round btn-success">Hired</a>
											</div>
										</div>
										<div class="todo todo-default">
											<div class="sm-avater list-avater">
												<img src="assets/img/user-4.jpg" class="img-responsive img-circle" alt="" />
												<span class="user-status bage-success"></span>
											</div>
											<h5 class="ct-title">Michel Chark<span class="ct-designation">App Designer</span></h5>
											<div class="badge badge-action">
												<a href="#" class="btn btn-user btn-default btn-round btn-outline">Hire</a>
											</div>
										</div>
										<div class="todo todo-default">
											<div class="sm-avater list-avater">
												<img src="assets/img/user-5.jpg" class="img-responsive img-circle" alt="" />
												<span class="user-status bage-warning"></span>
											</div>
											<h5 class="ct-title">Michel Chark<span class="ct-designation">Web Developer</span></h5>
											<div class="badge badge-action">
												<a href="#" class="btn btn-user btn-round btn-success">Hired</a>
											</div>
										</div>
									</div>	
								</div>
							</div>
						</div>
						<!-- /col-md-6 -->
						
						<!-- col-md-6 -->
						
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
						<div class="tabbable-line">
							<ul class="nav nav-tabs ">
								<li class="active">
									<a href="#options" data-toggle="tab">
									<i class="ti-palette"></i> </a>
								</li>
								<li>
									<a href="#comments" data-toggle="tab">
									<i class="ti-bell"></i> </a>
								</li>
								<li>
									<a href="#freinds" data-toggle="tab">
									<i class="ti-comment-alt"></i> </a>
								</li>
							</ul>
								<div class="tab-pane" id="freinds">
									<div class="accept-request">
										<div class="friend-overview">
											<div class="friend-overview-img">
												<img src="assets/img/user-1.jpg" class="img-responsive img-circle" alt="">
												<span class="fr-user-status online"></span>
											</div>
											<div class="fr-request-detail">
												<h4>Adam Dax <span class="task-time pull-right">Just Now</span></h4>
												<p>Accept Your Friend Request</p>
											</div>
										</div>
										<div class="friend-overview">
											<div class="friend-overview-img">
												<img src="assets/img/user-2.jpg" class="img-responsive img-circle" alt="">
												<span class="fr-user-status offline"></span>
											</div>
											<div class="fr-request-detail">
												<h4>Rita Ray <span class="task-time pull-right">2 Min Ago</span></h4>
												<p>Accept Your Friend Request</p>
											</div>
										</div>
										<div class="friend-overview">
											<div class="friend-overview-img">
												<img src="assets/img/user-3.jpg" class="img-responsive img-circle" alt="">
												<span class="fr-user-status busy"></span>
											</div>
											<div class="fr-request-detail">
												<h4>Daniel Mark <span class="task-time pull-right">7 Min Ago</span></h4>
												<p>Accept Your Friend Request</p>
											</div>
										</div>
										<div class="friend-overview">
											<div class="friend-overview-img">
												<img src="assets/img/user-4.jpg" class="img-responsive img-circle" alt="">
												<span class="fr-user-status offline"></span>
											</div>
											<div class="fr-request-detail">
												<h4>Shruti Singh <span class="task-time pull-right">10 Min Ago</span></h4>
												<p>Accept Your Friend Request</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer"> ©Copyright 2018 Job Stock </footer>
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
		
		<!-- Morris.js charts -->
		<script src="assets/plugins/js/raphael.min.js"></script>
		<script src="assets/plugins/js/morris.min.js"></script>

		<!-- Custom Theme JavaScript -->
		<script src="assets/js/custom.js"></script>
		<script src="assets/js/dashboard-4.js"></script>

	</body>

<!-- Mirrored from codeminifier.com/job-stock-landing-page/job-stock/dashboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Dec 2019 09:24:18 GMT -->
</html>


