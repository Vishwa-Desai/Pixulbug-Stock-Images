
<?php
session_start();
if(isset($_SESSION['User_id']))
{
	$User_id=$_SESSION['User_id'];
	echo $User_id;
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
                        <form class="regform" method="post" action="upload1.php">
<p>
  <a class="btn btn-danger" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
   Your personal Information
  </a>
  <a class="btn btn-danger" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
   Upload Photo information
  </a>
  <a class="btn btn-danger" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
   Preview Details again 
  </a>
  <a class="btn btn-danger" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample">
   Terms and conditiond
  </a>
  </p>
  <div class="collapse" id="collapseExample1">
  <div class="card card-body">
                        <form method="post" action="upload1.php">
                            <fieldset id="first">
							
                                <h1 style="color:#cc0033;">Please Enter your address</h1>
  
    
    <input type="text" class="text_field" name="address" placeholder="Enter Address1">
	
    <select class="options" name="city">
                                    <option value=" ">--Select City--</option>
                                    <option value="Ahemedabad">Ahmedabad</option>
                                    <option value="Surat">Surat</option>
                                    <option value="Baroda">Baroda</option>
                                    <option value="Gandhinagar">Gandhinagar</option>
									<option value="Rajkot">Rajkot</option>
                                </select>
   
	<select class="options" name="category">
                                    <option value=" ">--Select Category--</option>
                                    <option value="Nature">Nature</option>
                                    <option value="Human">Human</option>
                                    <option value="Abstract">Abstract</option>
                                    <option value="Monochrome">Monochrome</option>
									<option value="Colours">Colours</option>
                                </select>
      
      
   <br>
    
      
      <input type="text" class="text_field" name="zip" placeholder="Enter Zipcode">
    
      <input type="text" class="text_field" name="Phonenumber" placeholder="Enter Phone number">
	  <input type="text" class="text_field" name="profilename" placeholder="Enter Your Profile Name">
  <input type="text" class="text_field" name="experience" placeholder="Enter Your experience in this field">
  
  <input type="textarea" class="text_field" rows="3" col="4" name="describe" placeholder="Describe Your self">
  
  
    <br>
	 <input style="background-color:#cc0033;width:400px;height:40px;" type="submit" name="next" value="Next >" />
  </div>
  
   </fieldset>
	</form>
								<?php
								if(isset($_POST['next']))
								{
									global $con,$add1,$add2,$city,$country,$phone,$zip;
									$add1=$_POST['address'];
									$city=$_POST['city'];
									
									$phone=$_POST['Phonenumber'];
									$zip=$_POST['zip'];
									$profilename=$_POST['profilename'];
									$describe=$_POST['describe'];
									$experience=$_POST['experience'];
									$category=$_POST['category'];
									$sql1="select cat_id from category where cat_name='$category'";
									echo $sql1;
									$run=mysqli_query($con,$sql1);
									while($row=mysqli_fetch_array($run))
									{				
										$cat_id=$row['cat_id'];
										echo $cat_id;
									}
									echo $add1.$add2.$city.$User_id.$category;
									$sql="insert into contributor(`nickname`, `cat_id`, `Description`, `User_id`, `experience`, `add1`, 
									`city`, `zipcode`, `phone_number`) values('$profilename','$cat_id','$describe','$User_id','$experience',
									'$add1','$city','$zip','$phone')";
									echo $sql;
									$run=mysqli_query($con,$sql);
									if(!$run)
									{
										echo 'Not inserted';
									   
									}
								}
								?>
    </div>
