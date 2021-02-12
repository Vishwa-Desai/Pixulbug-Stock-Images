
<?php
session_start();
if(isset($_SESSION['User_id']))
{
	$User_id=$_SESSION['User_id'];
	$uname=$_SESSION['U_name'];
}
if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		
												
	}
?>
<!DOCTYPE html>
<html lang="zxx">
<?php include 'insert.php'; ?>
<head>
        <meta charset="utf-8">
        <title>PIXELBUG | Personel Info</title>
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

		<?php include 'header.php';?>			
        <div class="inner-page-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-title">
                           
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.html">Home /</a> Upload Photo</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
            <div class="container">
            
                        <form id="regForm" method="post" action="personel-info.php" enctype="multipart/form-data">

<h1>YOUR PERSONEL INFORMATION</h1>

<!-- One "tab" for each step in the form: -->
<div class="tab">Address:
  <p>
  <input type="text" class="text_field" name="Address" placeholder="Enter Address" oninput="this.className = ''"/>
</p>							
  </div>
  City:
  <p>
  <input type="text" class="text_field" name="city" placeholder="Enter City" oninput="this.className = ''"/>
</p>							
 
  Zip/Postal code:
  <p>
  <input type="text" class="text_field" name="zip" placeholder="Enter Zip" oninput="this.className = ''"/>
</p>							
  
  Phone Number:
  <p>
  <input type="text" class="text_field" name="phone" placeholder="Enter Phone Number" oninput="this.className = ''"/>
</p>							
 
  <div style="float:right;">
 <a href="Uploadphoto.php">Skip</a>
  
 
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
							$address=$_POST['Address'];
							$city=$_POST['city'];
							$zip=$_POST['zip'];
							echo $zip;
							$phone=$_POST['phone'];
							$sql="insert into user(address,city,zip,phone) values('$address','$city','$zip','$phone') where User_id='$User_id'";
							$run=mysqli_query($con,$sql);
							echo $sql;
							if(!$run)
							{
								echo 'not inserted';
							}
							else{
							echo "<script> window.open('Uploadphoto.php','_self')</script>";
							}
						}
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

