<?php 
session_start();
$_SESSION["User_id"]="";
session_destroy();
echo "<script> window.open('login1.php?logged_out=You have logged_out.,'_self') </script>";
?>