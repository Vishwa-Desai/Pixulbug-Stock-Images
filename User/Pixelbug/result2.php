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
        
		<header>
            <div class="header-top-area hidden-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
						</div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="right-side-tool text-right">
                                <div class="social-media-area">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <div class="header-top-right">
                                    <ul>
									<?php
										if(!isset($_SESSION['User_id']))
										{
											
										?>
										<li><span style="margin-left:2px;"><a href="login1.php"><button class="btn btn-outline-light">Login</button></a></span></li>
										<li><span style="margin-left:10px;"><a href="registration.php"><button class="btn btn-outline-light">Registration</button></a></span></li>
										
                                       <?php }
										else
										{ ?>
										<li><span style="font-size:20px;color:WHITE;"><?php echo "Hii $uname"; ?></span></li>
										<li><span style="margin-left:35px;"><a href="logout.php"><button class="btn btn-outline-light">Logout</button></a></span></li>
										
										<?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<?php
		include 'insert.php';
		global $con,$photo_id;
		if(isset($_GET['photo']))
		{
		$photo_id=$_GET['photo'];
		$sql="SELECT photo_id,photo_name,price,filename,size FROM photo1 where photo_id='$photo_id'";
		//echo $sql;
		$run=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($run);
		$z[]=$row;
		$product_array=$z;
		//print_r($product_array);
		}
?>
<?php if (!empty($product_array)) { 
	foreach($product_array as $key=>$value){ ?>
	<div class="portfolio-one-area pt-90 pb-70">
	
            <div class="container">
			 
			 <div class="row">
			 
			  <div class="col-sm-4">
			  <?php 	
			  
			  $imageThumbURL = '/Pixelbug/Admin/uploads/'.$product_array[$key]["filename"];
			  $imageURL = '/Pixelbug/Admin/uploads/'.$product_array[$key]["filename"]; ?>
			<a href="<?php echo  $imageThumbURL?>" data-caption="<?php?>" >
			<img src="<?php  echo $imageURL ?>" alt="" />
		</a>
	
   
			  </div>
		<h2 style="color:white; text-align:center;"> <?php echo @$_GET['item']; ?> </h2>
							  
			  <div class="col-sm-4">
			  <h2> Photo Information </h2>
			  <div class="form-group">
			  <label> Photo Name : </label>
					<?php echo $product_array[$key]["photo_name"]; ?> 
			  </div>
			  <div class="form-group">
			  <label> Price : </label>
			  <?php echo  "Rs. ".number_format($product_array[$key]["price"], 2) ?></label>
					
			  </div>
			  <div class="form-group">
			  <label> Size : </label>
					<?php  echo  $product_array[$key]["size"];  ?> 
			  </div>
			  <div class="form-group">
			  <label> By</label>
				<?php 
				$sql="select c.profilename,c.c_id from photo1 p inner join contributor c where p.c_id=c.c_id and p.photo_id=$photo_id";
				$run=mysqli_query($con,$sql);
				while($row=mysqli_fetch_array($run))
				{
				$profilename=$row['profilename'];
				$c_id=$row['c_id'];
				echo "<a href='contributor-profile.php?c_id=$c_id'> $profilename </a>"; } ?>
			
			  </div>
			</div>
	
			</div>
		
			
			
    		<center>
             
			 
			 
			 <a href="gallery.php" class="btn btn-danger col-lg-2"> Back </a> 
		<?php  
		$c=0; 
		if(!empty($_SESSION["item"]))
		{		
				foreach($_SESSION["item"] as $k=>$v)
				{
					if($photo_id==$_SESSION["item"][$k]["photo_id"])
					{
						$c=1;
						break;
					}
				}
		}
		if($c!=1)
		{	?>
			 <a href="cart1.php?action=add&code=<?php echo $photo_id; ?>"class="btn btn-danger col-lg-2">Add To Cart </button> </a> 
		<?php } 
		else
		{
			
			//echo "<script> window.open('result2.php?item=Item is alredy present in cart','_self')</script>";
					
		 }?>
			 </center>	<br> <br>
		

		</div>

		
       </div>
	<?php } }?>
	   </div>
    	
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