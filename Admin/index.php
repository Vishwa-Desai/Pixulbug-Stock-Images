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
<?php include 'dbConfig.php'?>	
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
											
										</div>
										<div class="col-xs-8 no-pad">
											<div class="widget-detail">
											<?php 
								global $con,$total1;
								$sql = "SELECT COUNT(*) FROM photo1";   
								$rs_result = mysqli_query($con,$sql); 
								$row = mysqli_fetch_array($rs_result); 
								$total1 = $row[0];   
							  	?>	
												<h3><?php echo $total1;?></h3>
												<span>No. of photos</span>
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
										
										</div>
										<div class="col-xs-8 no-pad">
											<div class="widget-detail">
											<?php 
								global $con,$total2;
								$sql = "SELECT COUNT(*) FROM user";   
								$rs_result = mysqli_query($con,$sql); 
								$row = mysqli_fetch_array($rs_result); 
								$total2 = $row[0];   
							  	?>	
												<h3><?php echo $total2?></h3>
												<span>Active Users</span>
											</div>
										</div>
										<div class="col-xs-12">
											<div class="widget-line bg-danger">
												<span style="width:45%;" class="bg-danger widget-horigental-line"></span>
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
										
										</div>
										<div class="col-xs-8 no-pad">
											<div class="widget-detail">
											<?php 
								global $con,$total3;
								$sql = "SELECT COUNT(*) FROM contributor where accepted=1";   
								$rs_result = mysqli_query($con,$sql); 
								$row = mysqli_fetch_array($rs_result); 
								$total3 = $row[0];   
							  	?>	
												<h3><?php echo $total3?></h3>
												<span>Active contributors</span>
											</div>
										</div>
										<div class="col-xs-12">
											<div class="widget-line bg-sucess">
												<span style="width:50%;" class="bg-success widget-horigental-line"></span>
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
										
										</div>
										<div class="col-xs-8 no-pad">
											<div class="widget-detail">
											<?php 
								global $con,$total4;
								$sql = "SELECT COUNT(*) FROM portfolio";   
								$rs_result = mysqli_query($con,$sql); 
								$row = mysqli_fetch_array($rs_result); 
								$total4 = $row[0];   
							  	?>	
												<h3><?php echo $total4;?></h3>
												<span>No. of portfolios</span>
											</div>
										</div>
										<div class="col-xs-12">
											<div class="widget-line bg-warning">
												<span style="width:20%;" class="bg-warning widget-horigental-line"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- row -->
					
					<!-- Row -->
					<div class="row">
						<!-- col-md-6 -->
						<div class="col-md-6">
							<div class="card">
							
								<div class="card-header">
									<h4>Popular Contributors</h4>
								</div>
								<?php 
								global $con,$total3;
								$sql = "SELECT c.profilename,c1.cat_name,u.profile_photo FROM contributor c inner join category c1 on c.cat_id=c1.cat_id inner join user u on u.User_id=c.User_id where accepted=1 limit 4,8";   
								$rs_result = mysqli_query($con,$sql);
								while($row=mysqli_fetch_array($rs_result))
												{			
														global $profilename,$catname;
														$profilename=$row['profilename'];
														$cat_name=$row['cat_name'];
														$profile_photo=$row['profile_photo'];
							  	?>	
											
								
								<div class="card-body">
									<div class="todo-list todo-list-hover todo-list-divided">
										<div class="todo todo-default">
											<div class="sm-avater list-avater">
												<img src="/Pixelbug/User/Pixelbug/upload_user/<?php echo $profile_photo;?>" class="img-responsive img-circle" alt="" />
												<span class="user-status bage-warning"></span>
											</div>
											<h5 class="ct-title"><?php echo $profilename;?><span class="ct-designation"><?php echo $cat_name;?></span></h5>
											
										</div>
								</div>	
								</div>
												<?php }?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
							
								<div class="card-header">
									<h4>Popular Freelancers</h4>
									<?php 
								global $con;
								$sql = "SELECT c1.cat_name,u.profile_photo,p.cat_id,u.U_name FROM portfolio p inner join category c1 on p.cat_id=c1.cat_id inner join user u on u.User_id=p.User_id";   
								$rs_result = mysqli_query($con,$sql);
								while($row=mysqli_fetch_array($rs_result))
								{			
														global $profilename,$catname;
														
														$profilename=$row['U_name'];
														$cat_name=$row['cat_name'];
														$profile_photo=$row['profile_photo'];
							  	?>	
											
								
								</div>
								
								<div class="card-body">
									<div class="todo-list todo-list-hover todo-list-divided">
										<div class="todo todo-default">
											<div class="sm-avater list-avater">
												<img src="/Pixelbug/User/Pixelbug/upload_user/<?php echo $profile_photo;?>" class="img-responsive img-circle" alt="" />
												<span class="user-status bage-warning"></span>
											</div>
											<h5 class="ct-title"><?php echo $profilename;?><span class="ct-designation"><?php echo $cat_name;?></span></h5>
										</div>
							</div>												<?php }?>
						</div>
						

						</div>
						
						</div>
						<div class="row">
						<!-- col-md-6 -->
						<div class="col-md-12">
							<div class="card">
							
								<div class="card-header">
									<h4 style="color:#cc0033;"><b>Total Payment of last 10 days</b></h4>
									<?php
									global $amt,$amt1;
									$s="completed";
									$date=date("y/m/d");
									$date1=date("y/m/d",strtotime("-10 Days"));
		
									
									$sql="select Total_amt,Date_created from order_1 where O_Status='$s' and Date_created between '$date1' and '$date'";
									$run=mysqli_query($con,$sql);
									while($row=mysqli_fetch_array($run))
									{
										$amt+=$row['Total_amt']; 
									}
									echo "<h4><b>Rs. ".$amt.".00"."</b></h4>";
									
									$sql="select Total_amt,Date_created from order_1 where O_Status='$s' and Date_created='$date'";
									$run=mysqli_query($con,$sql);
									while($row=mysqli_fetch_array($run))
									{
										$amt1=$row['Total_amt']; 
	
									}?><br>
									<h4 style="color:#cc0033;"><b>Total Payment of Today</b></h4>
									<?php
									if($amt1=="")
									{
										echo "<h4><b>No payments Yet. </b></h4>";
									}
									else
									{
										echo "<h4><b>Rs. ".$amt1.".00"."</b></h4><br>";
									
									}
									
									?>
									
										
									
								</div>
						
						
						</div>
						</div>
						</div>
						
						
						
						</div>
										
						<!-- /col-md-6 -->
						
						<!-- col-md-6 -->
						
			<footer class="footer"> ©Copyright 2020 PIXELBUG </footer>
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


