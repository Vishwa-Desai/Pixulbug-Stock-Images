<?php
session_start();

if(!isset($_SESSION['User_id']))
{
	echo "<script> window.open('login1.php?not_login=Please first login','_self') </script>";

}
else	
{

	$User_id=$_SESSION['User_id'];
	$uname=$_SESSION['U_name'];
	include 'insert.php';
	global $con,$g;
	if(isset($_GET["action"]))
	{
	$g=$_GET["action"];
	}
	//echo "action ".$g;
	if(!empty($_GET["action"]))
	{
		switch($_GET["action"])
		{
		case "add":
		if(!empty($_GET["code"])) {
		$photo_id=$_GET["code"];
		//echo $photo_id;
		$sql="SELECT photo_id,photo_name,price,filename,size FROM photo1 where photo_id='$photo_id'";
		//echo $sql;
		$run=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($run);
		$z[]=$row;
		//print_r($z);
		
		$count=count($z);
	
		$productByCode=$z;
		//print_r($z);
		$itemArray = array($productByCode[0]["photo_id"]=>array('name'=>$productByCode[0]["photo_name"], 'photo_id'=>$productByCode[0]["photo_id"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["filename"]));
		//print_r($itemArray);
		// if session is created and item is not first in the cart.
		if(!empty($_SESSION["item"])) {
			if(in_array($productByCode[0]["photo_id"],array_keys($_SESSION["item"]))) {
				foreach($_SESSION["item"] as $k => $v) {
					//print_r($_SESSION["item"][$k]);
						if($productByCode[0]["photo_id"] == $k) {
						}
					}
			} else {
				$_SESSION["item"] = array_merge($_SESSION["item"],$itemArray);
			}
		} else {
			$_SESSION["item"] = $itemArray;
		}
	}
	break;
	case "remove":
		if(!empty($_SESSION["item"]))
		{	
				foreach($_SESSION["item"] as $k=>$v)
				{
					if($_GET["code"]==$_SESSION["item"][$k]["photo_id"])
						//print_r($_SESSION["item"][$k]);
						unset($_SESSION["item"][$k]);
						if(empty($_SESSION["item"]))
						{
							unset($_SESSION["item"]);
						
						}
			}
	}
	break;
	case "Empty":
	if(!empty($_SESSION["item"]))
		{
		foreach($_SESSION["item"] as $k=>$v)
		{
				
						//print_r($_SESSION["item"][$k]);
						unset($_SESSION["item"][$k]);
						if(empty($_SESSION["item"]))
						{
							unset($_SESSION["item"]);
						
						}
		}
		}
		
	break;
}
	}

}

?>


<!DOCTYPE html>
<html lang="zxx">
<head>
<?php include 'insert.php' ?> 
        <meta charset="utf-8">
        <title>PIXELBUG | Cart</title>
        <meta name="description" content="">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="shortcut icon" type="image/x-icon" href="images/fav.png">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="css/meanmenu.min.css">
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
		<script>

</script>

        </head>
    <body class="cart">
        <div class="template-preloader-rapper">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
		<?php include 'header.php'; ?>
		<div class="inner-page-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-title">
                            <h2>Cart</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.php">Home /</a> Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shipping-area section pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mr-b30">
                        <div class="button-area row">                        
                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3>Cart</h3>
                            </div>
                                                     
                        </div>
                    </div>
                </div> 

		
      
                <div class="row">
                    <div class="col-lg-12">
					
					
                        <div class="product-list">
						<?php
							if(isset($_SESSION["item"]))
							{
								$total_price=0;
								
							?>
							<a id="btnEmpty" href="cart1.php?action=Empty" style="font-size:20px;float:right;"> Remove All </a> <br><br>
						
                            <table class="table table-striped">
							<tbody>
							<tr>
									                            
                                <th width="35%">Product</th>
								<th width="28%">Name</th>
                                <th width="25%">Price</th>
                                
                                <th class="text-right" width="20%">Total</th>
										
                            </tr>
							<?php
							if(!empty($_SESSION["item"])) {
								 foreach ($_SESSION["item"] as $item){
									// print_r($_SESSION["item"]);
									  
								$item_price = $item["price"];
							  $file=$item["image"];
							//echo $file;
							?>
							<tr>
				<td><img src="/Pixelbug/Admin/uploads/<?php echo $file; ?>" style="height:70px;width:70px;" class="cart-item-image" /></td>
				<td>	<?php echo $item["name"]; ?></td>
			
		
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="cart1.php?action=remove&code=<?php echo $item["photo_id"]; ?>"><i class='fa fa-times'></i></a>
	
									
				</td>
				</tr>
				<?php
				$total_price += ($item["price"]);
				//echo $total_price;
		}?>
		<tr>
<td colspan="2" align="right">Total:</td>
<td align="right" colspan="2"><strong><?php echo "Rs. ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
							<?php	}}else {?>
							<div class="no-records" style="font-size:20px;color:#cc0033">Your Cart is Empty</div><br>
							<?php		} ?>
	
							
                        </tbody>
                    </table>
                        </div>
                    </div>
                </div>
				<div class="col mb-2">
                <div class="row">
				
                    <div class="col-sm-12  col-md-6">
                        <a href="gallery.php" class="btn btn-block btn-dark">Continue Shopping</a>
                    </div>
                    
                </div>
            </div>
        
                    <div class="col-lg-6 col-md-12">
                        <div class="order-list">
					<?php if(!empty($_SESSION["item"])) {
								?>
                            <h3>Your Order</h3>
                            <table>
                                <tr>
                                    <td><b>Product</b></td>
                                    <td style="width:400px;"><b>
								<?php
								if(!empty($_SESSION["item"])) {
								 foreach ($_SESSION["item"] as $item){
								echo $item['name']."    :  Rs.  ".$item['price']."<br>";
								}}?></b></td>
                                </tr>
                                <tr class="row-bold">
                                    <td>Subtotal</td>
                                    <td><?php  echo "Rs. ".$total_price.".00"; ?></td>
                                </tr>
                                <tr class="row-bold">
                                    <td>Total</td>
                                    <td><?php echo "Rs. ".$total_price.".00"; ?></td>
                                </tr>
                            </table>
                            <div class="next-step">
                        		<a href="checkout.php?amount=<?php echo $total_price.".00";?>"><button class="radius-30">Proceeed to Checkout</button></a>
                    		</div>
                        </div>
                    </div> 
					<?php }?>
                </div>
            </div> 
        </div>
		<?php include 'footer.php' ; ?>
        <script src="js/vendor/jquery
		-1.12.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.meanmenu.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/lightbox.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.mixitup.min.js"></script>
        <script src="js/simplyCountdown.min.js"></script>
        <script src="js/jquery.appear.js"></script>
        <script src="js/multi_step_form.js"></script>
        <script src="inc/fancybox/jquery.fancybox.pack.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>