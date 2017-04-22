<?php

include_once("db_conn.php");

function add_playlist($infos)
{
    if(count($infos) != 2)
    {
        return false;
    }

    $sql = "INSERT
            INTO playlist 
            (user_id, playlist_name) 
            VALUES 
            ('$infos[user_id]', '$infos[playlist_name]')";
    if(db_query($sql))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function del_playlist($infos)
{
    if(count($infos) != 2)
    {
        return false;
    }

    $sql = "DELETE
            FROM playlist 
            WHERE 
            user_id=$infos[user_id] and  playlist_name='$infos[playlist_name]'";
    if(db_query($sql))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function get_playlist($playlist_id)
{
    $sql = "SELECT *
            FROM playlist 
            WHERE playlist_id=$playlist_id";    

    $rows= db_select($sql);
    if($rows == false)
    {
        return false;
    }
    else
    {
       return $rows[0];  
    }
}

function get_playlists($user_id)
{
    $sql = "SELECT *
            FROM playlist 
            WHERE user_id=$user_id";    

    $rows= db_select($sql);
    if($rows == false)
    {
        return false;
    }
    else
    {
       return $rows;  
    }
}

?>
