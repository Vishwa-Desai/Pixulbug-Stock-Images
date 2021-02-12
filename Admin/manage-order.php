<?php
session_start();
if(!isset($_SESSION['Adm_id']))
{
		echo "<script> window.open('login1.php?not_admin=You are not an Admin','_self') </script>";
}
?>
<html lang="en">
<head>
<?php include 'header.php'?>
<?php include 'navbar.php'?>
<?php include 'slider.php'?>
<?php include 'dbConfig.php'?>
</head>
<body>		
			<div id="page-wrapper">
				<div class="row page-titles">
					<div class="col-md-5 align-self-center">
						<h3 class="text-themecolor">Manage Orders</h3>
					</div>
					<div class="col-md-7 align-self-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0)">For Employer</a></li>
							<li class="breadcrumb-item active">Manage Orders</li>
						</ol>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card">
							<div class="card-body">
									<ul class="list">
								<?php get(); ?>
									</ul>
									  <ul class="pagination"> 
      <?php   
	  global $con;
        $sql = "SELECT COUNT(*) FROM order_1";   
        $rs_result = mysqli_query($con,$sql);   
        $row = mysqli_fetch_array($rs_result);   
        $total_records = $row[0];   
          
        // Number of pages required. 
		$limit = 5;      
												if (isset($_GET["page"])) {  
												  $pn  = $_GET["page"];  
												}  
												else {  
												  $pn=1;  
												};   
											  
												$start_from = ($pn-1) * $limit;   
											  
        $total_pages = ceil($total_records / $limit);   
        $pagLink = "";                         
        for ($i=1; $i<=$total_pages; $i++) { 
          if ($i==$pn) { 
              $pagLink .= "<li class='active'><a href='manage-order.php?page="
                                                .$i."'>".$i."</a></li>"; 
          }             
          else  { 
              $pagLink .= "<li><a href='manage-order.php?page=".$i."'> 
                                                ".$i."</a></li>";   
          } 
        };   
        echo $pagLink;   
      ?> 
									<div class="flexbox padd-10">

										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>	
			</div>
			<?php include 'footer.php'?>
		</div>
	<div class="job-info">
										<?php
										
											function get()
											{
												global $con;
												
												$limit = 4;      
												if (isset($_GET["page"])) {  
												  $pn  = $_GET["page"];  
												}  
												else {  
												  $pn=1;  
												};   
											  
												$start_from = ($pn-1) * $limit;   
												
												$select="SELECT `O_id`, `User_id`, `Date_created`, `Total_amt`, `O_Status`,`name` FROM `order_1` where accepted=0 LIMIT $start_from, $limit";
												$run=mysqli_query($con,$select);
												if(!$run)
												{
														printf("Error : %s",mysqli_error($con));
														exit(0);
												}
												global $user_id,$name;
												while($row=mysqli_fetch_array($run))
												{				
														$o_id=$row['O_id'];
														$user_id=$row['User_id'];
														$date=$row['Date_created'];
														$Total_amt=$row['Total_amt'];
														$status=$row['O_Status'];
														$name=$row['name'];
													
												?>
													<li class="manage-list-row clearfix">
													<div class="job-info">
													
												
												<div class="job-details">
													<h3 class="job-name"><a class="job_name_tag" href='#'><?php echo "Order ID : $o_id"; ?></a></h3>
													<h3 class="job-name"><a class="job_name_tag" href='#'><?php echo "Date_created : $date ";?></a></h3>
													
													<small class="job-company"><?php echo "Email : $user_id ";?></small>
												<small class="job-sallery"><?php echo "Total Amount : $Total_amt";?></small>
												<?php if($status=="pending")
												{?>
												<div class="shortlisted-can">Pending</div>
												<?php } else if($status=="completed") { ?>
												<div class="shortlisted-can">Completed</div>
												<?php }?>
											</div>
												</div>
												
												<div class="job-buttons">
												
					<a href="invoice.php?o_id=<?php echo $o_id;?>"><button type="button" class="btn btn-success" data-placement="top" >Print Invoice</button></a>
											
					<a href="order1.php?o_id=<?php echo $o_id;?>"><button type="button" class="btn btn-danger" data-placement="top" >Send Mail </button></a>
					<a href="manage-order.php?delete=<?php echo $o_id; ?>" class="btn btn-cancel manage-btn" data-toggle="tooltip" data-placement="top" title="Remove"><i class="ti-close"></i></a>
										
													</div>
												</li>
											<?php
												}
											}	?>	

			
									
	

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
	<?php
	if(isset($_GET['delete']))
	{
		$delete_id=$_GET['delete'];
		
		$delete_pro="update order_1 set accepted=1 where O_id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_pro);

		$delete_pro1="update order_1 set accepted=1  where O_id='$delete_id'";
		$run_delete1=mysqli_query($con,$delete_pro1);
		if($run_delete)
		{
			if($run_delete1)
			{
			
				//echo "<script> alert('A user has been deleted $delete_id') </script>";
				echo "<script> window.open('manage-order.php','_self')</script>";
			}
		}
												
	}
?>

<!-- Mirrored from codeminifier.com/job-stock-landing-page/job-stock/dashboard/manage-candidate.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Dec 2019 09:25:07 GMT -->
</html>

