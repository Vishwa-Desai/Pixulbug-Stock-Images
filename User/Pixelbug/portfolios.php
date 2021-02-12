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
        <title>PIXELBUG | Portfolios </title>
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
<style>
	.manage-list-row {
    background: #ffffff;
    border: 1px solid #e9f0f3;
    border-radius:4px;
    padding: 20px 0;
    margin-bottom: 15px;
    margin-left: 0;
    list-style: none;
	box-shadow:0 3px 10px 0 rgba(62,28,131,.02);
	-webkit-box-shadow:0 3px 10px 0 rgba(62,28,131,.02);
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -ms-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out;
    -webkit-backface-visibility: hidden;
}
.manage-list-row:hover, .manage-list-row:focus {
	box-shadow:0 3px 10px 0 rgba(62,28,131,.06);
	-webkit-box-shadow:0 3px 10px 0 rgba(62,28,131,.06);
}
.mysp-sites-list .site-name, .manage-list-row .job-info {
    float: left;
    padding-left: 80px;
    position: relative;
}
.manage-list-row .job-info {
    padding-left: 25px;
}
.mysp-sites-list .site-options, .manage-list-row .job-buttons {
    float: right;
    margin-right: 25px;
    position: relative;
}
.manage-list-row .job-buttons {
    margin-top: 7px;
}

.manage-list-row .job-info .job-img {
    border-radius: 2px;
    float: left;
    margin-right: 25px;
    width: 60px;
}
.manage-list-row .job-info .job-img img {
    display: block;
	max-width:70px;
}
.manage-list-row .job-details {
    display: inline-block;
    font-size: 16px;
}
.manage-list-row .job-info h3 {
    display: block;
    font-size: 18px;
    font-size: 1.8rem;
    margin:0px 0 0;
	line-height:1.3;
}
.manage-list-row .job-info h3 a:hover, .manage-list-row .job-info h3 a:focus{
	text-decoration:none;
}

</style>

        </head>
    <body>
        
		<?php include 'header.php';?>
		<?php include 'insert.php';?>
		<div class="inner-page-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-title">
                            <h2>Portfolios</h2>
                        </div>	
<br>
						<div class="input-group md-form form-sm form-1 pl-0">
  <div class="input-group-prepend">
    <span class="input-group-text red lighten-3" id="basic-text1"><i class="fas fa-search text-white"
        aria-hidden="true"></i></span>
  </div>
  <input class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search" id="myInput" onkeyup="myFunction()">
</div>						
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.php">Home /</a> Portfolios</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="container">
		<br><br><br>
		<ul class="list" id="myUL">
		<?php
			global $con;
			$sql="select p.User_id,c.cat_name,pf_id,u.profile_photo,u.U_name,p.Address from portfolio p inner 
			join user u on p.User_id=u.User_id inner join category c on p.cat_id=c.cat_id";
			
												
			$run=mysqli_query($con,$sql);
			global $pf_id,$cat_name,$user_id,$U_name,$address;
			while($row=mysqli_fetch_array($run))
			{
				$pf_id=$row['pf_id'];
				$cat_name=$row['cat_name'];
				$profile_photo=$row['profile_photo'];
				$U_name=$row['U_name'];
				$user_id=$row['User_id'];
				$address=$row['Address'];
			
		?>
		
			<h3> </h3>
			<li class="manage-list-row clearfix">
					<div class="job-info">
					<div class="job-img">
					<img src="upload_user/<?php echo $profile_photo;?>" style="border-radius:50%;" class="attachment-thumbnail" alt="Academy Pro Theme">
					</div>
				<div class="job-details">
				<form method="get">
					<h3 class="job-name"><a class="job_name_tag" href='single-portfolio.php?pf_id=<?php echo $pf_id?>'><span style="margin-left:30px;color:BLACK;"><?php echo $U_name;?></span></a></h3>
					<h4 class="job_name_tag" id="p1" href='#'><span style="margin-left:30px;font-size:17px;color:#cc0033;">category : <?php echo $cat_name; ?></a>
					<a class="job_name_tag" href='#'><span style="margin-left:30px;font-size:17px;color:#cc0033;"><?php echo $address; ?></a></h4>
					
					<h4 class="job-name"><a class="job_name_tag" href='#'><span style="margin-left:30px;font-size:17px;color:#cc0033;">contact Me : <?php echo $user_id; ?></a></h4>
				</form>	
			</div>
			</div>
			</li><?php } ?> 
		</ul>
		<br><br><br>
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
<script>
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName('a')[0];
	a1 = li[i].getElementsByTagName('h4')[0];
    txtValue = a.textContent || a.innerText;
	txtValue1 = a1.textContent || a1.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
	 
	  
    }
  }

}
</script>

