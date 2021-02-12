<?php
include 'cnx.php';
$sql="select * from user where U_name like '%"$_POST['search']."%'";
print_r($sql);
$array=$cnx->query($sql);
foreach($array as $key)
{
?>
<div id="user"> <?php echo $key['U_name'] ?> </div>
<?php
}
?>
	