<?php
session_start();
if(isset($_SESSION['User_id']))
{
	$User_id=$_SESSION['User_id'];
	$uname=$_SESSION['U_name'];
}
?><html lang="zxx">
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
		<script src="js/parsley/ps.js"></script>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
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
                                <a href="home.php"><img src="PIXELBUG.png" alt="logo"></a>
                            </div>
 </div></div></div>
 <div class="loginregistration-area">
			<div class="login-area">
			<div class="row">
			
			<h3 style="margin-left:500px;"> CHANGE PASSWORD </h3>
				 <div class="col-10 offset-1 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center">

					
					 <div class="div-to-align">
					 <form action="login1.php" method="post">
                                <fieldset>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>New Email *</label>
                                            <input type="text" class="form-control" name="username">
                                        </div>
                                    </div>
									<div class="col-sm-12">
                                        <div class="form-group">
                                            <label>confirm Email *</label>
                                            <input type="text" class="form-control" name="username">
                                        </div>
                                    </div>
									<div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Password *</label>
                                            <input type="password" class="form-control" name="password">
											
                                        </div>
                                    </div>
									<div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn-send" type="submit" name="submit">Save changes</button>
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