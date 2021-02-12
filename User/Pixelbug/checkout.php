<?php
session_start();
if(isset($_SESSION['User_id']))
{
	$User_id=$_SESSION['User_id'];
	$uname=$_SESSION['U_name'];
}
?>
<?php
	global $amount;
	if(isset($_GET['amount']))
	{
		$amount=$_GET['amount'];
		//echo $amount;
	}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
        <meta charset="utf-8">
        <title>PIXELBUG | Checkout</title>
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
    <body>
        <div class="template-preloader-rapper">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
		</div>
		<?php include 'header.php';?>
        <div class="inner-page-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-title">
                            <h2>Checkout</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.php">Home /</a> Checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="shipping-area section pt-90 pb-100">
            <div class="container">
                <div class="form-area">
                    <h3>Billing Information</h3>
                    <form method="post" action="your-order.php">
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>First Name *</label>
                                    <input type="text" name="fname" required>
									<input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  rand(10000,99999999)?>">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Last Name *</label>
                                    <input type="text" name="lname" required>
							
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>E-mail Address *</label>
                                    <input type="email" name="email" required>
									
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Phone *</label>
                                    <input type="text" name="number" required>
									<input type="hidden" title="TXN_AMOUNT" tabindex="10"
										type="text" name="amount"
										value="<?php echo $amount ?>">
										
									<input type="hidden" title="INDUSTRY_TYPE_ID" tabindex="10"
										type="text" name="INDUSTRY_TYPE_ID"
										value="Retail">
										
									<input type="hidden" title="CHANNEL_ID" tabindex="10"
										type="text" name="CHANNEL_ID"
										value="WEB">
										<input type="hidden" title="Date" tabindex="10"
										type="text" name="Date"
										value="<?php echo date("y/m/d") ?>">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            
						<button type="submit" name="submit" class="btn btn-danger" style="width:200px;">Submit </button>
 
            </form> 
                </div>
				</div><br>
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
        <script src="js/jquery.appear.js"></script>
        <script src="js/multi_step_form.js"></script>
        <script src="inc/fancybox/jquery.fancybox.pack.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>