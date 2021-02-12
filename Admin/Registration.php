<!DOCTYPE html>
<html lang="en">
<?php include 'dbConfig.php';?>
<?php 

	if(isset($_POST['sign_up']))
	{
			$firstname=$_POST['fname'];
			print_r($firstname);
			$lastname=$_POST['lname'];
			$mobilenum=$_POST['mobile_num'];
			$email=$_POST['email'];
			$password=$_POST['pass'];
			if(isset($_FILES['file']))
			{
				$files = $_FILES['file']['name'];
			}
			else
			{
				print_r($files);
			}
		//	$filename=$files['name'];
			

			//print_r($files);
					
			$sql="insert into `admin`(`Adm_id`, `Adm_pwd`, `fname`, `lname`, `profile_photo`, `Mobile_num`) 
				values ('$email','$password','$firstname','$lastname','$files','$mobilenum')";
				 $run=mysqli_query($con,$sql);
                if($run)
                {
					echo "<script> alert('Registred successfully')</script>";
					echo "<script> window.open('Registration.php','_self')</script>";
                   
                }
                  else
                  {
                     echo "Not inserted";
                  }
	}
?>
<head>	
	
<?php include 'header.php';?>
</head>
		
	<body class="login-bg">
		 <div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="login-panel panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Please Sign Up</h3>
						</div>
						<div class="panel-body">
							<img src="assets/img/pixelbug.png" class="img-circle img-responsive"  alt=""/>
							<form action="Registration.php" method="post" enctype="multipart/form-data">
								<fieldset>
									<div class="form-group">
										<input class="form-control" style="font-color:white;"placeholder="First Name" name="fname" type="text" autofocus>
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Last Name" name="lname" type="text" autofocus>
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Mobile number" name="mobile_num" type="number" required="true" maxlength="10" pattern="[0-9]+"autofocus>
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Password" name="pass" type="password" value="">
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Confirm Password" name="conpass" type="password" value="">
									</div>
									<div class="form-group">
									<input type="file" name="file">
									</div>
									
									<div class="checkboxs">
										<span class="custom-checkbox">
											<input type="checkbox" id="checkbox1" name="options[]" value="1">
											<label for="checkbox1"></label>Remember Me
										</span>
									</div>
									<br>
									<!-- Change this to a button or input when using this as a form -->
									<input type="submit" style="height:40px; width:480px;font-size:20px; background-color:#cc0033; border-color:#cc0033" name="sign_up" value="sign up" ></a>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

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

</html>

