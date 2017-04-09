<?php
    include("./templates/header.php");
    include("./templates/navbar.php");
    include("./templates/sidebar.php");

    if(empty(_GET['main']))
    {
        include("./main.php");
    }
    elseif(_GET['main'] == 'medias')
    {
    
    }
    else
    {
        include("./category.php") 
    
    }

?>
