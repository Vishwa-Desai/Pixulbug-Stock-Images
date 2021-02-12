	<form method="post" action="upload1.php">
                            <fieldset id="first">
                                <h2 class="title">Preview Details Again</h2>
                                <ul id="preview">
								    <li><img src='$filename' alt=""></li>
                                    <li><span>Address1 :</span>
									<?php echo $add1; ?></li>
                                    <li><span>Address2 :</span> <?php  
									echo $add2; ?></li>
                                    <li><span>City :</span> <?php  
									 echo $city; ?></li>
									<li><span>Country :</span><?php 
								    echo $country; ?> </li>
									<li><span>Phone Number :</span><?php 
									echo $phone; ?> </li>
                                    <li><span>Photo Category :</span> <?php 
									echo $category ?></li>
                                    <li><span>Photo Name :</span><?php 
									echo $photoname ?></li>
								   <li><span>Photo Price :</span><?php 
								   echo $price ?></li>
                                    
                                </ul>
                                
                