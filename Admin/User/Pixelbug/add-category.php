<!DOCTYPE html>
<head>
<?php include 'header.php'?>
<?php include 'navbar.php'?> 	
<?php include 'slider.php'?>
<?php include 'dbConfig.php'?>
<!--<link rel="stylesheet" href="css/bootstrap.min.css"> -->
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
								<input type="submit" style="height:40px;width:100px;margin-top:10px; background-color: #cc0033; border-color:white;" value="Add" name="submit">
								
							</form>
							<?php
							if(isset($_POST['submit']))
							{
								$name=$_POST['submit'];
								
								$sql="insert into category(cat_name) values('$name')";
							    $run=mysqli_query($con,$sql);
									if(!$run)
									{
										echo 'Not inserted';
									   
									}
								  else
								  {
									echo "<script> alert('Category added successfully')</script>";
									echo "<script> window.open('add-category.php','_self')</script>";
									header('Location: ../add-category.php?add=success'); 
								  }
												 
								}
								?>	
																	

				
							</div>
							</div>
							</div>
							
							
							
							<div class="card-body">
							
								<div class="row">
								
						
						<div class="table-responsive">
						<table class="table table-striped table-bordered">
														<thead>
															<tr>
																<th>Category ID </th>
																<th>Category Name</th>
																<th>Edit</th>
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
						</div><br> <br>
										
										<br><br>
									
								
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>	
			</div>
					<!-- /row -->
				</div>	
			</div>
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
												
												<td>	<button type="button" class="btn btn-success"  data-placement="top"data-toggle="modal" data-target="#viewmoreModal">View More</button> 
													  </td>
												<td>		<a href="delete_cat.php?delete=<?php echo $cat_id?>"><button type="button" class="btn btn-danger" data-placement="top" >Delete </button></a>
											
												</tr>
												</div>
										
											<?php
												}
											}	?>	
											
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
																  <div class="form-group">
												
																		<label> Category Name </label>
																		<input type="text" name="username" class="form-control" placeholder="Enter Username">
																	</div>
															</div>
															  </form>
															  
																<div class="modal-footer">
																	<button type="button" class="btn btn-primary">Save changes</button>
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																  </div>
															
															  </div>
															</div>
														  </div>
														</div>		
														</div>
											

								 
													
												
												</div>			
												</div>
											
				<?php
					if(isset($_POST['cat_id']))
					{
						$id=$_POST['cat_id'];
						
						$sql="update category set cat_name=$name where cat_id='$id'";
					$run=mysqli_query($con,$sql);
              /*  if(!$run)
                {
					echo 'Not inserted';
                   
                }
                  else
                  {
                  	echo '<script> alert('Category added successfully')</script>';
					echo '<script> window.open('add-category.php','_self')</script>';
                    header('Location: ../add-category.php?add=success'); 
                  }*/
							 
			}
			?>	
							
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

