<?php 
include 'dbConfig.php';
$id=$_SESSION['Adm_id'];
$pwd=$_SESSION['Adm_pwd'];
$sql="select * from `admin` where Adm_id='$id' and Adm_pwd='$pwd'";
global $con;
			$run=mysqli_query($con,$sql);
			$check=mysqli_num_rows($run);
			$row1=mysqli_fetch_assoc($run);
			$name=$row1['Adm_name'];
			$photo=$row1['profile_photo'];
			
//$name=$_SESSION['Adm_name'];
 ?>
<head>
<style>
.username
{
		font-size:20px;
		color:  #74829a;
		padding-top:8px;
}
</style>
</head>
	
		<div id="wrapper" class="">
			<div class="fakeLoader"></div>
			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-static-top"  style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span></span>
					</button>
					
					<a class="navbar-brand" href="#"><img src="img/Logo1.png" class="img-responsive" alt="Logo"></a>
				</div>
				<!-- /.navbar-header -->
				
				<ul class="nav navbar-top-links navbar-left header-search-form hidden-xs">
					<li><a class="menu-brand" id="menu-toggle"><span class="ti-view-grid"></span></a></li>
					
				</ul>
				<ul class="nav navbar-top-links navbar-right">
					

					<!-- /.dropdown -->
					<!-- /.dropdown -->
					<!-- /.dropdown --><span class="username"><b> <?php echo "$name"; ?> </b></span>
					<li class="dropdown">
						
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"> 
						<?php echo "<img src='assets/img/$photo' class='img-responsive img-circle' alt='user'>"; ?>
						<ul class="dropdown-menu dropdown-user right-swip">
							<li><a href="my-profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
							</li>
							<li><a href="login1.php"><i class="fa fa-sign-out fa-fw"></i> Login</a>
							</li>
							<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
							</li>
							
						</ul>
						<!-- /.dropdown-user -->
					</li>
					
					<!-- /.dropdown -->
				</ul>
	
		