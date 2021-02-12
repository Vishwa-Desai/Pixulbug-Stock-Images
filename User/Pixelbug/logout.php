<?php 
session_start();
$_SESSION["User_id"]="";
unset($_SESSION["User_id"]);
unset($_SESSION["U_name"]);
if(!empty($_SESSION["item"]))
		{
		foreach($_SESSION["item"] as $k=>$v)
		{
				
						//print_r($_SESSION["item"][$k]);
						/*unset($_SESSION["item"][$k]);
						if(empty($_SESSION["item"]))
						{
							unset($_SESSION["item"]);
						
						}*/
		}
		}
echo "<script> window.open('index.php','_self') </script>";
?>