</div>		   
<div class="collapse" id="collapseExample2">
  <div class="card card-body">
				<form method="post" action="upload1.php" enctype="multipart/form-data">
                            <fieldset id="first">
							
                                <h2 class="title">Upload Photo Informations</h2>
                                
                                <br/>
                                <input type="text" class="text_field" name="P_name" placeholder="Your Photo Name" />
								<br/>
								<label>Choose an Image to Upload</label>
								<br/>
								<input type="file" name="upload_image" id="image_file">
                                <br/>
								<select class="options" name="cat">
                                    <option value=" ">--Select Category--</option>
                                    <option value="Nature1">Nature</option>
                                    <option value="Human1">Human</option>
                                    <option value="Abstract1">Abstract</option>
                                    <option value="Monochrome1">Monochrome</option>
									<option value="Colours1">Colours</option>
                                </select>
								
                                <input type="text" name="keywords" placeholder="Add Keywords"></textarea>
                                 <input type="text" name="price" placeholder="Enter price"></textarea>
                             
								
                                 <input type="submit" name="next1"  value="Next >" />
								 
							 </fieldset>
						</form>
						<?php
						
						if(isset($_POST['next1']))
						{
							global $con;
							$photoname=$_POST['P_name'];
							$keywords=$_POST['keywords'];
							$date=date("Y/m/d");
							$filename=$_FILES['upload_image']['name'];
							$tempname=$_FILES['upload_image']['tmp_name'];
							$target_dir="C:/xampp/htdocs/Pixelbug/User/Pixelbug/uploads/";
							
							$target_file=$target_dir.basename($_FILES['upload_image']['name']);
							if(move_uploaded_file($tempname,$target_file))
							{
								echo "uploaded";
							}
							$price=$_POST['price'];
							$size=$_FILES['upload_image']['size'];
							$folder="image_org/".$filename;
						
							
							$sql2="select * from contributor where User_id='$User_id'";
							echo $sql2;
							$run=mysqli_query($con,$sql2);
							while($row=mysqli_fetch_array($run))
							{				
									$cont_id=$row['c_id'];
									$cat_id=$row['cat_id'];
									//echo "c_id".$cont_id;
									//echo "cat_id".$cat_id;
							}
						$sql="INSERT INTO `photo1`(`photo_name`, `upload_on`, `cat_id`, 
						`price`, `size`, `c_id`,`keywords`, `filename`)
						VALUES ('$photoname','$date','$cat_id','$price','$size','$cont_id','$keywords','$filename');";
						echo $sql;
						$run=mysqli_query($con,$sql);
						}
					?>
						
</div>
</div>
<div class="collapse" id="collapseExample3">
  <div class="card card-body">
  	<form method="post" action="upload1.php">
	<?php
	$sql2="select * from contributor where User_id='$User_id'";
							echo $sql2;
							$run=mysqli_query($con,$sql2);
							while($row=mysqli_fetch_array($run))
							{				
									$cont_id=$row['c_id'];
									$cat_id=$row['cat_id'];
									$add1=$row['add1'];
									$city=$row['city'];
									$zipcode=$row['zipcode'];
									$phone=$row['phone_number'];
									
							} 
							$sql3="select * from photo1 where c_id='$cont_id'";
							$run=mysqli_query($con,$sql3);
							while($row=mysqli_fetch_array($run))
							{				
									$name=$row['photo_name'];
									$price=$row['price'];
							}
							$sql4="select * from category";
							$run=mysqli_query($con,$sql4);
							while($row=mysqli_fetch_array($run))
							{				
									$cat_name=$row['cat_name'];
							}
					?>
                            <fieldset id="first">
                                <h2 class="title">Preview Details Again</h2>
                                <ul id="preview">
								    <li><img src='$filename' alt=""></li>
                                    <li><span>Address1 :</span>
									<?php echo $add1; ?></li>
                                    <li><span>City :</span> <?php  
									 echo $city; ?></li>
									 <li><span>Zipcode :</span> <?php  
									 echo $zip; ?></li>
									<li><span>Phone Number :</span><?php 
									echo $phone; ?> </li>
                                    <li><span>Photo Category :</span> <?php 
									echo $cat_name ?></li>
                                    <li><span>Photo Name :</span><?php 
									echo $name ?></li>
								   <li><span>Photo Price :</span><?php 
								   echo $price ?></li>
                                    
                                </ul>
                                
                
				          <input type="submit" name="next2"  value="Next >" />
							</fieldset>
					</form>
					
							
</div>				
</div>			
<div class="collapse" id="collapseExample4">
  <div class="card card-body">	
				
                            <fieldset id="first">
                                <h2 class="title">Terms and Conditions</h2>
                                <div class="term-and-conditions">
                                    <input type="checkbox"> I have read and accept all the legal terms to sell my photo.
                                </div>
                                  <input type="submit" name="next3"  value="Next >" />
                                
                            </fieldset>
                            <fieldset>
							
                                <h2 class="title">Status Sucess</h2>
                                <p>Thanks for your submitting Photo , we will inform you soon.</p>
                            </fieldset>
                       
</div>
</div>
</form>
                        <?php
                               /*    include 'insert.php';
                                if(isset($_POST['next1']))
                                {
                                    global $fname,$lname,$email;
                                    $fname=$_POST['fname'];
                                    echo $fname;
                                    $lname=$_POST['lname'];
                                    $email=$_POST['email'];
                                    $category=$_POST['category'];
                                    $pname=$_POST['P_name'];
                                    $filename=$_FILES['upload_image']['name'];
                                    $tempname=$_FILES['upload_image']['tmp_name'];
                                    $folder="image_org/".$filename;
                                    $sql="INSERT INTO photo (P_id) VALUES ('$filename')";
                                    $data=mysqli_query($dbname,$sql) or die(mysqli_error($dbname));
                                    //move_uploaded_file($tempname,$folder);
                                }*/?>
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
</html>