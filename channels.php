<?php

include_once(__DIR__."/database/tb_user.php");


function generate_slider($channel_id, $channel_name)
{
    $config = parse_ini_file(__DIR__.'/config.ini');
    
    $image_src = $config['media_dir_rp'].'playlists.png';
    $href = '1';
    //$href = $config['media_dir_rp'].$user_id . '/' . $media_id;
    $html = sprintf("
	    <div class=\"col-md-3 resent-grid recommended-grid\">
	        <div class=\"resent-grid-img recommended-grid-img\">
	            <a href=\" %s \"><img src=\" %s \" alt=\"\" /></a>
			    <div class=\"time small-time\">
			    </div>
			    <div class=\"clck small-clck\">
			        <span class=\"glyphicon glyphicon-time\" aria-hidden=\"true\"></span>
			    </div>
		    </div>
		    <div class=\"resent-grid-info recommended-grid-info video-info-grid\">
			    <h5><a href=\"  \" class=\"title\">   </a></h5>
			    <ul>
				    <li><p class=\"author author-info\"><a href=\"#\" class=\"author\"> %s </a></p></li>
				    <li class=\"right-list\"><p class=\"views views-info\"> </p></li>
				</ul>
			</div>
		</div>
                    
        ", 
        $href, $image_src, $channel_name 
    );

    echo $html;
}

function channels_layout()
{
    // When user_id equals 0
    // get_user_info return all user info
    $user_id=0;
    $user_infos = get_user_info($user_id);

    // Each row has four items
    $count = 4;
    if(user_infos)
    {
        foreach($user_infos as $user_info)
        {
            generate_slider(
                $user_info['user_id'],
                $user_info['user_name']
            );
            if(!(--$count))
            {
                echo "<br><br>";
                $count = 4;
            }
        }
    }
}

?>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="main-grids">
	    <div class="top-grids">
	        <div class="recommended-info">
	            <h3>Create</h3>
            </div>
            <?php channels_layout() ?>
		</div>
		</div>
	</div>
</div>
