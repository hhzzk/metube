<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Media Upload</title>
</head>
  <body>

    <!--<nav class="navbar navbar-inverse navbar-fixed-top">-->
	
	<?php include ("signinnavbar.php"); ?>
    </nav>
		<!-- upload -->
					<div class="upload-file">
							<form method="post" action="media_upload_process.php" enctype="multipart/form-data" >
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
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  </body>
</html>