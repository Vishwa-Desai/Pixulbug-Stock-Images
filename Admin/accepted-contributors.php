<?php
session_start();
if(!isset($_SESSION['Adm_id']))
{
		echo "<script> window.open('login1.php?not_admin=You are not an Admin','_self') </script>";
}

	

?><!DOCTYPE html>


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
						<h3 class="text-themecolor">Manage Contributors</h3>
					</div>
					<div class="col-md-7 align-self-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0)">For Employer</a></li>
							<li class="breadcrumb-item active">Manage Contributors</li>
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
									
									</div>
									<input type="text" class="form-control wide-width" placeholder="Search & type" id="myInput" onkeyup="myFunction()"/>
								</div>
									<?php
									if(isset($_GET['delete']))
									{
										$delete_id=$_GET['delete'];
										
										$delete_pro="delete from user where User_id='$delete_id'";
										$run_delete=mysqli_query($con,$delete_pro);
										if($run_delete)
										{
												//echo "<script> alert('A user has been deleted $delete_id') </script>";
												echo '<div class="allert alert-danger alert-dismissible mt-2">
													<button type="button" class="close" data-dismiss="alert">&times;</button>
													<strong> Item Deleted successfully </strong> </div>';
												echo "<script> window.open('manage-contributors.php','_self')</script>";
										}
																				
									}
									?>
								<div class="card-body">
									<ul class="list" id="myUL">
										<?php	get(); ?>
									</ul>
					 <ul class="pagination"> 
							<?php   
							global $con;
							$sql = "SELECT COUNT(*) FROM contributor";   
							$rs_result = mysqli_query($con,$sql);   
							$row = mysqli_fetch_array($rs_result);   
							$total_records = $row[0];   
							  
							// Number of pages required. 
							$limit = 4;      
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
								  $pagLink .= "<li class='active'><a href='manage-contributors.php?page="
																	.$i."'>".$i."</a></li>"; 
							  }             
							  else  { 
								  $pagLink .= "<li><a href='manage-contributors.php?page=".$i."'> 
																	".$i."</a></li>";   
							  } 
							};   
							echo $pagLink;   
							?> 
								
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
												
												$select="select c_id,c.User_id,profilename,U_name,profile_photo,cat_name,experience from contributor c inner join user u on c.User_id=u.User_id inner join category c1 on c1.cat_id=c.cat_id LIMIT $start_from, $limit";
												$run=mysqli_query($con,$select);
												if(!$run)
												{
														printf("Error : %s",mysqli_error($con));
														exit(0);
												}
												while($row=mysqli_fetch_array($run))
												{			
														global $nickname,$catname,$User_id,$exp,$name,$c_id,$total;
														$nickname=$row['profilename'];
														$catname=$row['cat_name'];
														$User_id=$row['User_id'];
														$exp=$row['experience'];
														$name=$row['U_name'];  
														$profile_photo=$row['profile_photo'];
														$c_id=$row['c_id'];
														$sql="SELECT COUNT(*) FROM photo2 where c_id='$c_id'";   
														$rs_result=mysqli_query($con,$sql);
														$row1 = mysqli_fetch_array($rs_result);   
														$total = $row1[0];   
												
												?>
													<li class="manage-list-row clearfix">
													<div class="job-info">
													<div class="job-img">
													<img src="assets/img/<?php echo "$profile_photo";?>" class="attachment-thumbnail" alt="Academy Pro Theme">
												</div>
												
												<div class="job-details">
													<h3 class="job-name"><a class="job_name_tag" href='#'><?php echo $nickname ?></a></h3>
													<h3 class="job-name"><a class="job_name_tag" href='#'><?php echo "Name : $name ";?></a></h3>
													
													
													 
													
													
												</div>
												</div>
												
												<div class="job-buttons">
													<button type="button" class="btn btn-success"  data-placement="top"data-toggle="modal" data-target="#viewmoreModal">View More</button> 
				
													<a href="manage-contributors.php?delete=<?php echo $User_id?>"><button type="button" class="btn btn-danger" data-placement="top" >Delete </button></a>
											
													</div>
												</li>
											<?php
												}
											}	?>	
								
		<!-- model -->
	<div class="modal fade" id="viewmoreModal" tabindex="-1" role="dialog" aria-labelledby="
	exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModal">Contributors' Info</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		   <form action="" method="POST">
		  <div class="modal-body">
			  <div class="form-group">
					<label> Email : </label>
						<input class="form-control" type="text" placeholder="<?php echo $User_id;?>" readonly>
				<div class="form-group">
					<label>Name : </label>
						<input class="form-control" type="text" placeholder="<?php echo $name;?>" readonly>
					<label>From which category he/she belong : </label>
						<input class="form-control" type="text" placeholder="<?php echo $catname;?>" readonly>
					<label>No of photos	: </label>
						<input class="form-control" type="text" placeholder="<?php echo $total;?>" readonly>
				
				
				</div>
				
		 </div>
	</div>		
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

	</body>
	
<!-- Mirrored from codeminifier.com/job-stock-landing-page/job-stock/dashboard/manage-candidate.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Dec 2019 09:25:07 GMT -->
</html>
<script>
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>


