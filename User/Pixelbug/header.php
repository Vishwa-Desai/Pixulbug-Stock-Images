
<!DOCTYPE html>
<html lang="zxx">
<head>
<style>
.header-middle-area .cart-area1 {
  transition: all 0.5s ease 0s;
  margin-right: 10px;
  text-align: right;
  margin-top:20px;
}
.header-middle-area .cart-area1 a {
 
 
  transition: all 0.5s ease 0s;
  position: relative;
}
.header-middle-area .cart-area1 a i {
  text-align: center;
  font-weight: bold;
  font-size: 20px;
  color: #444444;
}
.header-middle-area .cart-area1 a i {
  text-align: center;
  font-weight: bold;
  font-size: 20px;
  color: #444444;
}
.header-middle-area .cart-area1 a:hover {
  color: #d32f2f;
}
.header-middle-area .cart-area1 a:hover i {
  color: #d32f2f;
}
.header-middle-area .cart-area1 a span {
  position: absolute;
  right: -15px;
  top: 13px;
  color: #ffffff;
  width: 30px;
  height: 30px;
  background: #d32f2f;
  text-align: center;
  border-radius: 50%;
  
}

</style>
</head>
	    <header>
            <div class="header-top-area hidden-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
						</div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="right-side-tool text-right">
                                <div class="social-media-area">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <div class="header-top-right">
                                    <ul>
									<?php
										if(!isset($_SESSION['User_id']))
										{
											
										?>
										<li><span style="margin-left:2px;"><a href="login1.php"><button class="btn btn-outline-light">Login</button></a></span></li>
										<li><span style="margin-left:10px;"><a href="registration.php"><button class="btn btn-outline-light">Registration</button></a></span></li>
										
                                       <?php }
										else
										{ ?>
										<li><span style="font-size:20px;color:WHITE;"><a href="my-profile.php"> <?php echo "Hi $uname"; ?></a></span></li>
										<li><span style="margin-left:35px;"><a href="logout.php"><button class="btn btn-outline-light">Logout</button></a></span></li>
										
										<?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle-area" id="sticky">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="logo-area">
                                <a href="index.php"><img src="PIXELBUG.png" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li class="active"><a href="index.php">Home </a>
                                        </li>
                                         <li><a href="about.php">About Us </a>
                                        </li>
                                        <li><a href="#">Portfolio </a>
										<ul>
										<li><a href="createportfolio.php"> Create Portfolio    /My Portfolio</a></li>
										<li><a href="portfolios.php"> View Portfolios </a></li>
										</ul>
                                           
                                        </li>
                                        <li><a href="gallery.php">Gallery  </a>
                                        </li>
                                        
                                        <li><a href="contact.php">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
						
                        <div class="cart-area1">
							
								<a href="cart1.php"><i class="fa fa-shopping-basket" style="font-size:25px;"></i><span>
								<?php if(isset($_SESSION['item']) && isset($_SESSION['User_id'])) { $count=count($_SESSION['item']); echo $count; }else { $count=0; echo $count; }?>
								</span></a>&nbsp;&nbsp;&nbsp;
								
                         </div>
							 
                    </div>
                </div>
            </div>
			<!-- Slide Menu Section Start Here -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li class="active"><a href="index.php"> Home </a>
                                            
                                        </li>
                                         <li><a href="about.php">About</a> 
                                                
                                        </li>
                                        <li><a href="portfolio.php"> Portfolio </a>
                                            
                                        </li>
                                        <li><a href="gallery.php">Gallery</a>
                                            
                                        </li>
                                        

                                        <li><a href="contact.php">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			</header>
	
</html>