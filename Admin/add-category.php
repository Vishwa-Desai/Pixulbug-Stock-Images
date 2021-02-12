<?php
session_start();
if(!isset($_SESSION['Adm_id']))
{
		echo "<script> window.open('login1.php?not_admin=You are not an Admin','_self') </script>";
}
?><!DOCTYPE html>
<head>
<?php include 'header.php'?>
<?php include 'navbar.php'?> 	
<?php include 'slider.php'?>
<?php include 'dbConfig.php'?>
<!--<link rel="stylesheet" href="css/bootstrap.min.css"> 
<style>
table
{
	border:1px solid black;

}
</style>

</head>
	<body>
				
			<!-- Sidebar Navigation -->

			<div id="page-wrapper">
				<div class="row page-titles">
					<div class="col-md-5 align-self-center">
						<h3 class="text-themecolor">Add Category</h3>
					</div>
					<div class="col-md-7 align-self-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0)">For Employer</a></li>
							<li class="breadcrumb-item active">Add Category</li>
						</ol>
					</div>
				</div>
				<div class="container-fluid">
					<!-- /row -->
					<div class="row">
						<!-- General Information -->
						<div class="card">
						
							<div class="card-header">
							

								<form action="add-category.php" method="post">
									<div class="col-sm-4">
									
										<label>Category Name</label>
										<input type="text" class="form-control" name="category">
									</div>
									<div class="text-center">
								<div class="col-sm-2">	
									<br>
								<button type="submit" name="submit" class="btn btn-success" style="width:100px;margin-top:10px;">Add </button>
							</form>
							
							</div>
							</div>
							</div>
							
							
							<div class="card-body">
							<?php
	if(isset($_GET['delete']))
	{
		$cat_id=$_GET['delete'];
		
		$delete_pro="delete from category where cat_id='$cat_id'";
		$run_delete=mysqli_query($con,$delete_pro);
		if($run_delete)
		{ ?>
		

	<?php }

	} ?>	
<?php
							if(isset($_POST['submit']))
							{
								$name=$_POST['category'];
								
								$sql="insert into category(cat_name) values('$name')";
							    $run=mysqli_query($con,$sql);
									if(!$run)
									{
										//echo 'Not inserted';
									   
									}
								  else
								  {?>
							 
		<?php 						  }
												 
								}
								?>	
																	

					
		
					
								<div class="row">
								
						
						<div class="table-responsive">
						<table class="table table-striped table-bordered">
														<thead>
															<tr>
																<th>Category ID </th>
																<th>Category Name</th>
																
																<th>Delete</th>
																
															</tr>
														</thead>
														<tbody>
															<tr>
															<?php get(); ?>
															</tr>													</tr>
														</tbody>
													</table>
												</div>
												</div>
						</div>		
<ul class="pagination"> 
      <?php   
	  global $con;
        $sql = "SELECT COUNT(*) FROM category";   
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
              $pagLink .= "<li class='active'><a href='add-category.php?page="
                                                .$i."'>".$i."</a></li>"; 
          }             
          else  { 
              $pagLink .= "<li><a href='add-category.php?page=".$i."'> 
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
						  
							$select="select cat_id,cat_name from category LIMIT $start_from, $limit";
							$run=mysqli_query($con,$select);
							if(!$run)
							{
									printf("Error : %s",mysqli_error($con));
									exit(0);
							}
							while($row=mysqli_fetch_array($run))
							{				
									$cat_id=$row['cat_id'];
									$cat_name=$row['cat_name'];

							
							?>
						<tr>												
												<td> <?php echo $cat_id;?> </td>
												<td> <?php echo $cat_name;?> </td>
												
												<div class="job-buttons">
												
												
												<td>		<a href="add-category.php?delete=<?php echo $cat_id?>"><button type="button" class="btn btn-danger" data-placement="top" >Delete </button></a>
											
												</tr>
												</div>
										
											<?php
												}
											}	?>	
											
										
													
												
												
		
							
			<footer class="footer"> ©Copyright 2020 Pixelbug </footer>
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
		<script src="css/bootstrap.min.js"></script>
		
		
		<!-- Custom Theme JavaScript -->
		<script src="assets/js/custom.js"></script>
		
		<script>
			ClassicEditor
				.create( document.querySelector( '#editor' ) )
				.catch( error => {
					console.error( error );
				} );
		</script>
		<script>
			ClassicEditor
				.create( document.querySelector( '#editor1' ) )
				.catch( error => {
					console.error( error );
				} );
		</script>

	</body>

<!-- Mirrored from codeminifier.com/job-stock-landing-page/job-stock/dashboard/add-freelancer.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Dec 2019 09:25:10 GMT -->
</html>

