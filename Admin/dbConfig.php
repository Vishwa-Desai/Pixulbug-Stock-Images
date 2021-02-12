<?php
// Database configuration
$con=new mysqli("localhost","root","","pixelbug");
if($con->connect_error)
{
	die("Connection failed: " . $con->connect_error);
}
else
{
	echo "";
}
if(!mysqli_select_db($con,"pixelbug"))
{
	echo 'database not selected';
}
?>