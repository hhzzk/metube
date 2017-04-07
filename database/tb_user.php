<?php

include_once("db_conn.php");

function is_user_exist($email)
{
    $sql = "select * from user where email='$email'";
    $result = db_query($sql);

    if(mysqli_num_rows($result) == 0)
    {
        return false; 
    }
    
    return true;
}

function add_user($infos)
{
    if(count($infos) != 3)
    {
        return -1;
    }

    if(is_user_exist($infos[email])) 
    {
        return -1; 
    }

    $sql = "insert into user (user_name, email, password) values ('$infos[username]', '$infos[email]', '$infos[password]')";
    if(db_query($sql))
    {
        return 0;
    }
    else
    {
        return -1;
    }

}

function update_user($username, $userinfos)
{
    if (!$userinfos)
    {
        return -1;
    }

    $sets = '';
    foreach($userinfos as $userinfo)
    {
        if(is_string($userinfo))
        {
            $sets = $sets . sprintf(" %s = '%s', ", key($userinfos), $userinfo);
        }
        if(is_int($userinfo))
        {
            $sets = $sets . sprintf(" %s = '%d', ", key($userinfos), $userinfo);
        }
    }
    
    $sql = "UPDATE user
            SET $sets
            WHERE username=$username";

    if(db_query($sql))
    {
        return 0;
    }
    else
    {
        return -1;
    }
}

function get_user_info($user_id)
{
    $sql = "SELECT *
            FROM user
            WHERE user_id=$user_id"; 

    $rows = db_select($sql);
    if($rows == false)
    {
        return false;
    }
    else
    {
       return $rows[0];  
    }
}

/*

if(add_user("dsd@dg.com", "ddddddddd"))
    echo "add success";
else
    echo "add fail";
$a = array(
    'email' => 'email@wwww.com',
    'wang'  => 'hao'
);
 */
?>
