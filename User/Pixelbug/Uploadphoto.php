<?php
session_start();
if(isset($_SESSION['User_id']))
{
	$User_id=$_SESSION['User_id'];
	$uname=$_SESSION['U_name'];
}
?><!DOCTYPE html>
<html lang="zxx">
<?php include 'insert.php'; ?>
<head>
        <meta charset="utf-8">
        <title>PIXELBUG | Upload Photo</title>
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
		<script src="js/jquery.min.js"></script>
	<style>
	#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}

</style>
		<link rel="stylesheet" href="fancybox/jquery.fancybox.css">
		
		<script src="fancybox/jquery.fancybox.js"></script>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

		<script>
	$(document).ready(function(){

		$("#d1").show();
		$("#d2").hide();
		$("#d3").hide();
		$("#d4").hide();
	});
	
		
		
	</script>
	<script>
	var divs=["d1","d2","d3","d4"];
var visible=null;

function toggle(divId)
{
	if(visible==divId)
	{
		
	}
	else{
		visible=divId;
	}
	hideNonvisibleDivs();
}
function hideNonvisibleDivs()
{
		var i,divId,div;
		for(i=0;i<divs.length;i++)
		{
			divId=divs[i];
			div=document.getElementById(divId);
			if(visible==divId)
			{
				div.style.display="block";
			}
			else
			{
				div.style.display="none";
			}
		}
}
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
                            <h2>Upload Photo</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.php">Home /</a> Upload Photo</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
            <div class="container">
            
                        <form id="regForm" method="post" action="Uploadphoto.php" enctype="multipart/form-data" data-parsley-validate="">

<h1>Upload Photo Information:</h1>

<!-- One "tab" for each step in the form: -->
<div class="tab">Photo Name:
  <p>
  <input type="text" class="text_field" name="P_name" placeholder="Enter Photo Name" oninput="this.className = ''"/>
</p>							
  <label>Choose an Image to Upload</label>
	<br/>
	<input type="file" name="upload_image" id="image_file" data-parsley-required>
	<br/><br>
	
	<select style="height:50px;width:250px;" name="cat" data-parsley-required>
                                    <option value=" ">--Select Category--</option>
                                    <option value="Nature">Nature</option>
                                    <option value="Human">Human</option>
                                    <option value="Abstract">Abstract</option>
                                    <option value="Monochrome">Monochrome</option>
									<option value="Colours">Colours</option>
									<option value="Heritage">Heritage</option>
									<option value="Wildlife">Wildlife</option>
									<option value="culture">Culture</option>
                                
                                </select><br><br>
								 <p><input placeholder="Add keywords" name="keywords" oninput="this.className = ''"></p>
  <p><input placeholder="Price " name="price" data-parsley-required></p>
  <div style="float:right;">
    
<!-- <input type="submit" style="height:50px;width:100px;background-color:#cc0033;" name="submit"></button></a>
 -->
<button class="btn-send" style="background-color:#cc0033;" type="submit" name="submit">Submit <i class="fa fa-angle-right"></i></button>
 									
 
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->

</form>
<?php
						
						if(isset($_POST['submit']))
						{
							if(!isset($User_id))
							{
								echo "<script> window.open('login1.php','_self')</script>";
							}
							else{
							global $con;
							$photoname=$_POST['P_name'];
							$keywords=$_POST['keywords'];
							$category=$_POST['cat'];
							$date=date("y/m/d");
							//echo $category;
							$filename=$_FILES['upload_image']['name'];
							$tempname=$_FILES['upload_image']['tmp_name'];
							$file="C:/xampp/htdocs/Pixelbug/User/Pixelbug/Upload_contributor/$User_id/";
							if(!file_exists($file))
							{
								mkdir($file);
							}
					
							$target_dir="C:/xampp/htdocs/Pixelbug/User/Pixelbug/Upload_contributor/$User_id/";
							$target_file=$target_dir.basename($_FILES['upload_image']['name']);
							$value="C:/xampp/htdocs/Pixelbug/User/Pixelbug/Upload_contributor/$User_id/$filename";
							
							$target_dir1="C:/xampp/htdocs/Pixelbug/Admin/upload_contributor/$filename";
							if(move_uploaded_file($tempname,$target_file))
							{
								//echo "uploaded";
							}
							copy($value,$target_dir1);
							$price=$_POST['price'];
							list($width,$height)=getimagesize($target_file);
							$size=$width.'X'.$height;
							//$size=getimagesize($filename);
							//echo $category;
							global $cat_id;
							$sql1="select cat_id from category where cat_name='$category'";
						
							$run=mysqli_query($con,$sql1);
							while($row=mysqli_fetch_array($run))
							{		
									
									$cat_id=$row['cat_id'];
									echo "cat_id".$cat_id;
							}
							
							$sql2="select * from contributor where User_id='$User_id'";
							global $cont_id;
							$run=mysqli_query($con,$sql2);
							while($row=mysqli_fetch_array($run))
							{				
									$cont_id=$row['c_id'];
									//$cat_id=$row['cat_id'];
									//echo "c_id".$cont_id;
									//echo "cat_id".$cat_id;
							}
							//echo "cat.$cat_id ";
						$sql="INSERT INTO `photo1`(`photo_name`, `upload_on`, `cat_id`, 
						`price`,`size`, `c_id`,`keywords`, `filename`)
						VALUES ('$photoname','$date','$cat_id','$price','$size','$cont_id','$keywords','$filename');";
						//echo $sql;
						$run=mysqli_query($con,$sql);
						if(!$run)
						{
								//echo 'not inserted';
						}
						else{
							
						}}
						}
					?>
						

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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.form.js"></script>
		<script type="text/javascript" src="js/upload.js"></script>
		<script src="js/parsley/ps.js"></script>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
</script>


		</body>
</html>