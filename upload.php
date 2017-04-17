<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Media Upload</title>
</head>
<body>
					<div class="upload-file">
							<form method="post" action="upload.php" enctype="multipart/form-data" >
								  <p style="margin:0; padding:0">
										<input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
											Add a Media: <label style="color:#663399"><em> (Each file limit 10M)</em></label><br/>
										<input  name="file" type="file" size="50"><br/>
										Title:  <input type="text" name="title" /> <br>
										Keyword: <input type="text" name="keyword" /> <br>
										<input type="hidden" /> Description:<br>
										<textarea cols="50" rows="10"> </textarea>
										<p><b> Please choose how to share the file: </b></p>
										<input type="radio" name="share" value="private">Private<br>
										<input type="radio" name="share" value="public">Public<br>																				<input type="radio" name="share" value="friend">Friend<br>
										<p><b> Please choose whether to allow to discuss the file: </b></p>
										<input type="radio" name="discuss" value="allow-discuss">allow discuss<br>
										<p><b> Please choose whether to allow to rate the file: </b></p>
										<input type="radio" name="rate" value="allow-rate">allow rate<br>
										<input value="Upload" name="submit" type="submit" /><br>
								  </p>
							</form>
					</div>
			<style type="text/css">
				.upload-file
				{
					position:absolute;top:15%;left:20%;
					font-size:18px;
				}
			</style>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>



<?php
session_start();

$user_id=$_SESSION['user_id'];

//Create Directory if doesn't exist
$upload_dir = '../media/' . $user_id . '/';
if(!file_exists($upload_dir))
	mkdir($upload_dir, 0757);
$file_name = basename($FILES['fileToUpload']['name']);
$upload_file = $upload_dir. '/' . $file_name;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
	
?>
