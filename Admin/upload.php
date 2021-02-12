<!DOCTYPE html>
<html lang="zxx">
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
                                <li><a href="index.html">Home /</a> Upload Photo</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="multistep-form pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <form class="regform" method="post" enctype="multipart/form-data" action="upload3.php">
                            <ul id="progressbar">
                                <li class="active">Your Personal Informations</li>
                                <li>Upload Photo Informations</li>
                                <li>Preview Details Again</li>
                                <li>Terms and Conditions</li>
                                <li>Status </li>
                            </ul>
                            <fieldset id="first">
                                <h2 class="title">Your Personal Informations</h2>
                                <input type="text" class="text_field" name="fname" placeholder="Your First Name" />
                                <br/>
                                <input type="text" class="text_field" name="lname" placeholder="Your Last Name" />
                                <br/>
                                <input type="email" class="text_field" name="email" placeholder="Email" />
                                <br/>
                                <input type="button" name="next" class="next_btn margin-0" value="Next >" />
                            </fieldset>
                            <fieldset>
                                <h2 class="title">Upload Photo Informations</h2>
                                <select class="options" name="category">
                                    <option value=" ">--Select Category--</option>
                                    <option value="Nature">Nature</option>
                                    <option value="Human">Human</option>
                                    <option value="Abstract">Abstract</option>
                                    <option value="Monochrome">Monochrome</option>
									<option value="Colours">Colours</option>
                                </select>
                                <br/>
                                <input type="text" class="text_field" name="P_name" placeholder="Your Photo Name" />
								<br>
								<label>Choose an Image to Upload</label>
								<br>
								<input type="file" name="upload_image" id="image_file">
                                <br/>
								<input type="text" class="text_field" name="Price" placeholder="Price for your photo" />
								<br>
                                <textarea name="textarea" cols="30" rows="10" placeholder="Add Keywords" name="keywords"></textarea>
                                <input type="button" name="previous" class="pre_btn" value="< Back" />
								<input type="button" name="next" class="next_btn" value="Next >" />		
									
                            </fieldset>
                            <fieldset>
                                <h2 class="title">Preview Details Again</h2>
                                <ul id="preview">
                                    <li><img src='$filename' alt=""></li>
                                    <li><span>Name :</span><?php echo $_POST['fname'] . " " . $_POST['lname'] ?></li>
                                    <li><span>E-mail :</span> <?php echo $_POST['email'] ?></li>
                                    <li><span>Photo Name :</span> Natural Photo for Photo Grapher</li>
                                    <li><span>Photo Category :</span> Natural Photo</li>
                                    <li><span>Photo Size :</span> 1920x7000</li>
                                    <li><span>Photo Nature :</span> HD</li>
                                    <li><span>Photo Color :</span> Dark</li>
                                    <li><span>Photo Status :</span> Publish</li>
                                </ul>
                                <input type="button" name="previous" class="pre_btn" value="< Back" />
                                <input type="button" name="next" class="next_btn" value="Next >" />
                            </fieldset>
                            <fieldset>
                                <h2 class="title">Terms and Conditions</h2>
                                <div class="term-and-conditions">
                                    <input type="checkbox"> I have read and accept all the legal terms to sell my photo.
                                </div>
                                
								<input type="button" name="previous" class="pre_btn" value="< Back" />
                                <input type="submit" style="background-color:#d32f2f;color:WHITE" name="next1" class="next_btn" value="Submit >" /> 
									
								</fieldset>
                            <fieldset>
                                <h2 class="title">Status Sucess</h2>
                                <p>Thanks for your submitting Photo , we will inform you soon.</p>
                            </fieldset>
                        </form>
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
    </body>
	<?php
								
								if(isset($_POST['next1']))
								{
									include 'insert.php';
									$fname=$_POST['fname'];
									$lname=$_POST['lname'];
									$email=$_POST['email'];
									$category=$_POST['category'];
									$pname=$_POST['P_name'];
									$filename=$_FILES['upload_image']['name'];
									$tempname=$_FILES['upload_image']['tmp_name'];
									$folder="image_org/".$filename;
									$cat_id="SELECT cat_id FROM category WHERE cat_name=$category"; 
									$sql="INSERT INTO photo1 (P_name,c_id,cat_id) VALUES ('$filename',2,$cat_id)";
									$data=mysqli_query($con,$sql) or die(mysqli_error($con));
									$b=move_uploaded_file($tempname,$folder);
									echo "b= ".$b;
									if(move_uploaded_file($tempname,$folder))
									{
									}
									/*$targetDir = "image_wmkd/"; 
									$watermarkImagePath = 'stamp.png';
									$statusMsg = ''; 
								 
									if(!empty($filename))
									{ 
										$fileName = basename($_FILES["upload_image"]["name"]); 
										$targetFilePath = "image_wmkd/" . $fileName; 
										echo $filename;
										$tempName=$_FILES['upload_image']['tmp_name'];
										$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
										$allowTypes = array('jpg','png','jpeg');
										echo $fileType;
										echo $targetFilePath;
										if(in_array($fileType, $allowTypes))
										{ 
											$a=move_uploaded_file($tempName,$targetFilePath);
											echo "a=".$a;
											if($a)
											{
												echo "success";
											}
											else
												{
												echo "failure";
											}
											if(move_uploaded_file($tempName,$targetFilePath))
											{ 
												
												$watermarkImg = imagecreatefrompng($watermarkImagePath); 
												switch($fileType)
												{ 
													case 'jpg': 
														$im = imagecreatefromjpeg($targetFilePath); 
														break; 
													case 'jpeg': 
														$im = imagecreatefromjpeg($targetFilePath); 
														break; 
													case 'png': 
														$im = imagecreatefrompng($targetFilePath); 
														break; 
													default: 
														$im = imagecreatefromjpeg($targetFilePath); 
														echo "im = $im";
												} 
												
												$marge_right = 50; 
												$marge_bottom = 20; 
												$marge_right1 = 350; 
												$marge_bottom1 = 450; 
												$sx = imagesx($watermarkImg); 
												$sy = imagesy($watermarkImg); 
												  
												imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg)); 
												imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right1, imagesy($im) - $sy - $marge_bottom1, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg)); 
												
												imagepng($im, $targetFilePath); 
												imagedestroy($im); 
									 
												if(file_exists($targetFilePath))
												{ 
													$statusMsg = "The image with watermark has been uploaded successfully."; 
												}
												else
												{ 
													$statusMsg = "Image upload failed, please try again."; 
												}  
											}
											else
											{ 
												$statusMsg = "Sorry, there was an error uploading your file."; 
											} 
										}
										else
										{ 
											$statusMsg = 'Sorry, only JPG, JPEG, and PNG files are allowed to upload.'; 
										} 
									}
									else
									{ 
										$statusMsg = 'Please select a file to upload.'; 
									} 
								 
								echo $statusMsg;


					*/
								}
								
?>
								
</html>
