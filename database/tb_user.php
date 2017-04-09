<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

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
        return false;
    }

    if(is_user_exist($infos[email])) 
    {
        return false; 
    }

    $sql = "
        INSERT INTO 
        user (user_name, email, password) 
        VALUES ('$infos[user_name]', '$infos[email]', '$infos[password]')";
    if($id=db_insert($sql))
    {
        return $id;
    }
    else
    {
        return false;
    }

}

function update_user($user_id, $userinfos)
{
    if (!$userinfos)
    {
        return false;
    }

    $sets = '';
    while($userinfo = current($userinfos))
    {
        if(is_string($userinfo))
        {
            $sets = $sets . sprintf(" %s = '%s', ", key($userinfos), $userinfo);
        }
        if(is_int($userinfo))
        {
            $sets = $sets . sprintf(" %s = %d, ", key($userinfos), $userinfo);
        }   
        next($userinfos);
    }
    $sets = rtrim($sets, ", "). ' ';
        
    $sql = "UPDATE user
            SET $sets
            WHERE user_id=$user_id";

    if(db_query($sql))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function get_user_info($user_id)
{
    $sql = "SELECT *
            FROM user
            WHERE user_id='$user_id' 
            OR user_name='$user_id' 
            OR email='$user_id'"; 

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
$infos = [
"phone" => "12345996"
];
update_user(1, $infos);

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
