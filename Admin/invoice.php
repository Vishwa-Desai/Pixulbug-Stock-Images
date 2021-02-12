<?php
session_start();
if(!isset($_SESSION['Adm_id']))
{
		
		echo "<script> window.open('login1.php?not_admin=You are not an Admin','_self') </script>";
}
include 'dbConfig.php';
global $con,$o_id;
if(isset($_GET['o_id']))
	{
		
		$o_id=$_GET['o_id'];
		$accept_pro="select * from order_1 where O_id='$o_id'";
		$run=mysqli_query($con,$accept_pro);
		global $o_id,$User_id,$date,$status,$amount,$number,$name1;
		while($row=mysqli_fetch_array($run))
		{
			$o_id=$row['O_id'];
			$User_id=$row['User_id'];
			$date=$row['Date_created'];
			$amount=$row['Total_amt'];
			$number=$row['mobile_number'];
			$name1=$row['name'];
			
		}
		
												
	}					
?><!DOCTYPE html>
<html lang="en">
<?php include 'header.php'?>
<?php include 'navbar.php'?> 	
<?php include 'slider.php'?>	

			<div id="page-wrapper">
				<div class="row page-titles">
					<div class="col-md-5 align-self-center">
						<h3 class="text-themecolor">Invoice</h3>
					</div>
					<div class="col-md-7 align-self-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item active">Invoice</li>
						</ol>
					</div>
				</div>
				<div class="container-fluid">
					<!-- /row -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card">
							
								<div class="card-header">
									<h4>View Invoice</h4>
								</div>
								
								<div class="card-body">
									<div class="row text-center">
										<div class="col-md-6">
											<a href="javascript:window.print()" class="btn btn-danger">Print this invoice</a>
										</div>
									</div>
									
									<div class="row mrg-0">
										<div class="col-md-6">
											<div id="logo"><img src="assets/img/logo.png" class="img-responsive" alt=""></div>
										</div>

										<div class="col-md-6">	
											<p id="invoice-info">
												<strong>Order:</strong> <?php echo $o_id;?><br>
												<strong>Issued:</strong> <?php echo date("y/m/d");?><br>
											
											</p>
										</div>
										
									</div>
									
									<div class="row  mrg-0 detail-invoice">
									
										<div class="col-md-12">
											<h2>INVOICE</h2>
										</div>
										
										<div class="col-md-12">
											<div class="row">
											  <div class="col-lg-7 col-md-7 col-sm-7">
											  
												<h4>Supplier: </h4>
												<h5>Pixelbug Community</h5>
												<p>
													info.pixelbug@gmail.com <br>
													 091-787-451-0805<br />
													<br /> India
												</p>
												
											  </div>
											  <div class="col-lg-5 col-md-5 col-sm-5">
												<h4>Client Contact :</h4>
												<h5><?php echo $name1;?></h5>
												<p>
													<?php echo $User_id;?><br>
													<?php echo $number;?><br />
													
									
													<br /> India
												</p>
											  </div>
											</div>
										</div>
										<hr/>
								 
										<div class="col-12 col-md-12">
											<strong>ITEM DESCRIPTION & DETAILS :</strong>
										</div>
										<hr>
										
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="invoice-table">
												<div class="table-responsive">
													<table class="table table-striped table-bordered">
														<thead>
															<tr>
																<th>S. No.</th>
																<th>Photo name</th>
																<th>Sub Total</th>
															</tr>
														</thead>
														<tbody>
															
															
														<?php 
														$c=0;
														$sql="select o.photo_id,p.photo_name,o.price from order_details o inner join photo1 p on o.photo_id=p.photo_id where O_id='$o_id'";
														$run=mysqli_query($con,$sql);
														//echo $sql;
														global $photo_name,$price;
														while($row=mysqli_fetch_array($run))
														{
															$photo_name=$row['photo_name'];
															$price=$row['price'];$c++;
														 ?>
																<tr>
																<td> <?php echo $c;?></td>
																<td><?php echo $photo_name;?></td>
																<td><?php echo $price;?></td>
																</tr>
														<?php } ?>
															
														</tbody>
													</table>
												</div>
												<hr>
												<div>
													<h5>Total : <?php echo $amount;?> </h5>
												</div>
												<hr>
												
												<hr>
												<div>
													<h4>Bill Amount :  <?php echo $amount;?> </h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>	
			</div>
			<!-- /#page-wrapper -->
					</div>
					</div>
				</div>
			</div>
			<footer class="footer"> ©Copyright 2020 PIXELBUG </footer>
		</div>
		<!-- /#wrapper -->

		<!-- jQuery -->
		<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/plugins/js/jquery.min.js"></script>
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

<!-- Mirrored from codeminifier.com/job-stock-landing-page/job-stock/dashboard/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Dec 2019 09:25:14 GMT -->
</html>

