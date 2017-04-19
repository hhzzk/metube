<html>

<?php

include ("./templates/header.php");
include ("./templates/navbar.php");
include ("./templates/sidebar.php");
include("./database/tb_comment.php");
include("./database/tb_user.php");
include("./database/tb_media.php");

function generate_comment($user_name, $avatar, $content)
{
    $html = sprintf("
				<div class=\"media\">
				    <h5> %s </h5>
					<div class=\"media-left\">
						<a href=\"#\"></a>
				    </div>
					<div class=\"media-body\">
					    <p>wwwwwwwwwww %s </p>
				    </div>
				</div>
            ", $user_name, $content
        );

    echo $html;
}

function generate_up_next()
{
    $html = sprintf("
						<div class=\"single-right-grids\">
							<div class=\"col-md-4 single-right-grid-left\">
								<a href=\"single.html\"><img src=\"images/r1.jpg\" alt=\"\" /></a>
							</div>
							<div class=\"col-md-8 single-right-grid-right\">
								<a href=\"single.html\" class=\"title\"> Nullam interdum metus</a>
								<p class=\"author\"><a href=\"#\" class=\"author\">John Maniya</a></p>
								<p class=\"views\">2,114,200 views</p>
							</div>
							<div class=\"clearfix\"> </div>
						</div>
        ");

    echo $html;
}


$config = parse_ini_file(__DIR__.'/config.ini');

$media_id = $_GET['media_id'];
$user_id = $_GET['user_id'];
$media = get_media_by_id($media_id);
$media_name = $media['media_name'];
$media_description = $media['media_description'];
$viewed_times = $media['viewed_times']; 
$source_url = $config['media_dir_rp'].$user_id . '/' . $media_name;

if (strpos($source_url, 'png') !== false) 
{
    $media_show = '<img src="' . $source_url . '">'; 
}
else
{
    $media_show = '<video controls><source src="' . $source_url . '" type="video/mp4"></video>';
}

$comments = get_comments($media_id);
$comments_count = count(comments);

?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="show-top-grids">
				<div class="col-sm-8 single-left">
					<div class="song">
						<div class="song-info">
                        <h3><?php echo $media_name; ?></h3>	
					</div>
						<div class="video-grid">
                            <?php echo $media_show ?>
						</div>
					</div>
					<div class="song-grid-right">
						<div class="share">
							<h5>Share this</h5>
							<ul>
								<li><a href="#" class="icon fb-icon">Facebook</a></li>
								<li><a href="#" class="icon dribbble-icon">Dribbble</a></li>
								<li><a href="#" class="icon twitter-icon">Discussion</a></li>
								<li><a href="#" class="icon pinterest-icon">Download</a></li>
								<li><a href="#" class="icon whatsapp-icon">1 Dislike</a></li>
								<li><a href="#" class="icon ">3 Like</a></li>
								<li><a href="#" class="icon comment-icon">Comments</a></li>
                                <li class="view"><?php echo $viewed_times ?> Views</li>
							</ul>
						</div>
					</div>
					<div class="clearfix"> </div>
					<div class="published">
						<script src="jquery.min.js"></script>
							<script>
								$(document).ready(function () {
									size_li = $("#myList li").size();
									x=1;
									$('#myList li:lt('+x+')').show();
									$('#loadMore').click(function () {
										x= (x+1 <= size_li) ? x+1 : size_li;
										$('#myList li:lt('+x+')').show();
									});
									$('#showLess').click(function () {
										x=(x-1<0) ? 1 : x-1;
										$('#myList li').not(':lt('+x+')').hide();
									});
								});
							</script>
							<div class="load_more">	
								<ul id="myList">
									<li>
										<h4>Published on 15 June 2015</h4>
                                        <p> <?php echo $media_description; ?></p>
									</li>

								</ul>
							</div>
					</div>

					<div class="all-comments">
						<div class="all-comments-info">
                        <a href="#">All Comments (<?php echo $comments_count  ?>)</a>
							<div class="box">
								<form>
									<textarea placeholder="Message" required=" "></textarea>
									<input type="submit" value="SEND">
									<div class="clearfix"> </div>
								</form>
							</div>
						</div>
						<div class="media-grids">
<?php


foreach($comments as $comment)
{
    $user_id = $comment['user_id'];
    $content = $comment['content'];

    $user_info = get_user_info($user_id);
    if(!$user_info)
    {
        continue;
    }

    generate_comment(
        $user_info['user_name'], 
        $user_info['avatar'],
        $comment['content']);
}



?>

						</div>
					</div>
				</div>


				<div class="col-md-4 single-right">
					<h3>Up Next</h3>
        					<div class="single-grid-right">
<?php
generate_up_next();
?>

					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
<?php
include("./templates/footer.php");
?>

		</div>
		<div class="clearfix"> </div>

</html>
