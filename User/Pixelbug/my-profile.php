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
        <title>PIXELBUG | My Profile</title>
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
       
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #cc0033;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #cc0033;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #cc0033;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #cc0033;
}
.dropbtn {
  background-color:#cc0033;
   border-radius: 25px;
  color: white;
  padding: 15px;
  font-size: 15px;
  border: none;
}
.Update{
  background-color:#cc0033;
   border-radius: 25px;
  color: white;
  padding: 15px;
  width:220px;
  font-size: 15px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #cc0033;
  min-width: 120px;
  box-shadow: 0px 8px 12px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 10px 13px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #666;}
</style>
<!------ Include the above in your HEAD tag ---------->
 <body>
        
		<?php include 'header.php';?><br><br>
	<?php
					global $con;
					$query="select * from user where User_id='$User_id'";
					$run=mysqli_query($con,$query);
					global $name,$profile_photo,$address,$city,$phone;
					while($row=mysqli_fetch_array($run))
					{
						$name=$row['U_name'];
						$profile_photo=$row['profile_photo'];
						$address=$row['address'];
						$city=$row['city'];
						$phone=$row['phone'];
					}
					?>
			
<br><br>
<div class="container emp-profile">
            <form action="my-profile.php" method="post" enctype="multipart/form-data">
				
                <div class="row">
                    <div class="col-md-4">
                        
                            <img src="upload_user/<?php echo $profile_photo; ?>" style="height:200px;width:200px;border-radius:50%;"alt=""/><br>
			<input type="file" name="file"/>
		<button class="btn-send" style="background-color:#cc0033;color:WHITE;width:200px;" type="submit" name="submit">Update photo </button>
						
					</form>
							
                    </div>
			
                      
					<?php 
			if(isset($_POST['submit']))
			{
					
							$filename=$_FILES['file']['name'];
							$tempname=$_FILES['file']['tmp_name'];
							$target_dir="C:/xampp/htdocs/Pixelbug/User/Pixelbug/upload_user/";
							$target_file=$target_dir.basename($_FILES['file']['name']);
							
							if(move_uploaded_file($tempname,$target_file))
							{
								//echo "uploaded";
							}
						$sql="update user set profile_photo='$filename' where User_id='$User_id'";
						$run=mysqli_query($con,$sql);
						if(!$run)
						{
								//echo 'not inserted';
						}
			}
			
			?>
			
                    <div class="col-md-4">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $name;?>
                                    </h5>
									
                                    <br>
                             <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                               
                            </ul>
						</div>
						
                    
						<div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $User_id;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $name;?></p>
                                            </div>
                                        </div>
										 
									</li>
							</div>
					
							
						  
                    </div>
					
											 

                </div>
				<div class="col-md-4">
                        <div class="dropdown">
						<button class="dropbtn">Update Profile</button>
										  <div class="dropdown-content">
											<a href="change-password.php">Change Password </a>
											<a href="delete-profile.php?delete=<?php echo $User_id; ?>">Delete Account</a>
						</div>
                    </div>
				
                          
</div>
                    <div class="col-md-4">
									
				
                     </div>
					
               <?php
					if(isset($_GET['delete']))
	{
		$delete_id=$_GET['delete'];
		
		$delete_pro="delete from user where User_id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_pro);
		if($run_delete)
		{
				
				echo "<script> window.open('index.php','_self')</script>";
		}
												
	}
?>
                    </div>
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
    </body>
</html>