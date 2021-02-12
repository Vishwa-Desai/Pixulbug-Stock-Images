<?php
  use phpmailer1\src\phpmailer;
  use phpmailer1\src\SMTP;
  use phpmailer1\src\Exception; 
	$result="";
	if(isset($_POST['submit']))
	{
		require 'PHPMailerAutoload.php';
    
		$mail= new PHPMailer();
		try
    {
		$mail->Host='smtp.gmail.com';
		$mail->Port=587;
		$mail->SMTPAuth=false;
		//$mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Username='vishwadesai2408@gmail.com'; //send data from
		$mail->Password='vish2480';
		
		$mail->setFrom($_POST['em']);
		$mail->addAddress('harshildesai1633@gmail.com');
		$mail->addReplyTo($_POST['em']);
		
		$mail->isHTML(false);
		$mail->Subject='Form submission :' .$_POST['sub'];
		$mail->Body='<h1 align=center> Name :' .$_POST['fn'].'<br>Email: '.$_POST['em']. '<br>Message: '.$_POST['message'].' </h1>';

    if(!$mail->send())
    {
      $result="something went wrong. please try again.";

    }
    else
    {
      $result="Thanks ".$_POST['fn']."for contacting us. we will get back to you";
    }
  }catch(Exception $e)
  {
          $result="something went wrong. please try again.";
          echo $result;
    }		
  }
?>		
		
		
		
		
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Fotograp &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300i,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/lightgallery.min.css">    
    
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    
    <link rel="stylesheet" href="css/swiper.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>

<div class="site-section" data-aos="fade">
    <div class="container-fluid">
      
      <div class="row justify-content-center">
        <div class="col-md-7">
          

          <div class="row">
            <div class="col-lg-8 mb-5">
              <h5 class="text-center text-success"> <?php echo $result; ?> </h5>
              <form action="#" method="post">
               

                <div class="row form-group">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label class="text-black" for="fname">First Name</label>
                    <input type="text" id="fname" name="fn" class="form-control">
                     
                  </div>
                  <div class="col-md-6">
                    <label class="text-black" for="lname">Last Name</label>
                    <input type="text" id="lname" name="ln"class="form-control">
                  </div>
                </div>

                <div class="row form-group">
                  
                  <div class="col-md-12">
                    <label class="text-black" for="email">Email</label> 
                    <input type="email" id="email" name="em" class="form-control">
                  </div>
                </div>

                <div class="row form-group">
                  
                  <div class="col-md-12">
                    <label class="text-black" for="subject">Subject</label> 
                    <input type="subject" id="subject" name="sub"class="form-control">
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="message">Message</label> 
                    <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <input type="submit" value="Send Message" name="submit" class="btn btn-primary py-2 px-4 text-white">
                  </div>
                </div>

    
              </form>

            </div>
    </div>
  </div>
</div>
</div>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/swiper.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/picturefill.min.js"></script>
  <script src="js/lightgallery-all.min.js"></script>
  <script src="js/jquery.mousewheel.min.js"></script>

  <script src="js/main.js"></script>
  
  <script>
    $(document).ready(function(){
      $('#lightgallery').lightGallery();
    });
  </script>
    
  </body>
</html>
</body>
</html>