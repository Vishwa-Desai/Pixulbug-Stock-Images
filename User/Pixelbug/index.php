<?php
session_start();
if(isset($_SESSION['User_id']))
{
	$User_id=$_SESSION['User_id'];
	$uname=$_SESSION['U_name'];
}
?>
<!DOCTYPE html>
<html lang="zxx">
<?php include 'insert.php';?>
	<head>
        <meta charset="utf-8">
        <title>Home </title>
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
        <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
        <link rel="stylesheet" type="text/css" href="inc/custom-slider/css/nivo-slider.css">
        <link rel="stylesheet" type="text/css" href="inc/custom-slider/css/preview.css">
        <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
		<link rel="stylesheet" type="text/css" href="css/TimeCircles.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
		</head>
    <body class="home">
    <div class="template-preloader-rapper">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
     </div>
       <?php include 'header.php '?> 
                   
          <div class="slider-area">
            <div class="bend niceties preview-2">
                <div id="ensign-nivoslider" class="slides">
                    <img src="images/slider/slide_3.jpg" alt="" title="#slider-direction-1" />
                    <img src="images/slider/slide_4.jpg" alt="" title="#slider-direction-2" />
                </div>
                <!-- direction 2 -->
                <div id="slider-direction-1" class="slider-direction">
                    <div class="slider-content t-cn s-tb slider-1">
                        <div class="title-container s-tb-c">
                            <h1 class="title1 uppercase"><span>Your Best</span> PhotoGraphy Shop </h1>
                            <div class="slider-botton">
                                <ul>
                                    <li><a class="radius-0" href="gallery.php">Shop Now <i class="fa fa-angle-right"></i></a></li>
                                    <li class="acitve"><a class="radius-0" href="about.php">About Us <i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- direction 2 -->
                <div id="slider-direction-2" class="slider-direction">
                    <div class="slider-content t-cn s-tb slider-2">
                        <div class="title-container s-tb-c">
                            <h1 class="title1 uppercase">Share Your work with Us</h1>
                            <div class="slider-botton">
                                <ul>
                                    <li class="acitve">

									<a class="radius-0" href="addcontributor.php">Get Started <i class="fa fa-angle-right"></i></a></li>
									
								   <li><a class="radius-0" href="contact.php">Contact Us <i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="portfolio-one-area pb-70 pt-90">
            <div class="container">
                <div class="section-title">
                    <h2>Photo <span> Gallery </span></h2>
                    <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mihi vero, inquit, placet agi subtilius et, ut ipse dixisti, pressius.Photograhy HTML is very </p>
                --></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="gridFilter portfolio-menu text-center">
                           <h3> Try our free collection , download it now. </h3>
                        </div><!-- .gridFilter end-->
                        <div class="row grid">
						<!-- single portfolio start -->
							<?php
					global $con,$photo_id,$photoname,$filename;
					$sql="select * from photo1 where free=1";
					$run=mysqli_query($con,$sql);
					
					while($row=mysqli_fetch_array($run))
					{
						$photo_id=$row['photo_id'];
						$photoname=$row['photo_name'];
						$filename=$row['filename'];
					?>
                           <div class="col-lg-4 col-md-6 col-sm-12 mb-30 grid-item graphics">
                             
                                <div class="single-portfolio">
                                    <div class="portfolio-image">
									
                                        <img style="height=420px;width:400px;"src="free_photos/<?php echo $filename ?>" alt="">
                                    </div>
				
						
					
                                    <div class="overley">
                                        <div class="portfolio-details">
                                            <h3><a href="#"><?php echo $photoname ?></a></h3>
                                            <ul>
                                                <li>
                                                    <a href="result3.php?photo=<?php echo $photo_id?>" "><i class="fa fa-eye"></i></a>
                                                </li>
                                                <li>
                                                    <a class="image-popup" href="free_photos/<?php echo $filename ?>"><i class="fa fa-search"></i></a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div><?php } ?>
					
                            <!-- single portfolio start -->
                           </div>

                    </div>
                </div>
            </div>
        </div>
		
		
		<div class="home-about-area pt-100 pb-100 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-md-30">
                        <div class="about-content-area">
                            <div class="about-content-area">
                                <h2>Personalize Your PixelBug <span>Portfolio</span></h2>
                                <p style="font-size:17px;"> Your Portfolio showcases your work to customers around the world. Personalize yours to make it stand out.</p>
								<div class="botton-area">
                                    <a class="radius-0" href="createportfolio.php">Want to create ?   <i class="fa fa-angle-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="about-featured-image">
                            <a href="createportfolio.php"><img src="images/about/about.jpg" alt="image"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="project-activation-area pt-100 pb-100">
            <div class="container">
                <div class="ab-count">
                    <div class="row">
                        <!-- ABOUT-COUNTER-LIST START -->
                        <div class="col-lg-3 col-md-3 col-sm-12  wow fadeInUp" data-wow-duration=".3s" data-wow-delay="300ms">
                            <div class="about-counter-list">
                                <i class="fa fa-picture-o"></i>
								<?php 
								global $con,$total1;
								$sql = "SELECT COUNT(*) FROM photo1";   
								$rs_result = mysqli_query($con,$sql); 
								$row = mysqli_fetch_array($rs_result); 
								$total1 = $row[0];   
							  	?>	
                                <h1 class="about-counter"><?php echo $total1; ?></h1>                      
                                <p>Photos</p>
                            </div>
                        </div>
                        <!-- ABOUT-COUNTER-LIST END -->
                        <!-- ABOUT-COUNTER-LIST START -->
                        
                        <!-- ABOUT-COUNTER-LIST END -->
                        <!-- ABOUT-COUNTER-LIST START -->
                        <div class="col-lg-3 col-md-3 col-sm-12  wow fadeInUp" data-wow-duration=".9s" data-wow-delay="300ms">
                            <div class="about-counter-list">
                                <i class="fa fa-users"></i>
								
								<?php 
								global $con,$total;
								$sql = "SELECT COUNT(*) FROM contributor where accepted=1";   
								$rs_result = mysqli_query($con,$sql); 
								$row = mysqli_fetch_array($rs_result); 
								$total = $row[0];   
							  	?>							
                                <h1 class="about-counter"><?php echo $total; ?> </h1>                     
                                <p>Contributors</p>
                            </div>
                        </div>
                        <!-- ABOUT-COUNTER-LIST END -->
                        <!-- ABOUT-COUNTER-LIST START -->
                        <div class="col-lg-3 col-md-3 col-sm-12  wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="300ms">
                            <div class="about-counter-list">
                                <i class="fa fa-trophy"></i>
								<?php 
								global $con,$total;
								$sql = "SELECT COUNT(*) FROM portfolio";   
								$rs_result = mysqli_query($con,$sql); 
								$row = mysqli_fetch_array($rs_result); 
								$total3 = $row[0];   
							  	?>	
                                <h1 class="about-counter"><?php echo $total3; ?></h1>                        
                                <p> Portfolios </p>
                            </div>
                        </div>
						<div class="col-lg-3 col-md-3 col-sm-12  wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="300ms">
                            <div class="about-counter-list">
                                 <i class="fa fa-user"></i>
								<?php 
								global $con,$total;
								$sql = "SELECT COUNT(*) FROM user";   
								$rs_result = mysqli_query($con,$sql); 
								$row = mysqli_fetch_array($rs_result); 
								$total3 = $row[0];   
							  	?>	
                                <h1 class="about-counter"><?php echo $total3; ?></h1>                        
                                <p> Users</p>
                            </div>
                        </div>
						
                        <!-- ABOUT-COUNTER-LIST END -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Counter Down Section End Here-->

        <!-- Home Blog Start Here -->
        <?php include 'footer.php' ?><!-- Footer Area Section End Here -->

        <!-- jquery latest version -->
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <!-- bootstrap js -->
        <script src="js/bootstrap.min.js"></script>
        <!-- owl.carousel js -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- owl.carousel js -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- meanmenu js -->
        <script src="js/jquery.meanmenu.js"></script>
        <!-- jquery-ui js -->
        <script src="js/jquery-ui.min.js"></script>
        <!-- wow js -->
        <script src="js/wow.min.js"></script>
        <!-- jquery.counterup js -->
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/waypoints.min.js"></script>
        <!-- jquery light box -->
        <script src="js/lightbox.min.js"></script>
        <!-- isotope.pkgd.min js -->
        <script src="js/isotope.pkgd.min.js"></script>
        <!-- imagesloaded.pkgd.min js -->
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <!-- magnific popup -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <!-- jQuery MixedIT Up -->
        <script src="js/jquery.mixitup.min.js"></script>
        <!-- Counter Down js -->
        <script src="js/simplyCountdown.min.js"></script>
        <!-- Nivo slider js -->
        <script src="inc/custom-slider/js/jquery.nivo.slider.js"></script>
        <script src="inc/custom-slider/home.js"></script>
        <!-- jQuery Multistep form -->
        <script src="js/multi_step_form.js"></script>
        <!-- jquery.fancybox.pack js -->
        <script src="inc/fancybox/jquery.fancybox.pack.js"></script>
        <!-- plugins js -->
        <script src="js/plugins.js"></script>
        <!-- jquery weave effects -->
        <script src="js/waves.js"></script>
		<!-- TimeCircles js -->
        <script src="js/TimeCircles.js"></script>
        <!-- main js -->
        <script src="js/main.js"></script>
				<script src="js/parsley/ps.js"></script>
    </body>

<!-- Mirrored from rstheme.com/products/html/shooter/shooter-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Dec 2019 08:42:36 GMT -->
</html>