<?php
session_start();
if(isset($_SESSION['User_id']))
{
	$User_id=$_SESSION['User_id'];
	$uname=$_SESSION['U_name'];
	$pf_id=$_SESSION['pf_id'];
}
?><!DOCTYPE html>
<html lang="zxx">
<head>
        <meta charset="utf-8">
        <title>PIXELBUG | Edit Portfolio</title>
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
		<script src="js/jquery_ajax.min.js"></script>
   
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
                            <h2>Edit Portfolio</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.php">Home /</a> Edit Portfolio</li>
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
                            
                            <form method="post" action="edit-portfolio.php" enctype="multipart/form-data">
                                <fieldset>
								
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <input type="email" name="email" id="email" style="width:280px;">
											
										<button type="button" class="btn btn-dark"style="width:70px;" onclick="edit_email()">Edit </button></a>
			
                                        </div>
                                    </div>
									<div class="col-sm-12">
                                        <div class="form-group">
                                        <label>Profile Picture </label>
									<input type="file" class="text_field" id="p-pic" name="p-pic"/>
									<button type="button" class="btn btn-dark" style="width:70px;" data-placement="top" >Edit </button></a>
			
									    </div>
                                    </div><br>
								<div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Describe Yourself</label><button type="button" class="btn btn-dark" style="width:70px;margin-left:240px;" onclick="edit_desc()"data-placement="top" >Edit </button></a>
			
                                            <textarea cols=30 rows=4 class="form-control" name="desc" id="desc"></textarea>
                                        </div>
                                    </div>	
                                    
									<div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Experience</label><button type="button" class="btn btn-dark" style="width:70px;margin-left:290px;" onclick="edit_exp()" data-placement="top" >Edit </button></a>
			
                                            <textarea cols=60 rows=3 class="form-control" name="experience" id="exp"></textarea>
                                        </div>
                                    </div>
                               	 <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Category</label><button type="button" class="btn btn-dark" style="width:70px;margin-left:310px;" onclick="edit_cat()" data-placement="top" >Edit </button></a>
			
									<select class="options" name="category" id="category">
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
                                            <label>Upload Work</label>
                                            <input type="file" name="files[]" multiple>
                                        </div>
                                    </div>
                                 <button class="btn-send" type="submit" name="submit">Edit Work </button> 
								</fieldset>
								</form>
							
							</div>
						</div>
						</div>
						</div>
						</div>
						<?php
if(isset($_POST['submit']))
{		global $con;
		
		if(!isset($User_id))
		{
			echo "<script> window.open('login1.php','_self')</script>";
		}
		else{
			$sql="select * from portfolio where pf_id='$pf_id'";
		$run=mysqli_query($con,$sql);
		global $profile_photo,$email1,$experience,$describe,$cat_id1;
		while($row=mysqli_fetch_array($run))
		{
			$profile_photo=$row['profile_photo'];
			$email1=$row['User_id'];
			$experience=$row['experience'];
			$describe=$row['describe_'];
			$cat_id1=$row['cat_id'];
		}

	$sql1="select User_id from user where User_id='$email1'";
	//echo $sql1;
	$run=mysqli_query($con,$sql1);
	global $email2;
	while($row=mysqli_fetch_array($run))
	{
		$email2=$row['User_id'];
	}
	if(!$email2==$email1)
	{
			echo "<script> alert('Email does not exist')</script>";
	}
	else{
	$targetDir = "Upload_portfolio/";

    $allowTypes = array('jpg','png','jpeg','gif');
    global $db;
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
	$sql2="select pf_id from portfolio where User_id='$email1'";
							
	$run=mysqli_query($con,$sql2);
	global $pf_id1;
	while($row=mysqli_fetch_array($run))
	{				
			$pf_id1=$row['pf_id'];
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
			$sql="select photo_name from portfolio_photo where pf_id=$pf_id";
			echo $sql;
			$run=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($run);
			$c=$row[0];
			echo "$c".$c;
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL=$fileName;
				
            $insert ="update `portfolio_photo` set `photo_name`='$insertValuesSQL' and `cat_id`=$cat_id1 where photo_name='$c' and pf_id=$pf_id";
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
				//echo "<script> alert('Work uploaded successfully')</script>";
		
				//echo "<script> window.open('myportfolio.php','_self')</script>";
							
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
<script>
	function edit_email()
	{
		var email=$('#email').val();
		alert(email);
				$.ajax({
					url:"backend4.php",
					type:"post",
					data:{email,email},
					success:function(data,status){
						alert('Email edited successfully');
						console.log('success:\n');
						console.log(data);
				}});
	}
	
	function edit_desc()
	{
		var desc=$('#desc').val();
		alert(desc);
				$.ajax({
					url:"backend4.php",
					type:"post",
					data:{desc,desc},
					success:function(data,status){
						alert('Details edited successfully');
						console.log('success:\n');
						console.log(data);
				}});
	}
	function edit_exp()
	{
		var exp=$('#exp').val();
		alert(exp);
				$.ajax({
					url:"backend4.php",
					type:"post",
					data:{exp,exp},
					success:function(data,status){
						alert('Experience edited successfully');
						console.log('success:\n');
						console.log(data);
				}});
	}
	function edit_cat()
	{
		var category=$('#category').val();
		alert(category);
				$.ajax({
					url:"backend4.php",
					type:"post",
					data:{category,category},
					success:function(data,status){
						alert('category edited successfully');
						console.log('success:\n');
						console.log(data);
				}});
	}
	</script>	

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