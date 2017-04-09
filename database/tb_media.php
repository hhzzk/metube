<?php

include_once("db_conn.php");

function add_media($infos)
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

function get_history($user_id)
{
    $sql = "SELECT *
            FROM media
            WHERE media_id IN (
                SELECT media_id
                FROM viewed 
                WHERE user_id=$user_id)";    

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

function get_download($user_id)
{
    $sql = "SELECT *
            FROM media
            WHERE media_id IN (
                SELECT media_id
                FROM download 
                WHERE user_id=$user_id)";    

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

function get_liked($user_id)
{
    $sql = "SELECT *
            FROM media
            WHERE media_id IN (
                SELECT media_id
                FROM liked
                WHERE user_id=$user_id)";    

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

function get_upload($user_id)
{
    $sql = "SELECT *
            FROM media
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

function get_recent_media()
{
    $sql = "SELECT *
            FROM media
            ORDER BY upload_time desc
            LIMIT 4";    

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

function get_popular_media()
{
    $sql = "SELECT *
            FROM media
            ORDER BY viewed_time desc
            LIMIT 8";    

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

function get_media_by_category($category)
{
    $sql = "SELECT *
            FROM media
            WHERE category=$category";    

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
