<?php

include_once("db_conn.php");

function add_media($infos)
{
    if(count($infos) != 6)
    {
        return -1;
    }

    $sql = "insert into media (media_id, media_name, upload_time, size, category, user_name) values $infos[media_id], $infos[media_name], $infos[upload_time], $infos[size], $infos[category],$infos[username]"
    if(db_query($sql))
    {
        return 0;
    }
    else
    {
        return -1;
    }

}

?>
