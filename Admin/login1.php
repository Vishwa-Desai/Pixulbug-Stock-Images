<?php 
session_start(); 
include 'dbConfig.php';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php';?>
<style>
.login-bg
{
		background-image:url('images/photo/1.jpg');
		background-repeat:no-repeat;
		background-size:100% 100%;
}
</style>
</head>		
		
	<body class="login-bg">
		 <div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="login-panel panel panel-default">
						<h2 style="color:white; text-align:center;"> <?php echo @$_GET['logged_in']; ?> </h2>
						<h2 style="color:white; text-align:center;"> <?php echo @$_GET['not_admin']; ?> </h2>

						<div class="panel-heading">
					
							<h3 class="panel-title">Please Sign In</h3>
						</div>
						
						<div class="panel-body">
							<img src="PIXELBUG.png" class="img-circle img-responsive" alt=""/>
							<form action="login1.php" method="post" data-parsley-validate="">
								<fieldset>
									<div class="form-group">
										<input class="form-control" placeholder="Username" name="username" type="text" data-parsley-trigger="focusout" data-parsley-required autofocus>
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Password" name="pass" type="password" value=""data-parsley-required>
									</div>
									<br>
										<input type="submit" style="height:40px; width:480px;font-size:20px; background-color:#cc0033; border-color:#cc0033" name="Login" value="Login"></a>
									
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
		<script src="js/parsley/ps.js"></script>
		<script src="assets/js/custom.js"></script>

	</body>

</html>

<?php
if(isset($_POST['Login']))
	{
			global $con;
			$username=$_POST['username'];
			$password=$_POST['pass'];
		
			
			$sql="select * from `admin` where Adm_id='$username' and Adm_pwd='$password'";
			echo $sql;
			$run=mysqli_query($con,$sql);
			$check=mysqli_num_rows($run);
			$row1=mysqli_fetch_assoc($run);
			$name=$row1['Adm_name'];
			
					
				if($check==0)
				{
					echo "<script> alert('Invalid Username or password ')</script>";
				}
				else
                {
					$_SESSION['Adm_id']=$username;
					$_SESSION['Adm_pwd']=$password;
					$_SESSION['Adm_name']=$name;
					echo $_SESSION['Adm_id'].$_SESSION['Adm_pwd'];
					echo "<script> window.open('index.php?logged_in=Login successfully','_self')</script>";
					
				}
			


	}
?>
