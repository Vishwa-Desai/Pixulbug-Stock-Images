<?php
session_start();
if(isset($_SESSION['User_id']))
{
$User_id=$_SESSION['User_id'];
$uname=$_SESSION['U_name'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
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
       
		
		
    <title>Gallery </title>
        
    <script src="js/bootstrap1.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="jquery.bsPhotoGallery.js"></script>	
	
    </script>
	
	
	<script>
	$(document).ready(function(){

		$("#d1").show();
		$("#d2").hide();
		$("#photo").hide();
	});
	document.getElementById("photo").style.display="none";
		
		
	</script>
	
    <script>
      $(document).ready(function(){
        $('ul.first').bsPhotoGallery({
          "classes" : "col-xl-3 col-lg-2 col-md-4 col-sm-4",
          "hasModal" : true,
          "shortText" : false  
        });
      });
    </script>
	
	<script>
	// MDB Lightbox Init


$(function() {
var selectedClass = "";
$(".filter").click(function(){
selectedClass = $(this).attr("data-rel");
$("#gallery").fadeTo(100, 0.1);
$("#gallery div").not("."+selectedClass).fadeOut().removeClass('animation');
setTimeout(function() {
$("."+selectedClass).fadeIn().addClass('animation');
$("#gallery").fadeTo(300, 1);
}, 300);
});
});

var divs=["d1","d2"];
var visible=null;

function toggle(divId)
{
	if(visible==divId)
	{
		
	}
	else{
		visible=divId;
	}
	hideNonvisibleDivs();
}
function hideNonvisibleDivs()
{
		var i,divId,div;
		for(i=0;i<divs.length;i++)
		{
			divId=divs[i];
			div=document.getElementById(divId);
			if(visible==divId)
			{
				div.style.display="block";
			}
			else
			{
				div.style.display="none";
			}
		}
}
</script>
  </head>
  <style>
    .input-group.md-form.form-sm.
	
	form-1 input{
  border: 1px solid #bdbdbd;
  border-top-right-radius: 0.25rem;
  border-bottom-right-radius: 0.25rem;
}
.input-group.md-form.form-sm.form-2 input {
  border: 1px solid #bdbdbd;
  border-top-left-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
}
.input-group.md-form.form-sm.form-2 input.red-border {
  border: 1px solid #ef9a9a;
}
.input-group.md-form.form-sm.form-2 input.lime-border {
  border: 1px solid #cddc39;
}
.input-group.md-form.form-sm.form-2 input.amber-border {
  border: 1px solid #ffca28;
}  
.gallery {
-webkit-column-count: 3;
-moz-column-count: 3;
column-count: 3;
-webkit-column-width: 33%;
-moz-column-width: 33%;
column-width: 33%; }
.gallery .pics {
-webkit-transition: all 350ms ease;
transition: all 350ms ease; }
.gallery .animation {
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1); }

@media (max-width: 450px) {
.gallery {
-webkit-column-count: 1;
-moz-column-count: 1;
column-count: 1;
-webkit-column-width: 100%;
-moz-column-width: 100%;
column-width: 100%;
}
}

@media (max-width: 400px) {
.btn.filter {
padding-left: 1.1rem;
padding-right: 1.1rem;
}
}

.card {
  margin: 1rem auto;
  position: relative; 
}

.card-body {
  z-index: 2;
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
}

  </style>
  
  <body>
  <?php include 'header.php';?>
  <div class="inner-page-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-title">
                            <h2>Gallery</h2>
                        </div>
						<br>
						<div class="input-group md-form form-sm form-1 pl-0">
  <div class="input-group-prepend">
    <span class="input-group-text red lighten-3" id="basic-text1"><i class="fas fa-search text-white"
        aria-hidden="true"></i></span>
  </div>
  <input class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search" id="myInput" onkeyup="myFunction()">
</div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.php">Home /</a> Gallery</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<br> <br>
    <div class="container">
       <!-- Grid row -->
<div class="row">

  <!-- Grid column -->
  <div class="col-md-12 d-flex justify-content-center mb-5">

    <button type="button" style="margin-left:20px;font-size:20px;"class="btn btn-outline-danger waves-effect filter" onclick="toggle('d1');" data-rel="all">Discover</button>
    <button type="button" style="margin-left:20px;font-size:20px;" class="btn btn-outline-danger waves-effect filter" onclick="toggle('d2');" data-rel="1">categories</button>
    
  </div>
  <!-- Grid column -->

</div>
<div class="home-single-contest pt-90 pb-90 white-bg">
            <div class="home-single single-photo-contest-area inner">
<div class="container" id="d2">

 <div class="about-content">
                              
                            <!-- single portfolio start -->
                               <ul class="home-single-slide">
							    <div class="row grid">
                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-30 grid-item graphics">
                             
                                        <div class="item">
                                            <div class="about-image">
											
											
                                                <img alt="Nature" src="Category/n6.jpg" class="card-img-top">
                                                <div class="overley">
                                                    <h4><a href="category.php?category=6">Nature</a></h4>
                                                </div>
												
												
                                            </div>
                                              
                                        </div>  
									</div>									
                                   <div class="col-lg-4 col-md-6 col-sm-12 mb-30 grid-item graphics">
                             
                                        <div class="item">
                                            <div class="about-image">
											
											
                                                <img alt="Human" src="Category/hu9.jpg" class="card-img-top">
                                                <div class="overley">
                                                    <h4><a href="category.php?category=4">Human</a></h4>
                                                </div>
											</div>
                                          </div>                                  
								</div>
								<div class="col-lg-4 col-md-6 col-sm-12 mb-30 grid-item graphics">
                             
                                        <div class="item">
                                            <div class="about-image">
											
											
                                                <img alt="Abstract" src="Category/a9.jpg" class="card-img-top">
                                                <div class="overley">
                                                    <h4><a href="category.php?category=1">Abstract</a></h4>
                                                </div>
												
											
                                            </div>
                                              
                                        </div>                                  
                                    </div>
									<div class="col-lg-4 col-md-6 col-sm-12 mb-30 grid-item graphics">
                             
                                        <div class="item">
                                            <div class="about-image">
										
											
                                                <img alt="Monochrome" src="Category/m7.jpg" class="card-img-top">
                                                <div class="overley">
                                                    <h4><a href="category.php?category=5">Monochrome</a></h4>
                                                </div>
												
								
                                            </div>
                                              
                                        </div>                                  
                                    </div>
									<div class="col-lg-4 col-md-6 col-sm-12 mb-30 grid-item graphics">
                             
                                        <div class="item">
                                            <div class="about-image">
										
											
                                                <img alt="Colours" src="Category/c8.jpg" class="card-img-top">
                                                <div class="overley">
                                                    <h4><a href="category.php?category=2">Colours</a></h4>
                                                </div>
												
								
                                            </div>
                                              
                                        </div>                                  
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-30 grid-item graphics">
                             
                                        <div class="item">
                                            <div class="about-image">
										
											
                                                <img alt="Heritage" src="Category/h23.jpg" class="card-img-top">
                                                <div class="overley">
                                                    <h4><a href="category.php?category=3">Heritage</a></h4>
                                                </div>
												
								
                                            </div>
                                              
                                        </div>                                  
                                    </div>
									<div class="col-lg-4 col-md-6 col-sm-12 mb-30 grid-item graphics">
                             
                                        <div class="item">
                                            <div class="about-image">
										
											
                                                <img alt="Street" src="Category/cu7.jpg" class="card-img-top">
                                                <div class="overley">
                                                    <h4><a href="category.php?category=7">Culture</a></h4>
                                                </div>
												
								
                                            </div>
                                              
                                        </div>                                  
                                    </div>
									<div class="col-lg-4 col-md-6 col-sm-12 mb-30 grid-item graphics">
                             
                                        <div class="item">
                                            <div class="about-image">
										
											
                                                <img alt="Wildlife" style="height:380px;"src="Category/w18.jpg" class="card-img-top">
                                                <div class="overley">
                                                    <h4><a href="category.php?category=8">Wildlife</a></h4>
                                                </div>
												
								
                                            </div>
                                              
                                        </div>                                  
                                    </div>
                                </ul>
                          </div>
 
</div>

<div class="container" id="d1">
<div class="row">
  <div class="col-md-12">


    <div id="mdb-lightbox-ui"></div>

    <div class="mdb-lightbox">
	<ul class="row first" id="myUL">
	
	<?php 
	include 'insert.php';
    $query ="select distinct photo_id,photo_name,filename,keywords,c.accepted from photo1 p inner join contributor c on p.c_id=c.c_id where free=0 and c.accepted=1 and p.accepted=1";
	
	$data=mysqli_query($con,$query);
	
    while($row=mysqli_fetch_array($data)){ 
		
			$photo_id=$row['photo_id'];
			//echo $row["photo_name"];  
			$filename=$row["filename"];
			$keywords=$row["keywords"];
            $imageThumbURL = '/Pixelbug/Admin/uploads/'.$row["filename"]; 
            $imageURL = '/Pixelbug/Admin/uploads/'.$row["filename"]; 
    ?>
		
		<figure class="col-md-4">
		<a href="" id="photo" hidden="hidden"> <?php echo $keywords; ?> <a/>
		<a href="result2.php?photo=<?php echo $photo_id?>" 
		class="img-fluid">
			<img src="<?php echo $imageThumbURL; ?>" style="height:300px;width:400px;" alt="" class="img-fluid" />
			
		</a>
			
		</figure>
	
    <?php } 
     ?>

     </ul>
	                
    </div>

  </div>
</div>
<!-- Grid row -->

<!-- Grid row -->
<!-- Grid row -->

		
</div> 
</div>
    </div> <!-- /container -->
</div>


		<?php include 'footer.php'; ?>
     
    </body>
</html>
<script>
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  console.log(input);
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName('figure');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
	  
    }
  }
}
</script>
