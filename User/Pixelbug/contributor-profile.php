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
    
       <?php include 'header.php '?> <br> <br>
	   <div class="portfolio-details-area pt-100 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12">
                        <div class="portfolio-image">
						<?php
							global $cont_id;
							if(isset($_GET['c_id']))
								{
									
									$cont_id=$_GET['c_id'];
								}
							$sql="select u.profile_photo from user u inner join contributor c on c.User_id=u.User_id where c_id='$cont_id'";
							$run=mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($run))
							{
							$profile_photo=$row['profile_photo'];
							?>
                            <img src="upload_user/<?php echo $profile_photo?>" style="height:300px;width:300px;" alt="">
							<?php }?>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="portfolio-informations">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php
					global $con,$desc,$profilename,$c_id;
					$query="select c_id,profilename,Description from contributor where c_id='$cont_id'";
					$run=mysqli_query($con,$query);
					while($row=mysqli_fetch_array($run))
					{
							$desc=$row['Description'];
							$profilename=$row['profilename'];
							$c_id=$row['c_id'];
					}
					?>
                        <div class="project-description">
                            <h3>Description</h3>
					<p><?php echo $desc; ?> </p>  </div>
                    </div>
					</div>
                <div class="related-project">
                    <h3>Images</h3>
                    <div class="row">                        
                        <!-- single portfolio start -->
						<?php
							global $con,$desc,$profilename;
							$query="select * from photo1 where c_id='$c_id' and free=0";
							$run=mysqli_query($con,$query);
							while($row=mysqli_fetch_array($run))
							{
									$filename=$row['filename'];
									$photo_id=$row['photo_id'];
									$photo_name=$row['photo_name'];
								//echo $filename;
						?>	
                        <div class="col-lg-4 col-md-6 col-sm-12 mix theme graphics mb-md-30">
                            <div class="single-portfolio">
                                <div class="portfolio-image">
                                    <a href="result2.php?photo=<?php echo $photo_id?>"><img src="/Pixelbug/Admin/uploads/<?php echo $filename ?>" style="height:300px;width:300px;margin-bottom:20px;" alt=""></a>
                                </div>
                                
                            </div>
                        </div>
							<?php } ?>
                       
                    </div>
                </div>
            </div>
        </div>
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
    </body>

<!-- Mirrored from rstheme.com/products/html/shooter/shooter-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Dec 2019 08:42:36 GMT -->
</html>
                   
          </body>
		</html>
