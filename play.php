<html>
<?php
session_start();

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
								<a href=\"single.html\" class=\"title\"> funny2.mp4 </a>
								<p class=\"author\"><a href=\"#\" class=\"author\">wang2</a></p>
								<p class=\"views\">2 views</p>
							</div>
							<div class=\"clearfix\"> </div>
						</div>
        ");

    echo $html;
}


$config = parse_ini_file(__DIR__.'/config.ini');

$media_id = $_GET['media_id'];
$media = get_media_by_id($media_id);
$user_id = $media['user_id'];
$media_name = $media['media_name'];
$media_description = $media['description'];
$viewed_times = $media['viewed_times']; 
$dislike_times = $media['dislike_times']; 
$like_times = $media['like_times']; 
$upload_time = $media['upload_time']; 
$source_url = $config['media_dir_rp'].$user_id . '/' . $media_name;
$comments = get_comments($media_id);
$comments_count = count($comments);

if (strpos($source_url, 'png') !== false) 
{
    $media_show = '<img src="' . $source_url . '">'; 
}
else
{
    $media_show = '<video controls><source src="' . $source_url . '" type="video/mp4"></video>';
}

increase_viewed($media_id);

function show_comments($comments)
{
    if($comments)
    {
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
    }
}

?>
<script>

$(document).ready(function () {    
    $('#add_comment').submit(function(e){
        e.preventDefault();
        alert("dddd");
        var data = {
            type    : "comment",
            media_id : $("#media_id").attr("value"), 
            content: $("#comment_content").val()
        
        };

        $.ajax(
            {
                url: 'handle.php',
                type:'POST',
                data: data,

                success: function(data)
                {
                    if(data.status == "error")
                    {
                        alert("please login");
                    }
                    else
                    {
                        $('#show_comment').html(data.msg); 
                    }
                    //var dislike = parseInt($('#media_dislike').text());
                },

                    error: function(){
                        alert('vote failed');
                    }
            });
        return false;
    });

    $('#media_dislike').click(function(event){
        var data = {
            type    : "dislike",
            media_id : $("#media_id").attr("value") 
        
        };

        $.ajax(
            {
                url: 'handle.php',
                type:'POST',
                data: data,

                success: function(data)
                {
                    if(data.status == "error")
                    {
                        alert("please login");
                    }
                    else
                    {
                        $('#media_dislike').text(data.msg); 
                    }
                    //var dislike = parseInt($('#media_dislike').text());
                },

                    error: function(){
                        alert('vote failed');
                    }
            });
    });
    $('#media_like').click(function(event){
        var data = {
            type    : "like",
            media_id : $("#media_id").attr("value") 
        
        };

        $.ajax(
            {
                url: 'handle.php',
                type:'POST',
                data: data,

                success: function(data)
                {
                    if(data.status == "error")
                    {
                        alert("please login");
                    }
                    else
                    {
                        $('#media_like').text(data.msg); 
                    }
                },

                error: function(){
                        alert('vote failed');
                    }
            });
    });
});



});


</script>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="show-top-grids">
				<div class="col-sm-8 single-left">
					<div class="song">
						<div class="song-info">
                        <h3 id='media_id' value='<?php echo $media_id ?>'><?php echo $media_name; ?></h3>	
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
                                <li><a id="media_dislike" href="#" class="icon whatsapp-icon"><?php echo $dislike_times; ?></a></li>
								<li><a id="media_like" href="#" class="icon "><?php echo $like_times; ?></a></li>
								<li><a href="#" class="icon comment-icon">Comments</a></li>
                                <li class="view"><?php echo $viewed_times+1 ?> Views</li>
							</ul>
						</div>
					</div>
					<div class="clearfix"> </div>
					<div class="published">
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
                                    <h4>Published on <?php echo $upload_time ?></h4>
                                        <p> <?php echo $media_description; ?></p>
									</li>

								</ul>
							</div>
					</div>

					<div class="all-comments">
						<div class="all-comments-info">
                        <a href="#">All Comments (<?php echo $comments_count  ?>)</a>
							<div class="box">
								<form  id="add_comment">
									<textarea id="comment_content" placeholder="Message" required=" "></textarea>
									<input type="submit" class="submit" value="SEND" />
									<div class="clearfix"> </div>
								</form>
							</div>
						</div>
						<div class="media-grids" id="show_comment">
                        <?php show_comments($comments); ?>
						</div>
					</div>
				</div>


				<div class="col-md-4 single-right">
					<h3>Up Next</h3>
        		    <div class="single-grid-right">
                    <?php generate_up_next(); ?>
			    </div>
			</div>
		<div class="clearfix"> </div>
	</div>
		</div>
		<div class="clearfix"> </div>
</html>
