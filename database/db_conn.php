<?php

function db_connect() 
{
    static $conn;

    if($conn)
    {
        return $conn;
    }

    $config = parse_ini_file(dirname(__FILE__).'/../config.ini');

    $conn = mysqli_connect(
            $config['servername'],
            $config['username'], 
            $config['password'],
            $config['database']
    );

    if (!$conn)
    {
        die ("Connection failed:" . mysqli_connect_error());
    }

    return $conn;

}

function db_query($query)
{
    $conn = db_connect();

    $result = mysqli_query($conn, $query);

    return $result;
}

function db_select($query)
{
    $rows = array();
    $result = db_query($query);

    if($result === false) 
    {
        return false;
    }

    while ($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }

    return $rows;
}

?>
