<?php
$targetDir = "uploads/"; 
$watermarkImagePath = 'stamp.png';
$statusMsg = ''; 
if(isset($_POST["submit"]))
{ 
    if(!empty($_FILES["file"]["name"]))
	{ 
        $fileName = basename($_FILES["file"]["name"]); 
        $targetFilePath = $targetDir . $fileName; 
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
        $allowTypes = array('jpg','png','jpeg'); 
        if(in_array($fileType, $allowTypes))
		{ 
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
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
    }
	else
	{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
} 
echo $statusMsg;
?>
