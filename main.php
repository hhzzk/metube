<?php
include_once("./database/tb_user.php");
include_once("./common.php");

?>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="main-grids">
	    <div class="top-grids">
	        <div class="recommended-info">
	            <h3>Recent</h3>
            </div>
<?php

include(__DIR__."/database/tb_media.php");

$medias = get_recent_media();

foreach($medias as $media)
{
    generate_slider(
        $media['media_id'],
        $media['user_id'],
        $media['media_name'],
        $media['size'],
        $media['viewed_times']
    
    );
}

?>

			<div class="clearfix"> </div>
		</div>

		<div class="recommended">
		    <div class="recommended-grids">
			    <div class="recommended-info">
			        <h3>Recommended</h3>
				</div>
<?php

$medias = get_recent_media();

foreach($medias as $media)
{
    generate_slider(
        $media['media_id'],
        $media['user_id'],
        $media['media_name'],
        $media['duration'],
        $media['viewed_times']
    
    );
}
?>

					<div class="clearfix"> </div>
			</div>
			<div class="recommended-grids">
	
<?php

$medias = get_recent_media();

foreach($medias as $media)
{
    generate_slider(
        $media['media_id'],
        $media['user_id'],
        $media['media_name'],
        $media['duration'],
        $media['viewed_times']
    
    );
}
?>
				<div class="clearfix"> </div>
			</div>
		</div>

		<div class="recommended">
		    <div class="recommended-grids">
			    <div class="recommended-info">
				    <h3>Popular</h3>
				</div>
<?php

$medias = get_recent_media();

foreach($medias as $media)
{
    generate_slider(
        $media['media_id'],
        $media['user_id'],
        $media['media_name'],
        $media['duration'],
        $media['viewed_times']
    
    );
}
?>

				<div class="clearfix"> </div>
			</div>
			<div class="recommended-grids">
	
<?php

$medias = get_recent_media();

foreach($medias as $media)
{
    generate_slider(
        $media['media_id'],
        $media['user_id'],
        $media['media_name'],
        $media['duration'],
        $media['viewed_times']
    
    );
}

?>
		        <div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
