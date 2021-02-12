<?php
session_start();
if(isset($_SESSION['User_id']))
{
	$User_id=$_SESSION['User_id'];
	$uname=$_SESSION['U_name'];
}
include 'insert.php';
?><!DOCTYPE html>
<html lang="zxx">

<head>
        <meta charset="utf-8">
        <title>PIXELBUG | About Us</title>
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
                            <h2>About</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.php">Home /</a> About</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-team-area about-page-team pt-90 pb-70">
            <div class="container">
                <div class="row">
				<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="section-title">
                            <h2>Our <span>Team</span></h2>
                            <p>PIXELBUG is an outcome of two young minds, with a view to providing exposure to lens lovers and freelancers.</p>
                            </div>
                    </div>
                </div></div>
				 <div class="row total-team">
				<?php
					global $con,$photo_id,$photoname,$filename;
					$sql="select c.c_id,c.profilename,c.User_id,c.experience,u.profile_photo from contributor c inner join user u on c.User_id=u.User_id where accepted=1";
					$run=mysqli_query($con,$sql);
					
					while($row=mysqli_fetch_array($run))
					{
						$c_id=$row['c_id'];
						$profilename=$row['profilename'];
						$user_id=$row['User_id'];
						$experience=$row['experience'];
						$profile_photo=$row['profile_photo'];
					?>
               
                    <div class="text-center">
                        <div class="single-team">
                            <div class="image">
                                <img style="height:350px;width:400px;"src="upload_user/<?php echo $profile_photo;?>" alt="">
                                <div class="overley">
                                    <div class="social-media-icons">
                                        <ul>
											
                                            <li><a href="#"><?php echo "Experience  $experience";?></a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="team-details">
                                <h3><a href="#"><?php echo $profilename ?></a></h3>
                                <p>Photo Grapher</p>
                            </div>
                        </div>
                    </div><?php } ?>
                    </div>
					

        <div class="single-blog-page-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="single-news-page">
                            
                            <h3><a href="#">Pixelbug is an imperative resource for searching, purchasing and downloading creative Indian images.</a></h3>
                            
                            <div class="single-blog-content">
                                <p>Pixelbug helps creative prefessionals from all background and businesses of all sizes produce their best work with increadible content. </p>
								<blockquote>
                                    <p>Pixelbug is a collective endeavour of passionate photographers. Our team is forever on the move, to capture the essence of India for serving it to the global audience. We are the first Indian stock photography company to employ full time creative researchers for studying market trends and consumer needs. This ensures that the images produced by
									our team are not just exceptional in quality but also extremely relevant.</blockquote>
                                <p>Pixelbug offers an immense advantage with its vast database of images and videos that are reflective of India, making them available in the most accessible way. </p>               </div>
                            
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
		                </div>
           
        <!-- Home Page team end  here -->

        <!-- Footer Area Section Start Here -->
		<?php include 'footer.php' ?>
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
