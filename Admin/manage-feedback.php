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
						<h3 class="text-themecolor">Manage Feedback</h3>
					</div>
					<div class="col-md-7 align-self-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0)">For Employer</a></li>
							<li class="breadcrumb-item active">Manage Feedback</li>
						</ol>
					</div>
				</div>
				<div class="container-fluid">
					<!-- /row -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
						
							<div class="card">
								<div class="card-body">
									<ul class="list" id="myUL">
										<?php	get(); ?>
									</ul>
					 <ul class="pagination"> 
							<?php   
							global $con;
							$sql = "SELECT COUNT(*) FROM feedback";   
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
								  $pagLink .= "<li class='active'><a href='manage-feedback.php?page="
																	.$i."'>".$i."</a></li>"; 
							  }             
							  else  { 
								  $pagLink .= "<li><a href='manage-feedback.php?page=".$i."'> 
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
					  $pn = $_GET["page"];  
					}  
					else {  
					  $pn=1;  
					};   
				  
					$start_from = ($pn-1) * $limit;   
				  
					$sql="select * from feedback where accepted=0";

					
					$run=mysqli_query($con,$sql);
					global $user_id,$name,$msg;
					while($row=mysqli_fetch_array($run))
					{
						$user_id=$row['User_id'];
						$name=$row['U_name'];
						$msg=$row['Msg'];
$show=$row['show_'];						
					?>
						<li class="manage-list-row clearfix">
						<div class="job-info">
					<div class="job-details">
						<h3 class="job-name"><a class="job_name_tag" href='#'><?php echo "Name : $name   ";?></a></h3>
						<h5 class="job-name"><a class="job_name_tag" href='#'><?php echo "Email  : $user_id";?></a></h3>
						<h5 class="job-name"><a class="job_name_tag" href='#'><?php echo "Feedback : $msg";?></a></h3>
				</div>
					</div>
					
					<div class="job-buttons">
					<?php if($show==0) {?>
					<a href="manage-feedback.php?add=<?php echo $user_id?>"><button type="button" class="btn btn-success" data-placement="top" >Add </button></a>
					<a href="manage-feedback.php?delete=<?php echo $user_id?>"><button type="button" class="btn btn-danger" data-placement="top" >Delete </button></a>
				
					<?php } else {?>
					<a href="manage-feedback.php?delete=<?php echo $user_id?>"><button type="button" class="btn btn-danger" data-placement="top" >Delete </button></a>
					<?php }?>
						</div>
					</li>
				<?php
					}
				}
				?>	
					<?php
				if(isset($_GET['add']))
				{
					$add_id=$_GET['add'];
					$add_pro="update feedback set show_=1 where User_id='$add_id'";
					$run_add=mysqli_query($con,$add_pro);
					if($run_add)
					{
							echo "<script> window.open('manage-feedback.php','_self')</script>";
					}
															
				}
				if(isset($_GET['delete']))
				{
					$delete_id=$_GET['delete'];
					$delete_pro="update feedback set accepted=1 where User_id='$delete_id'";
					$run_delete=mysqli_query($con,$delete_pro);
					if($run_delete)
					{
							echo "<script> window.open('manage-feedback.php','_self')</script>";
					}
															
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


