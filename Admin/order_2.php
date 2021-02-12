<?php
include 'dbConfig.php';
global $con,$o_id;
		if(isset($_GET['o_id']))
		{
		$o_id=$_GET['o_id'];
		set_time_limit(300);
		//echo $o_id;
		global $filename,$c_id;
		$filename=array();
		$accept_pro=$sql="select o.photo_id,p.filename,p.c_id from order_details o inner join photo1 p on o.photo_id=p.photo_id where O_id='$o_id'";
		//echo $accept_pro;
		$run=mysqli_query($con,$accept_pro);
		while($row=mysqli_fetch_array($run))
		{
			$filename[]=$row['filename']; 
			$c_id=$row['c_id'];//make array
			//echo "vish";
				//echo "<script> alert('A photo has been updated') </script>";
				//echo "<script> window.open('manage-contributors.php','_self')</script>";
		}
		$sql="select User_id from contributor where c_id='$c_id'";
		$run=mysqli_query($con,$sql);
		
		$sql="select name,User_id from order_1 where O_id='$o_id'";
		$run=mysqli_query($con,$sql);
		global $name,$User_id;
		while($row=mysqli_fetch_array($run))
		{
			$name=$row['name'];
			$User_id=$row['User_id'];
		}
		//echo $name.$User_id;
  require 'class.phpmailer.php';
require 'class.smtp.php';
		$file="C:/xampp/htdocs/pixelbug/admin/$name/";
		//echo "file".$file;
		if(!file_exists($file))
		{
			mkdir($file);
		}
	//print_r($filename);
		foreach($filename as $value){
			echo $value;
			$value1="/Pixelbug/user/pixelbug/Upload_contributor/<?php echo $User_id?>/".$value;
			echo $value1;
			$target_dir="$name/".$value;
			echo $target_dir;
			//$target_file=$target_dir.basename($value);
			copy($value1,$target_dir);
			//print_r($target_file);
		} 
		
	
		// Enter the name of directory 
		$pathdir="C:/xampp/htdocs/pixelbug/admin/$name/";
								 
		// Enter the name to creating zipped directory 
		$zipcreated = "zip/$name"; 
		//echo "zip: ".$zipcreated;
		// Create new zip class 
		$zip = new ZipArchive; 

		if($zip -> open($zipcreated, ZipArchive::CREATE ) === TRUE) { 
		  
		// Store the path into the variable 
		$dir = opendir($pathdir); 
		   
		while($file = readdir($dir)) { 
			if(is_file($pathdir.$file)) { 
				$zip -> addFile($pathdir.$file, $file); 
			} 
		} 
		if($zip)
		{
			echo "zip file is created";
		}
		else
		{
			echo "zip file is not created";
		}
		$zip ->close(); 
		} 
		$mail = new PHPMailer();
		try
		{
		$mail->Host='smtp.gmail.com';
		$mail->Port=587;
		$mail->SMTPAuth=true;
		$mail->IsSMTP();
		//$mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Username='info.pixelbug@gmail.com'; //send data from
		$mail->Password='pixelbug2020KV@';
		
		$mail->setFrom('info.pixelbug@gmail.com');
		//echo $User_id;
		$mail->AddAddress($User_id);
		$file="C:/xampp/htdocs/pixelbug/admin/zip/".$name;
		$invoice="C:/xampp/htdocs/pixelbug/admin/Invoices/".$name.".pdf";
		$mail->AddAttachment($file);
		$mail->AddAttachment($invoice);
		
		//$mail->addAttachment($invoice);
		
	
		$mail->isHTML(true);


		$mail->Subject='Order delivered successfully';
		$mail->Body='<h1>Dear '.$name. '</h1> <br>'. '<h4> Hope you had a great experience. Keep visitng for fresh and amazing pictures.
		</h4>
		<br>		
		';
    if($mail->send())
    {
		$sql="delete * from order_1 where O_id='$o_id'";
		$run=mysqli_query($con,$sql);
		if($run)
		{
		}
      echo "<script> alert('Mail has been sent') </script>";
	 echo "<script> window.open('manage-order.php','_self')</script>";
	  echo "mail sent";
	 }
    else
    {
      echo "something went wrong";
    }
  }catch(Exception $e)
  {
          $result="something went wrong. please try again.";
         //echo $result;
    }		
  }
?>		
