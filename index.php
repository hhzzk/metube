<?php
    include("./templates/header.php");
    include("./templates/navbar.php");
    include("./templates/sidebar.php");

    if(empty($_GET['main']))
    {
        include("./main.php");
    }
    elseif($_GET['main'] == 'medias')
    {
    
    }
    elseif($_GET['main'] == 'channels')
    {
        include("./channels.php"); 
    }
    else
    {
        include("./category.php"); 
    }

?>
