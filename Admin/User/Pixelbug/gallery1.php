<!DOCTYPE html>
<html lang="zxx">
<head>
        <meta charset="utf-8">
        <title>PIXELBUG | Gallery </title>
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
		<link rel="stylesheet" href="fancybox/jquery.fancybox.css">
		<script src="js/jquery.min.js"></script>
		<script src="fancybox/jquery.fancybox.js"></script>
		<script>
$("[data-fancybox]").fancybox();
</script>
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
                            <h2>Gallery</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.html">Home /</a> Gallery</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio-one-area pt-90 pb-70">
            <div class="container">
                <div class="section-title">
                    <h2>Our <span>Gallery</span></h2>
                    <p>PIXELBUG has a wide range of stock images for every need.<br> Do explore and get what you are looking for. </p>
                </div>
        
	<div>	
    <?php 
	include 'insert.php';
    $query ="SELECT DISTINCT P_name FROM photo1";
	$data=mysqli_query($con,$query);
    if($row=mysqli_fetch_array($data) > 0){ 
	
        while($row = mysqli_fetch_assoc($data)){ 

			 /* echo $row["P_name"];  */
            $imageThumbURL = 'image_org/'.$row["P_name"]; 
            $imageURL = 'image_org/'.$row["P_name"]; 
    ?>
	
		<a href="<?php echo $imageURL; ?>" data-fancybox="gallery" data-caption="<?php echo $row["title"]; ?>" >
			<img src="<?php echo $imageThumbURL; ?>" alt="" />
		</a>
	
    <?php } 
    } ?>
</div>
</div>
	</div></div></div>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.form.js"></script>
		<script type="text/javascript" src="js/upload.js"></script>
    </body>
</html>