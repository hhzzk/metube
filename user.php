<?php
    session_start();

    include("./templates/header.php");
    include("./templates/navbar.php");
    include("./user/sidebar.php");

    switch($_GET['main'])
    {
        case "playlist":
            include("./user/playlist.php");
            break;
        case "subscription":
            include("./user/subscription.php");
            break;
        case "uploads":
            include("./user/upload.php");
            break;
        case "liked":
            include("./user/liked.php");
            break;
        case "profile":
            include("./user/profile.php");
            break;
    }
?>
