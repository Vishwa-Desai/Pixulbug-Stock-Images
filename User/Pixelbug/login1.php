<?php
session_start();
$error="";
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
include 'insert.php';
global $error;
$username=$_POST['username'];
$pass=$_POST['password'];
$username = stripslashes($username);
$password = stripslashes($pass);
$username = mysqli_real_escape_string($con,$username);
$pass1 = mysqli_real_escape_string($con,$password);
$password1=md5($pass1);
//echo $password;
$query = mysqli_query($con,"select * from user where U_PWD='$password1' AND User_id='$username'");
$rows = mysqli_num_rows($query);
 while($row=mysqli_fetch_array($query)){ 
 $u_name=$row['U_name'];
 }
		
if ($rows == 1) {
$_SESSION['User_id']=$username;
$_SESSION['U_name']=$u_name;
 // Initializing Session
header("location: index.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";

}
mysqli_close($con); // Closing Connection
}
}

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
        <meta charset="utf-8">
        <title>PIXELBUG | Join </title>
        <meta name="description" content="">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="shortcut icon" type="image/x-icon" href="images/fav.png">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="css/meanmenu.min.css">
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body class="registration">
        <div class="template-preloader-rapper">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
		<?php include 'header.php'; ?>
		<div class="inner-page-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-title">
                            <h2>Login</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.php">Home /</a> Login </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="loginregistration-area pt-100 pb-100">
            <div class="container">
                <div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 mb-sm-30">
                        <div class="login-area">
						
						<?php
if($error!="")
{
?> <div class="alert alert-warning alert-dismissible fade show" role="alert">
	Invalid Username or passward !!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>	<?php 
}

?>
							<h2 style="color:black; text-align:center;"> <?php echo @$_GET['not_login']; ?> </h2>
						<br>
                            <h2>LogIn</h2>
                            <form action="login1.php" method="post" data-parsley-validate="">
                                <fieldset>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <input type="text" class="form-control" name="username" data-parsley-trigger="focusout" data-parsley-type="email"
											data-parsley-checkmail data-parsley-checkmail-message="Email Already exists" data-parsley-required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Password *</label>
                                            <input type="password" id="myInput" class="form-control" name="password" data-parsley-length="[7, 16]"  data-parsley-required>
											
                                        </div>
                                    </div>
									
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="connected-area">
												<div class="checkbox">
												<label>
                                                        <input type="checkbox" onclick="myFunction()"> Show Password
                                                 </label><br>
                                                   
                                                    <p><a href="change-password1.php">Forgot password?</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn-send" type="submit" name="submit">Log In</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
							
                        </div>
                    </div>
					 </div>
            </div>
        </div>
		<?php include 'footer.php'; ?>
		<script>
		function myFunction()
		{
			var x=document.getElementById("myInput");
			if(x.type==="password")
			{
				x.type="text";
			}
			else{
				x.type="password";
			}
		}
		</script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.meanmenu.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/lightbox.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.mixitup.min.js"></script>
        <script src="js/simplyCountdown.min.js"></script>
        <script src="js/multi_step_form.js"></script>
        <script src="inc/fancybox/jquery.fancybox.pack.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/main.js"></script>
		<script src="js/email-val.js"></script>
		<script src="js/parsley/ps.js"></script>
    </body>
</html>
