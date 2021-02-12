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
<form method="post" action="eg1.php">
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
</form>

<form method="post" action="eg1.php">

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
                                <textarea name="textarea" cols="30" rows="10" placeholder="Add Keywords" name="keywords"></textarea>
                                <input type="button" name="previous" class="pre_btn" value="< Back" />
                                <input type="button" name="next1" class="next_btn" value="Next >" />
                                
                            </fieldset>
						   </form>   
						   <form method="post" action="eg1.php"> 
						   <fieldset>
                                <h2 class="title">Preview Details Again</h2>
                                <ul id="preview">
                                    <li><img src='$filename' alt=""></li>
                                    <?php
                                        if(isset($_POST['next']))
                                        {
                                            $fname=$_POST['fname'];
                                            $lname=$_POST['lname'];
                                            $email=$_POST['email'];
                                            
                                        }
                                    ?>
                                    <li><span>Name :</span><?php echo $fname . " " . $lname; ?></li>
                                    <li><span>E-mail :</span> <?php echo $email; ?></li>
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
    </form>
                                         



</body>
</html>