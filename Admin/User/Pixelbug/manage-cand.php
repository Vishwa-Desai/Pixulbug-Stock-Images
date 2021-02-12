<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from codeminifier.com/job-stock-landing-page/job-stock/dashboard/manage-candidate.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Dec 2019 09:25:06 GMT -->
<head>
<!-- include files -->
<?php include 'header.php'?>
<?php include 'navbar.php'?>
<?php include 'slider.php'?>
<?php include 'dbConfig.php'?>
<style>
span{ margin-left:40px;
margin-top:0px;}
</style>
</head>
<body>
	<div id="page-wrapper">
		<div class="row page-titles">
		<div class="col-md-5 align-self-center">
				<h3 class="text-themecolor">Manage Users</h3>
		</div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:void(0)">For Employer</a></li>
				<li class="breadcrumb-item active">Manage Users</li>
		</ol>
	</div>
		</div>
<div class="container-fluid">
					<!-- /row -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card">
							
								<div class="card-header">
									
				<input type="text" class="form-control wide-width" placeholder="Search & type" id="myInput" onkeyup="myFunction()"/>
									
									
								
					
								
								<div class="card-body">
									<ul class="list" id="myUL">
										<?php	get(); ?>
									</ul>
									<!-- pagination -->
									  <ul class="pagination"> 
											<?php   
											  global $con;
												$sql = "SELECT COUNT(*) FROM user";   
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
													  $pagLink .= "<li class='active'><a href='manage-cand.php?page="
																						.$i."'>".$i."</a></li>"; 
												  }             
												  else  { 
													  $pagLink .= "<li><a href='manage-cand.php?page=".$i."'> 
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
	<div class="job-info"> <!-- get function -->
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
		  
			$select="select * from user LIMIT $start_from, $limit";
			
			$run=mysqli_query($con,$select);
			/*if(!$check1_res)
			{
					printf("Error : %s",mysqli_error($con));
					exit(0);
			}*/
			while($row=mysqli_fetch_array($run))
			{	
				//	global $User_id,$pass;
					$User_id=$row['User_id'];
					$name=$row['U_name'];  
					$pass=$row['U_PWD'];
					$profile_photo=$row['profile_photo'];
			?>

				<li class="manage-list-row clearfix">
				<div class="job-info">
				<div class="job-img">
				<img src="assets/img/<?php echo "$profile_photo";?>" class="attachment-thumbnail" alt="Academy Pro Theme">
			</div>
			
			<div class="job-details">
				<h3 class="job-name"><a class="job_name_tag" href="#"><?php echo $name; ?></a></h3>
			<!--	<small class="job-company"><i class="ti-home"></i><?php/* echo $User_id; */?></small> -->
				 
				
			</div>
			</div>
			
			<div class="job-buttons">
				
				<button type="button" class="btn btn-success"  data-placement="top"data-toggle="modal" data-target="#viewmoreModal">View More</button> 
				<a href="delete_user.php?delete=<?php echo $User_id?>"><button type="button" class="btn btn-danger" data-placement="top" >Delete </button></a>
			</div>
			
			<!-- model -->
	<div class="modal fade" id="viewmoreModal" tabindex="-1" role="dialog" aria-labelledby="
	exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModal">Users' Info</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		   <form action="" method="POST">
		  <div class="modal-body">
			  <div class="form-group">
					<label> Email : </label>
						<input class="form-control" type="text" placeholder="<?php echo $User_id;?>" readonly>
				
					<label>Name : </label>
						<input class="form-control" type="text" placeholder="<?php echo $name;?>" readonly>
					
				</div>
				
		 </div>
	</div>		
	</div>

</li>
		<?php }
		}
	?>
	
										
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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<!-- Custom Theme JavaScript -->
<script src="assets/js/custom.js"></script>
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

</body>

<!-- Mirrored from codeminifier.com/job-stock-landing-page/job-stock/dashboard/manage-candidate.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Dec 2019 09:25:07 GMT -->
</html>

