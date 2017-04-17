<?php
session_start();
$servername = "mysql1.cs.clemson.edu";
$username = "metube_y7r3";
$password = "woshimahui2011";
$dbname = "metube_rqc2";

//$uname = $_POST["username"];
//$upwd = $_POST["password"];

// 创建连接
$link = mysqli_connect($servername,$username,$password,$dbname) or die('Could not connect:'.mysqli_error($link));


/******************************************************
*
* upload document from user
*
*******************************************************/

//$username=$_SESSION['users'];


//Create Directory if doesn't exist
if(!file_exists('uploads/'))
	mkdir('uploads/', 0757);
$dirfile = 'uploads/'.$username.'/';
if(!file_exists($dirfile))
	mkdir($dirfile,0755);
	chmod( $dirfile,0755);
	if($_FILES["file"]["error"] > 0 )
	{ 	$result=$_FILES["file"]["error"];} //error from 1-4
	else
	{
		$upfile = $dirfile.urlencode($_FILES["file"]["name"]);
	  
	  if(file_exists($upfile))
	  {
	  	$result="5"; //The file has been uploaded.
	  }
	  else{
			if(is_uploaded_file($_FILES["file"]["tmp_name"]))
			{
				if(!move_uploaded_file($_FILES["file"]["tmp_name"],$upfile))
				{
					$result="6"; //Failed to move file from temporary directory
				}
				else /*Successfully upload file*/
				{
					//insert into media table
					$insert = "insert into media(mediaid, filename,username,type, path)".
							  "values(NULL,'". urlencode($_FILES["file"]["name"])."','NULL','".$_FILES["file"]["type"]."', '$upfile')";
					$query_result = mysqli_query($link,$insert)  or die("Insert into Media error in media_upload_process.php " .mysql_error($link));
					$result="0";
					chmod($upfile, 0644);
				}
			}
			else  
			{
					$result="7"; //upload file failed
			}
		}
	}
	
	//You can process the error code of the $result here.
?>

<!-- <meta http-equiv="refresh" content="0;url=browse.php?result=<?php echo $result;?>">
 -->