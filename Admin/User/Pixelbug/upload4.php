<?php
include 'upload3.php';
$targetDir = "image_wmkd/"; 
$watermarkImagePath = 'stamp.png';
$statusMsg = ''; 
$filename=$_FILES['upload_image']['name'];
$fileName = "C:/xampp3/htdocs/Sem_6/Pixelbug/image_org/".$filename; 
        $targetFilePath = $targetDir . $fileName; 
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
        $allowTypes = array('jpg','png','jpeg');
		$temp_name=$_FILES['upload_image']['tmp_name'];
        if(in_array($fileType, $allowTypes))
		{ 
            if(move_uploaded_file($temp_name,$targetFilePath))
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

echo $statusMsg; 
$sql="INSERT INTO photo_wmkd (P_name) VALUES ('$watermarkImg')";
$data=mysqli_query($con,$sql) or die(mysqli_error($con));


?>