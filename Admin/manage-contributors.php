<?php
session_start();
if(!isset($_SESSION['Adm_id']))
{
		echo "<script> window.open('login1.php?not_admin=You are not an Admin','_self') </script>";
}

	

?><!DOCTYPE html>


<html lang="en">
	
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
							
								
									<?php
									if(isset($_GET['deny']))
									{
										$delete_id=$_GET['deny'];
										
										$delete_pro="delete from contributor where c_id='$delete_id'";
										$run_delete=mysqli_query($con,$delete_pro);
										if($run_delete)
										{
										}
									}
								
					
					if(isset($_GET['accept']))
					{
						$accept_id=$_GET['accept'];
						echo $accept_id;
						$accept_pro="UPDATE `contributor` SET `accepted`=1 where c_id='$accept_id'";
						$run_accept=mysqli_query($con,$accept_pro);
						if($run_accept)
						{}
					}
				?>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									
									<th>No. </th>
									<th>Contributor</th>
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
					
					 <ul class="pagination" id="myUL"> 
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
											
												$select="select c_id,c.User_id,profilename,U_name,profile_photo,c.accepted,cat_name,experience from contributor c inner join user u on c.User_id=u.User_id inner join category c1 on c1.cat_id=c.cat_id where accepted<2 LIMIT $start_from, $limit";
									
												$run=mysqli_query($con,$select);
												if(!$run)
												{
														printf("Error : %s",mysqli_error($con));
														exit(0);
												}$c=0;
												$count=mysqli_num_rows($run);
												while($row=mysqli_fetch_array($run))
												{			
														global $nickname,$catname,$User_id,$exp,$name,$c_id;
														
														$nickname=$row['profilename'];
														$catname=$row['cat_name'];
														$User_id=$row['User_id'];
														$exp=$row['experience'];
														$name=$row['U_name'];  
														$profile_photo=$row['profile_photo'];
														$accepted=$row['accepted'];
														$c_id=$row['c_id'];
														$c++;
														
												?>
													<tr>												
													<td> <?php echo $c;?> </td>
													<td> <div class="job-info1">
													<div class="job-img1">
													<img src="/Pixelbug/user/pixelbug/upload_user/<?php echo "$profile_photo";?>" class="attachment-thumbnail" alt="Academy Pro Theme">
												</div>
												
												<div class="job-details">
												<a class="job_name_tag" href='#' style="font-size:17px;"><?php echo $nickname ?></a><br>
												<a class="job_name_tag" href='#' style="font-size:17px;"><?php echo "Name : $name";?></a><br>
												<a class="job_name_tag" href='#' style="font-size:17px;margin-left:85px;"><?php echo "category : $catname ";?></a>
												
												</div>
												</div>
												</td>
												<div class="job-buttons">
												
												
													  <?php if($accepted==0) { ?>
									<td><button type="button" class="btn btn-success" onclick="accept('<?php echo $c_id?>')">Accept </button> </td>
													  
												<td>	<button type="button" class="btn btn-danger" onclick="deny('<?php echo $c_id?>')">Deny </button> </td>
													  <?php } else if($accepted==1) { ?>
													  <td><p> Accepted</p> </td>
													 <td> <button type="button" class="btn btn-danger" onclick="deny('<?php echo $c_id?>')">Delete </button></a>
														</td>
													  </tr></div></div>
										<!-- model -->
	
											<?php
												}
												
												
												
												
												
												
												
												
												
												
												
											}}	?>	
	
		
	<script>
	function accept(accept_id)
	{
			var conf=confirm("Are you sure?");
			if(conf==true)
			{
				$.ajax({
					url:"backend2.php",
					type:"post",
					data:{accept_id:accept_id},
					success:function(data,status){
						alert('Contributor accepted successfully');
						console.log('success:\n');
						console.log(data);
 
					},
					error: function(a, b, c) {
					  console.log('error:\n');
					  console.log(data);
					}
					});
			}
	}
	function deny(delete_id)
	{
			var conf=confirm("Are you sure?");
			if(conf==true)
			{
				$.ajax({
					url:"backend2.php",
					type:"post",
					data:{delete_id:delete_id},
					success:function(data,status){
						alert('contributor deleted successfully');
						console.log('success:\n');
						console.log(data);
 
					},
					error: function(a, b, c) {
					  console.log('error:\n');
					  console.log(data);
					}
					});
			}
	}
			
	</script>
	
												
									
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


</html>