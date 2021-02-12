<?php
session_start();
 /* use phpmailer1\src\PHPMailer;
  use phpmailer1\src\SMTP;*/
  use email\src\Exception; 
  require 'email\class.phpmailer.php';
require 'email\class.smtp.php';
//  require("PHPMailer.php");
  //require("SMTP.php");
  	$result="";
	if(isset($_POST['submit']))
	{
		//require 'PHPMailerAutoload.php';
		
		$mail = new PHPMailer();
	try
    {
		$mail->Host='smtp.gmail.com';
		$mail->Port=587;
		$mail->SMTPAuth=true;
		$mail->IsSMTP();
		//$mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Username='info.pixelbug@gmail.com'; //send data from
		$mail->Password='pixelbug2020KV@';
		
		$mail->setFrom($_POST['email']);
		$mail->addAddress($_POST['email']);
		$mail->addReplyTo($_POST['email']);
		
		$mail->isHTML(true);


		$mail->Subject='Change Password';
		$_SESSION['id']=$_POST['email'];
		$mail->Body='<p> <h3> Hii,'.$_POST['email'].' </h3> <br><h4> As you have requested for reset password instructions,
		here they are,please follow the URL: </h4> </P> <a href="http://localhost:8081/pixelbug/user/pixelbug/forgot-password.php?email='.$_SESSION['id'].'">Click me </a>';
      if(!$mail->send())
    {
      $result="something went wrong. please try again.";
	  
	//echo $result;
    }
    else
    {
      $result="Thanks ".$_POST['email']."for contacting us. we will get back to you";
	  echo "<script> alert('we have sent you the link , please check your mail') </script>";
	}
  }catch(Exception $e)
  {
          $result="something went wrong. please try again.";
		 
         //echo $result;
    }		
  }
?>		
		
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
		<script src="js/parsley/ps.js"></script>
		<style>
			.center_div
			{
					margin:0 auto;
					width:80%;
			}
			.div-to-align {
    width: 75%;
    padding: 40px 20px;}
	h3{
		text-align:center;
		margin-left:550px;
	}
		</style>
		
    </head>
			<div class="header-middle-area" id="sticky">
                <div class="container">
			<div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="logo-area">
                                <a href="index.php"><img src="PIXELBUG.png" alt="logo"></a>
                            </div>
 </div></div></div>
 <div class="loginregistration-area">
			<div class="login-area">
			<div class="row">
			
			<h3 style="margin-left:500px;"> CHANGE PASSWORD </h3>
				 <div class="col-10 offset-1 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center">

					
					 <div class="div-to-align">
					 <form action="change-password1.php" method="post" data-parsley-validate="">

                                <fieldset>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Enter Email Address *</label>
                                            <input type="text" class="form-control" name="email"  data-parsley-trigger="focusout" data-parsley-required>
											
                                        </div>
                                    </div>
                                    
									<div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn-send" type="submit" name="submit">Submit</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
							</div>
					</div>
				</div>
			</div>
			
		</body>
		</html>