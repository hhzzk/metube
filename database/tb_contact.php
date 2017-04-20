<?php

include_once("db_conn.php");

function add_contact($infos)
{
    if(count($infos) != 3)
    {
        return -1;
    }

    $sql = "INSERT
            INTO message 
            (from_user_id, to_user_id, content) 
            VALUES 
            $infos[from_user_id], $infos[to_user_id],$infos[content]";
    if(db_query($sql))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function get_contact($to_user_id)
{
    $sql = "SELECT *
            FROM messages 
            WHERE to_user_id=$to_user_id";    

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
