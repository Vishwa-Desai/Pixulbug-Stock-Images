<?php
session_start();
if(isset($_SESSION['User_id']))
{

	$User_id=$_SESSION['User_id'];
	$uname=$_SESSION['U_name'];

}
?><!DOCTYPE html>
<html lang="zxx">
<head>
<?php include 'insert.php' ?> 
        <meta charset="utf-8">
        <title>PIXELBUG | Cart</title>
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
    <body class="cart">
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
                            <h2>Cart</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.php">Home /</a> Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shipping-area section pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mr-b30">
                        <div class="button-area row">                        
                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3>Cart</h3>
                            </div>
                                                     
                        </div>
                    </div>
                </div> 
			
		
      
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-list">
                            <table>
							<tr>
									<td>No.</td>
									<td> </td>
									<td> <div class="des-pro"> Name </div> </td>
									<td> <div class="prize"> price </div></td> <td> </td>
									<td> <div class="des-pro"> Total price </div></td>
							</tr>
										
								<?php include 'insertCart.php';
								$p=0;global $photo_id;
									foreach($_SESSION[$photo_id] as $products)
									{
										
										//echo "<td><i class='fa fa-times'></i></td>";
										
									
									?>
															
                                <tr>
                                    
								<?php 
									foreach($_SESSION[$photo_id] as $key=>$value)
									{
										if($key==0)
										{
										echo "<td>.<img src='$value' alt=''/></td>";
										}
										if($key==1)
										{
										echo "<td>
										<div class='des-pro'>
										
                                            <h4>$value</h4>
                                        </div></td>";
										}
										if($key==2)
										{
										echo "<td><strong>$value.Rs.</strong></td>
                                    
                                    <td><span class='prize'>$value.Rs.</span></td>";
                                    
										}
										if($key==3)
										{
											$photo_id=$value;
											echo $photo_id;
										}
									}
									echo "<td><a href='cart.php?delete=$photo_id'><i class='fa fa-times'></i></td>";
									
									$p++;
									}
								?>
							<?php
								if(isset($_GET['delete']))
								{
									$delete_id=$_GET['delete'];
									echo $delete_id;
									if(!empty($_SESSION[$delete_id])) {
											unset($_SESSION[$delete_id]);
										}
									}
								
							?>
									
																
                               </table>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="order-list">
                            <h3>Your Order</h3>
                            <table>
                                <tr>
                                    <td><b>Product</b></td>
                                    <td><b>Total</b></td>
                                </tr>
                                <tr class="row-bold">
                                    <td>Subtotal</td>
                                    <td>$ 158.00</td>
                                </tr>
                                <tr class="row-bold">
                                    <td>Total</td>
                                    <td>$ 158.00</td>
                                </tr>
                            </table>
                            <div class="next-step">
                        		<a href="checkout.php"><button class="radius-30">Proceeed to Checkout</button></a>
                    		</div>
                        </div>
                    </div>                           
                </div>
            </div> 
        </div>
		<?php include 'footer.php' ; ?>
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