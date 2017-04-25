<?php
session_start();

include_once("./database/tb_media.php");
include_once("./database/tb_disliked.php");
include_once("./database/tb_liked.php");

$response['status']='error'; 
$response['msg']=''; 
header('Content-type: application/json');
if(isset($_SESSION["user_id"]))
{
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $user_id = $_SESSION["user_id"];
        if(isset($_POST['type']))
        {
            $type = $_POST['type'];
            $media_id = $_POST['media_id'];
            switch($type)
            {
                case 'comment':
                    break;

            }
        }
    }
}
echo json_encode($response);
?>
