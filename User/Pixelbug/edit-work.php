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
                            <h2>Edit Work</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.php">Home /</a> Edit Work</li>
                            </ul>
                        </div>
                    </div>
					
                </div>
				
            </div>
        </div>
		 <div class="home-team-area about-page-team pt-90 pb-70">
            <div class="container">
		<div class="row">
		<div class="col-md-12 col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="row">
						 <form method="post" action="edit-work.php" enctype="multipart/form-data">
                           
										<div class="col-md-6 col-12">
										<div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Photos</label>
                                            <input type="file" name="files[]" multiple>
                                        </div>
                                    </div>
										
										<div class="col-md-12 col-12 padd-top-20 text-center">
											<button type="submit" name="submit" class="btn btn-danger">Update & Exit</a>
										</div>
										
									</div>
						 </form>
								</div>
								
							</div>
						</div>
						<div class="portfolio-details-area pt-100 pb-90">
            <div class="container">
                <div class="row"> <div class="related-project">
                    
                    <div class="row">                        
								<?php
								
								$sql1="select p_photoid,photo_name,cat_id from portfolio_photo where pf_id='$pf_id'";
								//echo $sql1;
								$run=mysqli_query($con,$sql1);
								global $photo,$p_photoid,$total;
								
								while($row=mysqli_fetch_array($run))
								{				
										$photo=$row['photo_name'];
										$p_photoid=$row['p_photoid'];
										$cat_id=$row['cat_id'];
								?>
							<div class="col-lg-4 col-md-6 col-sm-12 mix theme graphics mb-md-30">
						
                            <div class="single-portfolio">
							<a href="edit-work.php?delete=<?php echo $p_photoid ?>">
							<button class="btn" data-toggle="tooltip" data-placement="top" title="Remove"><i class="fa fa-close"></i></a>
							</button></a>
                                <div class="portfolio-image">
                                   <img src="Upload_portfolio/<?php echo $photo;?>" style="height:300px;width:400px;" alt=""></a>
                               </div>
                             </div>
                        </div>
							<?php } ?>	
					<?php 
					if(isset($_GET['delete']))
					{
						$delete=$_GET['delete'];
						$sql="delete from portfolio_photo where p_photoid='$delete'";
						echo $sql;
						$run=mysqli_query($con,$sql);
						if($run)
						{
							echo "deleted";
						}
					}
					?>
						
						
      <?php
	  if(isset($_FILES['files']['name']) && isset($_POST['submit']))
	  {
	  $targetDir = "Upload_portfolio/";

    $allowTypes = array('jpg','png','jpeg','gif');
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
	
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
?>
                        </div>
                </div>
            </div>
        </div>
		</div>
       
					</div>
					<!-- /row -->
				</div>	
			</div>
		
		<br><br>
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