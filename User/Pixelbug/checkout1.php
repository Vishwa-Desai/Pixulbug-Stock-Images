<?php
session_start();
if(isset($_SESSION['User_id']))
{
	$User_id=$_SESSION['User_id'];
	$uname=$_SESSION['U_name'];
}
?>
<?php 
// Include the database config file 
require_once 'insert.php'; 
 
// Initialize shopping cart class 
include_once 'cart.class.php'; 
$cart = new Cart; 
 
// If the cart is empty, redirect to the products page 
if($cart->total_items() <= 0){ 
    header("Location: gallery.php"); 
} 
 
// Get posted data from session 
$postData = !empty($_SESSION['postData'])?$_SESSION['postData']:array(); 
unset($_SESSION['postData']); 
 
// Get status message from session 
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $statusMsgType = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
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
                                <li><a href="index.html">Home /</a> Checkout</li>
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
                    <form data-toggle="validator">
                        <fieldset>
                            <div class="row">
								  <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>First Name *</label>
                                    <input type="text" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Last Name *</label>
                                    <input type="text" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>E-mail Address *</label>
                                    <input type="email" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Phone *</label>
                                    <input type="number" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Address *</label>
                                    <input type="text" required>
                                </div></fieldset>								
                    </form>                                  
                </div>
                <div style="clear: both"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Payment</h3> 
                        <div class="accordion" id="accordion">
                            <!--<div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="card-title">
                                        <button class="accordion-toggle" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                                    Direct Bank Tranfer
                                                </label>
                                            </div>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
                                    </div>
                                </div>
                            </div>-->
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="card-title">
                                        <button class="accordion-toggle collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                                    Credit card/Debit card
                                                </label>
                                            </div>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
									<form>
                                        <fieldset>
                            <div class="row">
                                <div class="col-lg-6 col-md-8 col-sm-12">
                                    <label>Card Number *</label>
                                    <input type="number" required>
                                </div>
                                <div class="col-lg-6 col-md-8 col-sm-12">
                                    <label>CVV *</label>
                                    <input type="number" required>
                                </div>
								
								<div class="col-lg-6 col-md-8 col-sm-12">
                                    <label>Validity  *</label>
                                    <input type="date" required>
                                </div>
																
							
                            </div>
                        </fieldset>
						</form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="card-title">
                                        <button class="accordion-toggle collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                                    UPI
                                                </label>
                                            </div>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="collapseThree" data-parent="#accordion">
                                    <div class="card-body">
                                        Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
                                    </div>
                                </div>
                            </div>
                            <div class="next-step text-center">
                                <button>Place Your Order</button>
                            </div>
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
        <script src="js/jquery.appear.js"></script>
        <script src="js/multi_step_form.js"></script>
        <script src="inc/fancybox/jquery.fancybox.pack.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>