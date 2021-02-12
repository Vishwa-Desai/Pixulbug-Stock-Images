<?php
//watermark 
// Path configuration 
include 'dbConfig.php';
$targetDir = "uploads/"; 
$watermarkImagePath = 'stamp.png'; 
 
$statusMsg = ''; 
if(isset($_POST["submit"])){ 
    if(!empty($_FILES["file"]["name"])){ 
        // File upload path 
        $fileName = basename($_FILES["file"]["name"]); 
        $targetFilePath = $targetDir . $fileName; 
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
         //echo $targetFilePath;
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg'); 
        if(in_array($fileType, $allowTypes)){ 
            // Upload file to the server 
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                // Load the stamp and the photo to apply the watermark to 
                $watermarkImg = imagecreatefrompng($watermarkImagePath); 
                switch($fileType){ 
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
                } 
                 
                // Set the margins for the watermark 
                $marge_right = 10; 
                $marge_bottom = 10; 
                 $marge_right1 = 400; 
                $marge_bottom1 = 400; 
                 
                // Get the height/width of the watermark image 
                $sx = imagesx($watermarkImg); 
                $sy = imagesy($watermarkImg); 
                $q=0;
                // Copy the watermark image onto our photo using the margin offsets and  
                // the photo width to calculate the positioning of the watermark. 
                imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg)); 
                 imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right1, imagesy($im) - $sy - $marge_bottom1, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg)); 
                 
                // Save image and free memory 
                imagepng($im, $targetFilePath);
				global $con;
				$select="select * from photo1 where filename='$fileName'";								
				$run=mysqli_query($con,$select);
				
				if(!$run)
				{
						printf("Error : %s",mysqli_error($con));
						exit(0);
				}
				while($row=mysqli_fetch_array($run))
				{		
					global $size,$photo_id;
					$photo_id=$row['photo_id'];
					$size=$row['size'];
	
				
				}
									global $size,$photo_id;
									
				$sql="INSERT INTO photo_wmkd (`file_name`, `size`, `p_id`) VALUES ('$fileName','$size','$photo_id')";
				//echo $sql;
				$data=mysqli_query($con,$sql);
                imagedestroy($im); 
     
                if(file_exists($targetFilePath)){ 
                    //$statusMsg = "The image with watermark has been uploaded successfully."; 
					//echo "<script> alert('The image with watermark has been uploaded successfully.') </script>";
				echo "<script> window.open('manage-photo.php','_self')</script>";

					$q=1;
                }else{ 
                    $statusMsg = "Image upload failed, please try again."; 
                }  
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, and PNG files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
} 
 
// Display status message 
	