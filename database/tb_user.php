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

function add_user($email, $password)
{
    if($email == "" || $password == "")
    {
        return -1;
    }

    if(is_user_exist($email)) 
    {
        return -1; 
    }

    $sql = "insert into user (email, password) values ('$email', '$password')";
    if(db_query($sql))
    {
        return 0;
    }
    else
    {
        return -1;
    }

}

if(add_user("dsd@dg.com", "ddddddddd"))
    echo "add success";
else
    echo "add fail";
?>
