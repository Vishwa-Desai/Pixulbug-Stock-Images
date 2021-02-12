<?php 
session_start();
$_SESSION["Adm_id"]="";
$_SESSION["Adm_pwd"]="";
session_destroy();
echo "<script> window.open('login1.php?logged_out=You have logged_out.','_self') </script>";
?>