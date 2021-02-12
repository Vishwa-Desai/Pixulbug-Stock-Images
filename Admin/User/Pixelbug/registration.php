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
                            <h2>LogIn and SignUp</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.html">Home /</a> LogIn and SignUp</li>
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
                            <h2>Registration</h2>
                            <form method="post" action="connect_signup.php" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <input type="email" name="email" class="form-control" onblur="return ValidateEmail(email.text)">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Password *</label>
                                            <input type="password" class="form-control" name="pwd">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> Confirm Password *</label>
                                            <input type="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Full Name </label>
                                            <input type="text" class="form-control" name="fname">
                                        </div>
                                    </div>
									<div class="col-sm-12">
                                        <div class="form-group">
                                        <label>Profile Picture </label>
									<input type="file" class="text_field" name="p-pic" />
									    </div>
                                    </div>
									<div class="col-sm-12">
                                        <div class="form-group">
									<label>Captcha Code</label>
											<input name="captcha" type="text"><br>
											<img src="captcha.php"/>
											</div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
											<p><a href="login1.php" style="font-size:20px;">Already User?</a></p>
									
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
    </body>
</html>