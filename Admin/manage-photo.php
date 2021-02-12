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
<script src="js/jquery_ajax.min.js"></script>

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
									
								
										<span style="float:left;"><form action="Upload_me.php" method="post" enctype="multipart/form-data">
												<input type="file" name="file"> <br>
												<button type="submit" name="submit" class="btn btn-success">Get watermark </button>
						</form>
									</span>	
								
										
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
							global $con,$count;
							$count=0;
							$sql = "SELECT COUNT(*) FROM photo1";   
							$rs_result = mysqli_query($con,$sql);   
							$row = mysqli_fetch_array($rs_result);   
							$total_records = $row[0];   
							  
							// Number of pages required. 
							$limit = 6;      
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
								  $pagLink .= "<li class='active'><a href='manage-photo.php?page="
																	.$i."'>".$i."</a></li>"; 
							  }             
							  else  { 
								  $pagLink .= "<li><a href='manage-photo.php?page=".$i."'> 
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
												global $con,$count;				
												$limit = 6;      
												if (isset($_GET["page"])) {  
												  $pn  = $_GET["page"];  
												}  
												else {  
												  $pn=1;  
												};   
											  
												$start_from = ($pn-1) * $limit;
												//echo $start_from;
												$c=0;
												$select="select photo_id,User_id,photo_name,upload_on,cat_name,filename,profilename,p.accepted from photo1 p inner join contributor c on p.c_id=c.c_id inner join category c1 on c1.cat_id=c.cat_id where free=0 LIMIT $start_from, $limit";
												//echo $select;
												$run=mysqli_query($con,$select);
												
												if(!$run)
												{
														printf("Error : %s",mysqli_error($con));
														exit(0);
												}
												global $photo_id;
												while($row=mysqli_fetch_array($run))
												{			
														$photo_id=$row['photo_id'];
														$photoname=$row['photo_name'];
														$upload_on=$row['upload_on'];
														$cat_name=$row['cat_name'];
														$filename=$row['filename'];
														$nickname=$row['profilename']; 
														$accepted=$row['accepted'];
														$filename=$row['filename'];
														$User_id=$row['User_id'];
														$count++;
												?>
													<tr>												
												<td> <?php echo $count;?> </td>
												<td> <div class="job-info1">
													<div class="job-img1">

												<a href="/Pixelbug/user/pixelbug/Upload_contributor/<?php echo $User_id?>/<?php echo "$filename";?>">	<img src="/Pixelbug/user/pixelbug/Upload_contributor/<?php echo $User_id?>/<?php echo "$filename";?>" style=" border-radius: 2px;float: left;
															margin-right: 25px; display: block;max-width:35px;width: 60px;" class="attachment-thumbnail" alt="Academy Pro Theme">
												</a>
												</td>
												<td>
												<div class="job-details">
												<a class="job_name_tag" href='#' style="font-size:15px;"><?php echo "Contributor : $nickname " ?> </a><br>
												
												<a class="job_name_tag" href='#' style="font-size:15px;"><?php echo "Upload Date : $upload_on" ?></a><br>
												<a class="job_name_tag" href='#' style="font-size:15px;"><?php echo "Category Name : $cat_name" ?></a><br>
												<br>
												</td>	
												</div>
												</div>
												</td>
												
												
												<div class="job-buttons">
												
												
													  <?php if($accepted==0) { ?>
												<td><button type="button" class="btn btn-success" onclick="accept('<?php echo $photo_id?>')">Accept </button> </td>
													  
												<td>	<button type="button" class="btn btn-danger" onclick="deny('<?php echo $photo_id?>')">Deny </button> </td>
													  <?php } else if($accepted==1){
														  ?>
													  <td><p> Accepted</p> </td>
													  <td>	<button type="button" class="btn btn-danger" onclick="deny('<?php echo $photo_id?>')">Delete </button> </td>
												
													  </tr> <?php }else { }?>
												</div>
										<!-- model -->
	
											<?php
												}
											}	?>	
											
													
													 
													
													
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
<script>
	function accept(accept_id)
	{
			var conf=confirm("Are you sure?");
			if(conf==true)
			{
				$.ajax({
					url:"backend1.php",
					type:"post",
					data:{accept_id:accept_id},
					success:function(data,status){
						alert('photo accepted successfully');
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
					url:"backend1.php",
					type:"post",
					data:{delete_id:delete_id},
					success:function(data,status){
						alert('photo deleted successfully');
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
	</body>
	<?php
	/*if(isset($_GET['deny']))
	{
		$delete_id=$_GET['deny'];
		
		$delete_pro="delete from user where User_id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_pro);
		if($run_delete)
		{
				echo "<script> alert('A user has been deleted $delete_id') </script>";
				echo "<script> window.open('manage-contributors.php','_self')</script>";
		}
												
	}
	if(isset($_GET['accept']))
	{
		$accept_id=$_GET['accept'];
		echo $accept_id;
		$accept_pro="UPDATE `photo1` SET `accepted`=1 where photo_id='$accept_id'";
		$run_accept=mysqli_query($con,$accept_pro);
		if($run_accept)
		{
				
				//echo "<script> alert('A photo has been accepted') </script>";
				//echo "<script> window.open('manage-photo.php','_self')</script>";
		}
	}
		if(isset($_GET['deny']))
	{
		$delete_id=$_GET['deny'];
		echo $delete_id;
		$delete_pro="delete from photo1 where photo_id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_pro);
		if($run_delete)
		{
				echo "<script> alert('A photo has been deleted') </script>";
				echo "<script> window.open('manage-photo.php','_self')</script>";
		}
												
	}*/
       
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


