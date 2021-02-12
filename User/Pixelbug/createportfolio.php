<?php
session_start();
include 'insert.php';
global $con;

if(isset($_SESSION['User_id']))
{
	$User_id=$_SESSION['User_id'];
	$uname=$_SESSION['U_name'];

$sql1="select pf_id from portfolio where User_id='$User_id'";

		$run=mysqli_query($con,$sql1);
		$row=mysqli_fetch_array($run);
		$c=$row[0];
		$_SESSION['pf_id']=$c;
		if($c!=0)
		{
			echo "<script> window.open('myportfolio.php','_self') </script>";
		}
}
?><!DOCTYPE html>
<html lang="zxx">
<head>
        <meta charset="utf-8">
        <title>PIXELBUG | Create Portfolio</title>
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
		<?php include 'insert.php' ?>
		<div class="inner-page-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-title">
                            <h2>Create Portfolio</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.php">Home /</a> Create Portfolio</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="loginregistration-area pt-100 pb-100">
									<div class="container">
									<div class="row">
									
						<div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="registration-area">
                            <h2>Portfolio Details :</h2>
                            <form method="post" action="createportfolio.php" enctype="multipart/form-data" data-parsley-validate="">
                                <fieldset>
								
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <input type="email" name="email" class="form-control" data-parsley-trigger="focusout" data-parsley-type="email"
											data-parsley-checkmail data-parsley-checkmail-message="Email Already exists" data-parsley-required>
                                        </div>
                                    </div>
									<div class="col-sm-12">
                                        <div class="form-group">
                                        <label>Profile Picture </label>
									<input type="file" class="text_field" name="p-pic"/>
									    </div>
                                    </div>
								<div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Describe Yourself</label>
                                            <textarea cols=60 rows=7 class="form-control" name="desc"></textarea>
                                        </div>
                                    </div>	
                                    
									<div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Experience</label>
                                            <textarea cols=60 rows=5 class="form-control" name="experience"></textarea>
                                        </div>
                                    </div>
									<div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control">
                                        </div>
                                    </div>
                               	 <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Category</label><br>
									<select class="options" name="category" data-parsley-required>
                                    <option>--Select Category--</option>
                                    <option>Colours</option>
                                    <option>Abstract</option>
                                    <option>Heritage</option>
                                    <option>Human</option>
									<option>Monochrome</option>
									<option>Streets
									<option>Nature</option>
									<option>Wildlife</option>
                                </select>
								</div>
								</div>
								<div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Photos</label>
                                            <input type="file" name="files[]" multiple data-parsley-required/>
                                        </div>
                                    </div>
                                 <button class="btn-send" type="submit" name="submit">Create</button> 
								</fieldset>
								</form>
<?php
if(isset($_POST['submit']))
{		global $con;
		
		if(!isset($User_id))
		{
			echo "<script> window.open('login1.php','_self')</script>";
		}
		else{
			
	
	$email=$_POST['email'];
	$desc=$_POST['desc'];
	$skills=$_POST['skills'];
	$address=$_POST['address'];
	$experience=$_POST['experience'];
	$category=$_POST['category'];
	$filename=$_FILES['p-pic']['name'];
	$tempname=$_FILES['p-pic']['tmp_name'];
	$target_dir="C:/xampp/htdocs/Pixelbug/User/Pixelbug/Upload_profile_portfolio/";
	$target_file=$target_dir.basename($_FILES['p-pic']['name']);

	if(move_uploaded_file($tempname,$target_file))
	{
	//echo "uploaded";
	}
	$sql1="select cat_id from category where cat_name='$category'";
							
	$run=mysqli_query($con,$sql1);
	global $cat_id;
	while($row=mysqli_fetch_array($run))
	{				
			$cat_id=$row['cat_id'];
	}
	$sql1="select User_id from user where User_id='$email'";
	echo $sql1;
	$run=mysqli_query($con,$sql1);
	global $email1;
	while($row=mysqli_fetch_array($run))
	{
		$email1=$row['User_id'];
	}
	if(!$email1==$User_id)
	{
			echo "<script> alert('Email does not exist')</script>";
	}
	else{
	$sql="INSERT INTO `portfolio`(`User_id`, `experience`, `cat_id`, `describe_`,`profile_photo`,`address`) 
		VALUES ('$email','$experience','$cat_id','$desc','$filename','$address')";
		echo $sql;
	$run=mysqli_query($con,$sql);
	if(!$run)
	{
			echo 'not Inserted';
	}
	$targetDir = "Upload_portfolio/";

    $allowTypes = array('jpg','png','jpeg','gif');
    global $db;
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
	$sql2="select pf_id from portfolio where User_id='$email'";
							
	$run=mysqli_query($con,$sql2);
	global $pf_id;
	while($row=mysqli_fetch_array($run))
	{				
			$pf_id=$row['pf_id'];
	}
	//echo $pf_id;
    if(!empty(array_filter($_FILES['files']['name']))){
        foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
            echo $targetFilePath;
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL=$fileName;
					
            $insert ="INSERT INTO `portfolio_photo`(`pf_id`, `photo_name`, `cat_id`)
			VALUES ('$pf_id','$insertValuesSQL','$cat_id')";
			echo $insert;
			$run=mysqli_query($con,$insert);
			if(!$run)
			{
					echo "not inserted"."<br>";
			}
			 $insertValuesSQL = trim($insertValuesSQL,',');
			         if(!empty($insertValuesSQL)){
           
            // Insert image file name into database
			
			
            if($run){
                $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                $statusMsg = "Files are uploaded successfully.".$errorMsg;
				$_SESSION['pf_id']=$pf_id;
				echo "<script> window.open('myportfolio.php','_self')</script>";
							
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
                }else{
                    $errorUpload .= $_FILES['files']['name'][$key].', ';
                }
            }else{
                   
                
                $errorUploadType .= $_FILES['files']['name'][$key].', ';
                }
    
        }

        

    }else{
        $statusMsg = 'Please select a file to upload.';
    }
	 echo $statusMsg;
}
}
} 
    // Display status message
   

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
		<script src="js/parsley/ps.js"></script>
	</body>
</html>