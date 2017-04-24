<?php
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    if(isset($_GET['type']))
    {
        $type = $_GET['type'];
        switch($type)
        {
            case 'dislike':
                echo 10; 
                break;
        }
    
    }
}

?>
