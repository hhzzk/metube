<?php
function generate_slider($playlist_id, $playlist_name)
{
    $config = parse_ini_file(__DIR__.'/../config.ini');
    
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
        $href, $image_src, $playlist_name 
    );

    echo $html;
}
?>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="main-grids">
	    <div class="top-grids">
	        <div class="recommended-info">
	            <h3>Create</h3>
            </div>
<?php


include(__DIR__."/../database/tb_playlist.php");
$user_id=1;
$playlists = get_playlists($user_id);

// Each row has four items
$count = 4;
foreach($playlists as $playlist)
{
    generate_slider(
        $playlist['playlist_id'],
        $playlist['playlist_name']
    
    );
    if(!(--$count))
    {
        echo "<br><br>";
        $count = 4;
    }
}

?>
		</div>

		</div>
	</div>

			<!-- footer -->
<?php
    include("./footer.php");
?>

			<!-- //footer -->
</div>
