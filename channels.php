<?php

session_start();

include_once(__DIR__."/database/tb_user.php");


//<h5><a href=\"  \" class=\"title\"> Subscribe  </a></h5>
function generate_slider($user_id, $user_name, $avatar)
{
    $config = parse_ini_file(__DIR__.'/config.ini');
    
    $image_src = $config['media_dir_rp'].$user_id.'/avatar/'.$avatar;
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
            <div class=\"file\">
                <a href=\" \"  >Suscribe</a>
            </div>
			    <ul>
				    <li><p class=\"author author-info\"><a href=\"#\" > %s </a></p></li>
				    <li class=\"right-list\"><p class=\"views views-info\">100 </p></li>
				</ul>
			</div>
		</div>
                    
        ", 
        $href, $image_src, $user_name 
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
    if($user_infos)
    {
        foreach($user_infos as $user_info)
        {
            generate_slider(
                $user_info['user_id'],
                $user_info['user_name'],
                $user_info['avatar']
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
