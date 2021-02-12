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
						<h3 class="text-themecolor">Manage Photos</h3>
					</div>
					<div class="col-md-7 align-self-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0)">For Employer</a></li>
							<li class="breadcrumb-item active">Manage Photos</li>
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
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
								<thead>
									<tr>
										
										<th>No. </th>
										<th>Photo</th>
										<th>view more</th>
										<th>Accept</th>
										<th>Deny</th>
										
									</tr>
								</thead>
								<tbody>
									<tr>
									<?php get(); ?>
									</tr>		
								</tbody>
							</table>
						</div>
						</div>
						</div>		
						<ul class="pagination"> 
							<?php   
							global $con;
							$sql = "SELECT COUNT(*) FROM photo1";   
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
								  $pagLink .= "<li class='active'><a href='manage-photos.php?page="
																	.$i."'>".$i."</a></li>"; 
							  }             
							  else  { 
								  $pagLink .= "<li><a href='manage-photos.php?page=".$i."'> 
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
			
										
			<div id="sidebar-wrapper">
				<a id="right-close-sidebar-toggle" href="#" class="theme-bg btn close-toogle toggle">
				Setting Pannel <i class="ti-close"></i></a>
				<div class="right-sidebar" id="side-scroll">
					<div class="user-box">
						<div class="profile-img1">
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
												
												$limit = 4;      
												if (isset($_GET["page"])) {  
												  $pn  = $_GET["page"];  
												}  
												else {  
												  $pn=1;  
												};   
											  
												$start_from = ($pn-1) * $limit;   
												$c=0;
												$select="select photo_id,photo_name,upload_on,cat_name,filename,profilename from photo1 p inner join contributor c on p.c_id=c.c_id inner join category c1 on c1.cat_id=c.cat_id LIMIT $start_from, $limit";
												
												$run=mysqli_query($con,$select);
												
												if(!$run)
												{
														printf("Error : %s",mysqli_error($con));
														exit(0);
												}
												while($row=mysqli_fetch_array($run))
												{			
														global $photoname,$upload_on,$photo_id,$cat_name,$nickname;
														$photo_id=$row['photo_id'];
														$photoname=$row['photo_name'];
														$upload_on=$row['upload_on'];
														$cat_name=$row['cat_name'];
														$filename=$row['filename'];
														$nickname=$row['profilename']; 
													
														$c++;
												?>
													<tr>												
												<td> <?php echo $photo_id;?> </td>
												<td> <div class="job-info1">
													<div class="job-img1">
													<img src="uploads/<?php echo "$filename";?>" style=" border-radius: 2px;float: left;
															margin-right: 25px; display: blockk;max-width:35px;width: 60px;" class="attachment-thumbnail" alt="Academy Pro Theme">
												</div>
												</div>
												</td>
												
												
												<div class="job-buttons">
												
												<td>	<button type="button" class="btn btn-info"  data-placement="top"data-toggle="modal" data-target="#viewmoreModal">View More</button> 
													  </td>
												<td>	<a href="accept.php?accept=<?php echo $photo_id; ?>"><button type="button" class="btn btn-success" data-placement="top" >Accept </button></a> </td>
													  
												<td>	<a href="delete_photo.php?deny=<?php echo $photo_id; ?>"><button type="button" class="btn btn-danger" data-placement="top" >Deny </button></a> </td>
												</tr>
												</div>
										
											<?php
												}
											}	?>	
											
													
													 
													
													
												</div>
												</div>
												
												
											
		<!-- model -->
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
		   <form action="" method="POST">
		  <div class="modal-body">
			  
					<label> Photo Name : </label>
						<input type="text" name="username" class="form-control form-contol-sm" placeholder="<?php echo $photoname;?>">
					<label>Upload Date</label>
						<input type="text" name="email" class="form-control form-contol-lg" placeholder="<?php echo $upload_on;?>">
					<label>Category Name</label>
						<input type="text" name="email" class="form-control form-contol-lg" placeholder="<?php echo $cat_name;?>">
					<label>Contributor Name</label>
						<input type="text" name="email" class="form-control form-contol-lg" placeholder="<?php echo $nickname;?>">
				
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
	<?php
	if(isset($_GET['delete']))
	{
		$delete_id=$_GET['delete'];
		
		$delete_pro="delete from user where User_id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_pro);
		if($run_delete)
		{
				echo "<script> alert('A user has been deleted $delete_id') </script>";
				echo "<script> window.open('manage-contributors.php','_self')</script>";
		}
												
	}
?>

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


