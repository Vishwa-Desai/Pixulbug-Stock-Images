<?php    
				//session_start();
				include 'insert.php';
		
				if(isset($_POST['submit']))
				{
					global $con;
					$photo_id=$_POST['pid']; 
					
					$query="select * from photo2 where photo_id='$photo_id'";
					
					$data=mysqli_query($con,$query);
					while($row=mysqli_fetch_array($data)){ 
						$image = '/Pixelbug/Admin/uploads/'.$row["filename"]; 
						$photoname=$row['photo_name'];
						$price=$row['price'];
					
					}
						$product=array($image,$photoname,$price,$photo_id,);
						$_SESSION[$photo_id]=$product;
				
						print_r($_SESSION[$photo_id]);
					header('location:cart.php');	
					
				}
		 
?> 				