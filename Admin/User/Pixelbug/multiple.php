//multiple upload
									<div class="file_uploading hidden">
								<img src="uploading.gif" alt="Uploading......"/>
								</div>
								<!--phpzag.com-->
								<?php
								$uploaded_images = array();
								foreach($_FILES['upload_images']['name'] as $key=>$val){
								$upload_dir = "uploads/";
								$upload_file = $upload_dir.$_FILES['upload_images']['name'][$key];
								$filename = $_FILES['upload_images']['name'][$key];
								if(move_uploaded_file($_FILES['upload_images']['tmp_name'][$key],$upload_file)){
								$uploaded_images[] = $upload_file;
								$insert_sql = "INSERT INTO uploads(id, file_name, upload_time)
								VALUES('', '".$filename."', '".time()."')";
								mysqli_query($conn, $insert_sql) or die("database error: ". mysqli_error($conn));
								}
								}
								?>