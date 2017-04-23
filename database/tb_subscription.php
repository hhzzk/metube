<?php

include_once("db_conn.php");

function add_subscription($infos)
{
    if(count($infos) != 2)
    {
        return -1;
    }

    $sql = "INSERT
            INTO subscription 
            (user_id, channel_id) 
            VALUES 
            ('$infos[user_id]', '$infos[channel_id]')";
    if(db_query($sql))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function delete_subscription($subscription_id)
{
    $sql = "DELETE
            FROM subscription 
            WHERE subscription_id=$subscription_id";    

    if(db_query($sql))
    {
        return true;
    }
    else
    {
        return false;
    }

}

function get_subscriptions($user_id)
{
    $sql = "SELECT *
            FROM subscription 
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
