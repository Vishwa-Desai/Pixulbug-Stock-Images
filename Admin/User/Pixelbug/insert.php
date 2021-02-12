<?php
$server="localhost";
$username="root";
$password="";
$dbname="pixelbug";
$con=mysqli_connect($server,$username,$password);
if($con->connect_error)
{
	die("Connection failed.".$con->connect_error);
}
else
{
	//echo "Successfully connected.";
}
if(!mysqli_select_db($con,$dbname))
{
	//echo "Database not selected.";
}
?>