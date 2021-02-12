<?php
session_start();
include 'insert.php'; 
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
		  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
         <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    
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
                            <h2>SignUp</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.php">Home /</a> SignUp</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="loginregistration-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="registration-area">
			<?php			
if(isset($_POST['submit'])) 
{
	SignUp();
} 
function SignUp() 
{
	
			if(!empty($_POST['email'])) 
			{
				global $con;
				$email=$_POST['email'];
				$query = mysqli_query($con,"SELECT * FROM user WHERE User_id = '$email'"); 
				
				if(!$row = mysqli_fetch_array($query)) 
				{ 
						newuser(); 
						
				} 
				else { ?><div class="alert alert-warning alert-dismissible fade show" role="alert">
	Already Registered..
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>		<?php } 
			} 
} 


function NewUser() 
{
	global $con;
	$fullname = $_POST['fname']; 
	$email = $_POST['email']; 
	$pass = $_POST['pwd']; 
	$password=md5($pass);
	$filename=$_FILES['p-pic']['name'];
	$_SESSION['User_id']=$email;
	$_SESSION['U_name']=$fullname; 
	$filename=$_FILES['p-pic']['name'];
	$tempname=$_FILES['p-pic']['tmp_name'];
	$target_dir="C:/xampp/htdocs/Pixelbug/User/Pixelbug/Upload_user/";
	$target_file=$target_dir.basename($_FILES['p-pic']['name']);

	if(move_uploaded_file($tempname,$target_file))
	{
	//echo "uploaded";
	}
	$query = "INSERT INTO user (U_name,User_id,U_PWD,profile_photo) VALUES ('$fullname','$email','$password','$filename')"; 
	$data = mysqli_query($con,$query); 
	if($data) {
	
		echo "<script> window.open('index.php','_self')</script>";
		  
	} 
} 
mysqli_close($con); 
?>

                            <h2>Registration</h2>
                            <form method="post" action="registration.php" enctype="multipart/form-data" data-parsley-validate="">
                                <fieldset>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <input type="email" name="email" id="email" class="form-control" data-parsley-trigger="focusout" data-parsley-type="email"
											data-parsley-checkmail data-parsley-checkmail-message="Email Already exists" data-parsley-required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Password *</label>
                                            <input type="password" class="form-control" id="pass" name="pwd" data-parsley-length="[7, 16]"  data-parsley-required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> Confirm Password *</label>
                                            <input type="password" class="form-control" data-parsley-equalto="#pass" data-parsley-required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Full Name </label>
                                            <input type="text" class="form-control" name="fname" data-parsley-pattern="^[a-z A-Z]*$" data-parsley-required>
                                        </div>
                                    </div>
									<div class="col-sm-12">
                                        <div class="form-group">
                                        <label>Profile Picture </label>
									<input type="file" class="text_field" name="p-pic" data-parsley-required/>
									    </div>
                                    </div>
									
                                    <div class="col-sm-12">
                                        <div class="form-group">
											<p><a href="login1.php" style="font-size:15px;">Already have an account?</a></p>
									
                                            <button class="btn-send" type="submit" name="submit">Sign Up</button>
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
<script>
 $(document).ready(function(){
  
  $('#captch_form').on('submit', function(event){
   event.preventDefault();
   if($('#captcha_code').val() == '')
   {
    alert('Enter Captcha Code');
    $('#register').attr('disabled', 'disabled');
    return false;
   }
   else
   {
    alert('Form has been validate with Captcha Code');
    $('#captch_form')[0].reset();
    $('#captcha_image').attr('src', 'image.php');
   }
  });

  $('#captcha_code').on('blur', function(){
   var code = $('#captcha_code').val();
   
   if(code == '')
   {
    alert('Enter Captcha Code');
    $('#register').attr('disabled', 'disabled');
   }
   else
   {
    $.ajax({
     url:"check_code.php",
     method:"POST",
     data:{code:code},
     success:function(data)
     {
      if(data == 'success')
      {
       $('#register').attr('disabled', false);
      }
      else
      {
       $('#register').attr('disabled', 'disabled');
       alert('Invalid Code');
      }
     }
    });
   }
  });

 });
</script>

				
    </body>
</html>