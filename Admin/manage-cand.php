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
		  
			$select="select * from user where Reported=0 LIMIT $start_from, $limit";
			
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
				<img src="/pixelbug/User/Pixelbug/upload_user/<?php echo "$profile_photo";?>" class="attachment-thumbnail" alt="Academy Pro Theme">
			</div>
			
			<div class="job-details">
				<h3 class="job-name"><a class="job_name_tag" href="#"><?php echo $name; ?></a></h3>
				<h5><a class="job_name_tag" href="#"><?php echo $User_id; ?></a></h5>
			
			<!--	<small class="job-company"><i class="ti-home"></i><?php/* echo $User_id; */?></small> -->
				 
				
			</div>
			</div>
			
			<div class="job-buttons">
				
				<a href="manage-cand.php?delete=<?php echo $User_id?>"><button type="button" class="btn btn-danger" data-placement="top" >Delete </button></a>
			</div>
			
		
</li>
		<?php }
		}
	?>
	<?php
	if(isset($_GET['delete']))
	{
		$delete_id=$_GET['delete'];
		
		$delete_pro="update user set Reported=1 where User_id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_pro);
		if($run_delete)
		{
				echo "<script> alert('A user has been deleted $delete_id') </script>";
				echo "<script> window.open('manage-cand.php','_self')</script>";
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

