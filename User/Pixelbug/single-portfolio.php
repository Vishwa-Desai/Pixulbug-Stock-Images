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
        <meta charset="utf-8">
        <title>PIXELBUG | My Portfolio</title>
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
		<?php include 'insert.php';?>
		<div class="inner-page-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-title">
                            <h2>Portfolio</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.php">Home /</a>Portfolio</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		 <div class="home-about-area pt-90 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="about-content">
                            <h3>About <span>Me</span></h3>
							<?php
								global $con,$pf_id;
								$pf_id=$_GET['pf_id'];
								$sql="select * from portfolio where pf_id='$pf_id'";
								$run=mysqli_query($con,$sql);
								global $exp,$desc,$u_id;
								while($row=mysqli_fetch_array($run))
								{
										$exp=$row['experience'];
										$desc=$row['describe_'];
										$cat_id=$row['cat_id'];
										$u_id=$row['User_id'];
								}
								$sql1="select cat_name from category where cat_id='$cat_id'";
							
								$run=mysqli_query($con,$sql1);
								global $cat_name;
								while($row=mysqli_fetch_array($run))
								{				
										$cat_name=$row['cat_name'];
								}
								$sql1="select profile_photo from user where User_id='$u_id'";
							
								$run=mysqli_query($con,$sql1);
								global $profile_photo;
								while($row=mysqli_fetch_array($run))
								{				
										$profile_photo=$row['profile_photo'];
								}
	
								?>		
								
								<p> <?php echo $desc;  ?> </p><div class="about-content-list row">
                                <div class="single-list col-lg-12 col-md-6 col-sm-12 mb-sm-30">
                                    <div class="media">
                                        
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#">Experience :</a></h4>
								<p> <?php echo $exp;  ?>  </p></div>
                                    </div>
                                </div>
                                <div class="single-list col-lg-12 col-md-6 col-sm-12">
                                    <div class="media">
                                        
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#">Category :</a></h4>
                                            <p> <?php echo $cat_name;  ?> </p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 hidden-md hidden-sm wow fadeInRight" data-wow-delay="0.2s">
                        <div class="about-featured-image">
                            <a href="#"><img src="upload_user/<?php echo $profile_photo; ?>" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="portfolio-details-area pt-100 pb-90">
            <div class="container">
                <div class="row"> <div class="related-project">
                    <h3>Work </h3>
                    <div class="row">                        
                        <!-- single portfolio start -->
                       
								<?php
								
								$sql1="select photo_name from portfolio_photo where pf_id='$pf_id'";
							
								$run=mysqli_query($con,$sql1);
								global $photo;
								while($row=mysqli_fetch_array($run))
								{				
										$photo=$row['photo_name'];
								
	
								?>
								 <div class="col-lg-4 col-md-6 col-sm-12 mix theme graphics mb-md-30">
						
                            <div class="single-portfolio">
                                <div class="portfolio-image">
                                    <img src="Upload_portfolio/<?php echo $photo;?>" style="height:300px;width:400px;" alt=""></a>
                                </div>
                                
                            </div>
                        </div>
								<?php } ?>
                        <!-- single portfolio start -->
                        </div>
                </div>
            </div>
        </div>
		</div>
       
		
		<?php include 'footer.php';?>
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
        <script src="js/simplyCountdown.min.js"></script>
        <script src="js/jquery.mixitup.min.js"></script>
        <script src="js/multi_step_form.js"></script>
        <script src="inc/fancybox/jquery.fancybox.pack.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
