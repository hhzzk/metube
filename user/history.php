<?php
session_start();
if(isset($_SESSION['user_id']))
{
    $user_id = $_SESSION['user_id']; 
}

include_once(__DIR__."/../database/tb_media.php");
include_once("./common.php");

function show_history()
{
    if(isset($_SESSION['user_id']))
    {
        $user_id = $_SESSION['user_id']; 
        $medias = get_history($user_id);

        // Each row has four items
        $count = 4;
        if($medias)
        {
            foreach($medias as $media)
            {
                generate_slider(
                    $media['media_id'],
                    $media['user_id'],
                    $media['media_name'],
                    $media['size'],
                    $media['viewed_times']
                );
                if(!(--$count))
                {
                    echo "<hr><br>";
                    $count = 4;
                }
            }
        }
    }
}

?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="main-grids">
	    <div class="top-grids">
	        <div class="recommended-info">
	            <h3>History</h3>
                <hr>
            </div>
            <?php show_history(); ?>
		</div>
	</div>
</div>
