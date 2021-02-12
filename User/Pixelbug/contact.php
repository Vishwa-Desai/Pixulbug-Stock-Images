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
        <title>PIXELBUG | Contact Us</title>
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
		<script src="script.js"></script>
		<script>
		$("submit").click( function() {
	var data=$("#form_data :input").serializeArray();
	$.post( $("#form_data").attr("action") , data ,function(info){
$("#result").html(info); 
	clearInput();});
	$("#form_data").submit( function() {
		return false;
	}
} );
function clearInput()
{
		$("form_data :input").each(function() {
			$(this).val('');
		});
} 
</script>
        
        </head>
    <body class="contact-us">
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
                            <h2>Contact Us</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.php">Home /</a> Contact Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-us-page-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="contact-us-page">
                            <h2>Contact Information</h2>
                            </div>
                    </div>
                </div>

                <div class="row contact-box">
                    
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="single-contact-box">
                            <ul>
                                <li><span><i class="fa fa-phone"></i></span><a href="tel:091-787-451-0805"> 091-787-451-0805</a></li>
                                <li><span><i class="fa fa-envelope-o"></i></span><a href="mailto:info.pixelbug@gmail.com">info.pixelbug@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
               
                <div class="contact-section">
                    <div class="leave-comments-area">
					<?php	if(isset($_POST['submit'])) 
{
	if(!isset($_SESSION['User_id']))
	{
		echo "<script> window.open('login1.php','_self')</script>";
	}
	else
	{
	global $con;
	$name = $_POST['name'];  
	$phone= $_POST['phone'];
	$msg=$_POST['comment'];
	$query = "INSERT INTO feedback(User_id,Msg,phone_no,U_name) VALUES('$User_id','$msg','$phone','$name')"; 
	$data = mysqli_query($con,$query); 
	if($data) {
	?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
   Comment Added successfully..
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>	<?php
	}	  
	} 
	
} 
?>
                        <h4>Feedback/Complaint</h4>
                        <div id="form-messages"></div>
                        <form method="post" id="form_data">
						<span id="result"> </span>
					        <fieldset>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input name="name" id="name" type="text" class="form-control" placeholder="Name*" required="">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone*" required="">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea name="comment" id="comment" cols="40" rows="10" class="textarea form-control" placeholder="Your Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button class="btn-send" name="submit" type="submit" id="submit">Send Message <i class="fa fa-angle-right"></i> </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
					
                    </div>
					 </div></div>
					 <div class="single-blog-page-area pt-70 pb-70">
					 <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="single-news-page">
					   <div class="row author-comment">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="about-author-comment">
                                        <h2>Top Comments</h2>
                 
					 <?php 
					 $sql="select * from feedback where show_=1";
					 $run= mysqli_query($con,$sql); 
					 while($row=mysqli_fetch_array($run))
					 {
						 $name=$row['U_name'];
						 $msg=$row['Msg'];
					 
					 
					 ?>
                                   
                                            <div class="author-post">
                                                
                                                <div class="media-body">
                                                    <h4 class="media-heading" style="font-size:23px;color:#cc0033;"><?php echo $name;?></h4>
                                                   
                                                    <p><?php echo $msg;?> </p>  </div>
                                            </div>
                                       <?php }?>
                                    </div>
                                </div>
                            </div>
<div></div></div></div>
                            
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
        <script src="js/contact-form.js"></script>
        <script src="js/main.js"></script>
		<script src="js/parsley/ps.js"></script>
		
    </body>
</html>