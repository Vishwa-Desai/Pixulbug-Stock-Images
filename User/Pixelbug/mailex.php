<?php
if(isset($_SESSION['User_id']))
{
	$User_id=$_SESSION['User_id'];
	$U_name=$_SESSION['U_name'];
}	
include 'insert.php';
global $con;
$sql="select p.photo_id,p.filename from order_details o inner join photo1 p where o.photo_id=p.photo_id";
echo $sql;
$run=mysqli_query($con,$sql);
global $filename;
$filename=array();
while($row=mysqli_fetch_array($run))
{
		$photo_id=$row['photo_id'];
		$filename[]=$row['filename'];
}
print_r($filename);

 require 'class.phpmailer.php';
		require 'class.smtp.php';

  	$result="";
	if(isset($_POST['submit']))
	{
		//require 'PHPMailerAutoload.php';
    
		$mail = new PHPMailer();
		try
    {
		$mail->Host='smtp.gmail.com';
		$mail->Port=587;
		$mail->SMTPAuth=true;
		$mail->IsSMTP();
		$mail->Username='info.pixelbug@gmail.com'; //send data from
		$mail->Password='pixelbug2020KV@';
		$mail->setFrom('info.pixelbug@gmail.com');
		$mail->addAddress($User_id);
		foreach($filename as $value){
			echo $value;
		$mail->addAttachment($value);
		}		
		$mail->isHTML(true);
		
		$mail->Subject='Order successfully Delivered';
		$mail->Body='<h1 align=center> Dear '.$User_id. ' </h1><br> <p> Your order is delivered successfully.Thank you for visiting our website...</p> <br> Yours Faithfully , info.pixelbug.com';

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