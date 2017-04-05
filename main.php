<?php
function generate_slider()
{
    echo'
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="images/r1.jpg" alt="" /></a>
								<div class="time small-time">
									<p>2:34</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Varius sit sed viverra viverra nullam nullam interdum metus</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
									<li class="right-list"><p class="views views-info">2,114,200 views</p></li>
								</ul>
							</div>
						</div>
        ';
}
?>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="main-grids">
	    <div class="top-grids">
	        <div class="recommended-info">
	            <h3>Recent</h3>
            </div>
<?php

$medias = get_recent_media();

generate_slider();
generate_slider();
generate_slider();
generate_slider();
?>

			<div class="clearfix"> </div>
		</div>

		<div class="recommended">
		    <div class="recommended-grids">
			    <div class="recommended-info">
			        <h3>Recommended</h3>
				</div>
<?php
generate_slider();
generate_slider();
generate_slider();
generate_slider();
?>
		


					<div class="clearfix"> </div>
			</div>
			<div class="recommended-grids">
	
<?php
generate_slider();
generate_slider();
generate_slider();
generate_slider();
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
generate_slider();
generate_slider();
generate_slider();
generate_slider();
?>

				<div class="clearfix"> </div>
			</div>
			<div class="recommended-grids">
	
<?php
generate_slider();
generate_slider();
generate_slider();
generate_slider();
?>
		        <div class="clearfix"> </div>
			</div>
		</div>
	</div>

			<!-- footer -->
<?php
    include("./footer.php");
?>

			<!-- //footer -->
</div>
