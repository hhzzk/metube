<?php

include_once("db_conn.php");

function add_playlist($infos)
{
    if(count($infos) != 6)
    {
        return -1;
    }

    $sql = "INSERT
            INTO media 
            (media_id, media_name, upload_time, size, category, user_name) 
            VALUES 
            $infos[media_id], $infos[media_name], $infos[upload_time], 
            $infos[size], $infos[category],$infos[username]";
    if(db_query($sql))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function get_playlists($user_id)
{
    $sql = "SELECT *
            FROM playlist 
            WHERE user_id=$user_id";    

    $rows= db_select($sql);
    if($rows== false)
    {
        return false;
    }
    else
    {
       return $rows;  
    }
}

?>
