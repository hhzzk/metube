<?php

include_once("db_conn.php");

function add_media($infos)
{
    if(count($infos) != 5)
    {
        return false;
    }

    $sql = "INSERT INTO 
            media (media_name, description, size, category, user_id) 
            VALUES 
            ('$infos[media_name]','$infos[description]', '$infos[size]', '$infos[category]','$infos[user_id]')";
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
                FROM history 
                WHERE user_id=$user_id
            
            )";    

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

function get_medias($order)
{
    $sql = "SELECT *
            FROM media
            ORDER BY $order desc";    

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

function get_uploaded($user_id)
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

function get_media_by_id($media_id)
{
    $sql = "SELECT *
            FROM media
            WHERE media_id=$media_id";    

    $rows= db_select($sql);
    if($rows== false)
    {
        return false;
    }
    else
    {
       return $rows[0];  
    }
}


?>
