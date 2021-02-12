<!DOCTYPE html>
<html lang="zxx">
<head>
        <meta charset="utf-8">
        <title>PIXELBUG | My Portfolio</title>
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
                            <h2>Portfolio</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.php">Home /</a>Portfolio</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		 <div class="site-blocks-cover overlay inner-page-cover" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center" data-aos="fade-up">
            <h1>About Me</h1>
          </div>
        </div>
      </div>
    </div>

		<div class="site-section" data-aos="fade">
		<div class="container">
        <div class="row mb-5">
            <div class="col-md-6  mb-5">
			<?php include 'insert.php';
			if(isset($_POST['submit']))
			{
				$propic=$_FILES['p-pic']['name'];
				$dir="Portfolio_profile/";
				$pro=$dir.$propic;
			}
			?>
              <img src="<?php echo $dir ?>" alt="Images" class="img-fluid">
            </div>
            <div class="col-md-5 ml-auto">
			<?php 
			include 'insert.php';
			if(isset($_POST['submit']))
			{
				$targetDir = "image_portfolio/";
				$allowTypes = array('jpg','png','jpeg','gif','JPG','GIF','PNG','JPEG');
				global $db;
				$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
				if(!empty(array_filter($_FILES['upload_images']['name']))){
				foreach($_FILES['upload_images']['name'] as $key=>$val){
				$fileName = basename($_FILES['upload_images']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
            //echo $targetFilePath;
            
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                
                if(move_uploaded_file($_FILES["upload_images"]["tmp_name"][$key], $targetFilePath)){
                  
                    $insertValuesSQL=$fileName;
				echo $insertValuesSQL;	
            $insert = "INSERT INTO portfolio_photo(PFP_name) VALUES ('$insertValuesSQL')";
			//echo $insert;
			$run=mysqli_query($con,$insert);
			if(!$run)
			{
					echo "not inserted"."<br>";
			}
			 $insertValuesSQL = trim($insertValuesSQL,',');
			         if(!empty($insertValuesSQL)){
            if($run){
                $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                $statusMsg = "Files are uploaded successfully.".$errorMsg;
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
                }else{
                    $errorUpload .= $_FILES['upload_images']['name'][$key].', ';
                }
            }else{
                   
                
                $errorUploadType .= $_FILES['upload_images']['name'][$key].', ';
                }
    
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }
				echo $statusMsg;
				$name=$_POST['name'];
				$mail=$_POST['email'];
				$describe=$_POST['describe'];
				$skills=$_POST['skills'];
				$exp=$_POST['exp'];
				$cat=$_POST['cat'];
				$query="INSERT INTO portfolio(name,email,skills,about,category,Experience) VALUES 
				('$name','$mail','$skills','$describe','$cat','$exp')";
				$data=mysqli_query($con,$query);
			}
			?>
			<h4 class="text-black mb-3"> NAME :- <?php echo $name; ?> <br><br>
			EMAIL :- <?php echo $mail; ?> <br><br>
			ABOUT ME :- <?php echo $describe; ?> <br><br>
			SKILLS :- <?php echo $skills; ?> <br><br>
			EXPERIENCE :- <?php echo $exp; ?> <br><br>
			CATEGORY :- <?php echo $cat; ?> <br><br>
			</h4>
			</div>
          </div>
      </div>
    </div>

	<div class="site-section border-bottom">
      <div class="container">
        <div class="row text-center justify-content-center mb-5">
          <div class="col-md-7">
            <h2>My Photography</h2>
          </div>
        </div>
		<div>	
    <?php 
	include 'insert.php';
    $query ="SELECT DISTINCT PFP_name FROM portfolio_photo";
	$data=mysqli_query($con,$query);
    if($row=mysqli_fetch_array($data) > 0){ 
	
        while($row = mysqli_fetch_assoc($data)){ 

			 /* echo $row["P_name"];  */
            $imageThumbURL = 'image_portfolio/'.$row["P_name"]; 
            $imageURL = 'image_portfolio/'.$row["P_name"]; 
    ?>
	
		<a href="<?php echo $imageURL; ?>" data-fancybox="gallery" data-caption="<?php echo $row["title"]; ?>" >
			<img src="<?php echo $imageThumbURL; ?>" alt="" />
		</a>
	
    <?php } 
    } ?></div></div>
		<?php include 'footer.php';?>
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
        <script src="js/simplyCountdown.min.js"></script>
        <script src="js/jquery.mixitup.min.js"></script>
        <script src="js/multi_step_form.js"></script>
        <script src="inc/fancybox/jquery.fancybox.pack.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
