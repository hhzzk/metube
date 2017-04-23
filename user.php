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
        case "uploaded":
            include("./user/uploaded.php");
            break;
        case "liked":
            include("./user/liked.php");
            break;
        case "profile":
            include("./user/profile.php");
            break;
        case "contact":
            include("./user/contact.php");
            break;
        case "upload":
            include("./user/upload.php");
            break;
        case "message":
            include("./user/message.php");
            break;
        case "group":
            include("./user/group.php");
            break;
        case "history":
            include("./user/history.php");
            break;
    }
?>
