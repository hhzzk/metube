<?php
session_start();
$user_id = $_SESSION["user_id"];

function generate_slider($playlist)
{
    $html = sprintf("
        <div class=\"container\">
            <table class=\"table\">
                <thead>
                    <tr>
                        <th>Rule</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                </tr>
            </tbody>
            </table>
        </div>"
    );
}
echo $html;
?>


<div class="col-md-offset-2 main">
    <div class="main-grids">
	        <div class="recommended-info">
					<a href="#small-dialog5" class="play-icon popup-with-zoom-anim btn btn-primary" id="create_playlist">Create Playlist</a>
					<a href="#small-dialog6" class="play-icon popup-with-zoom-anim btn btn-danger" id="delete_playlist">Delete Playlist</a>
                <div class="signin">
					<div id="small-dialog5" class="mfp-hide">
						<h3>Create Playlist</h3>
                            <div class="container">
                                <form method="post" action="user.php?main=playlist" >
                                    <div class="form-group row col-sm-4">
								        <input class="form-control" type="text" name="create_playlist_name" placeholder="Enter Playlist Name" required="required">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-primary"> SUBMIT</button>
                                        </div>
                                    </div>
							    </form>
                            </div>
					</div>
                    <div id="small-dialog6" class="mfp-hide">
						<h3>Delete Playlist</h3>
                            <div class="container">
                                <form method="post" action="user.php?main=playlist" >
                                    <div class="form-group row col-sm-4">
								        <input class="form-control" type="text" name="delete_playlist_name" placeholder="Enter Playlist Name" required="required">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-primary"> SUBMIT</button>
                                        </div>
                                    </div>
							    </form>
                            </div>
					</div>
				</div>
<hr>
<?php

include(__DIR__."/../database/tb_playlist.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    if(isset($_POST['create_playlist_name']))
    {
        $infos = [
            'playlist_name' => $_POST['create_playlist_name'], 
            'user_id' => $user_id
        ];

        add_playlist($infos);
    }
    elseif(isset($_POST['delete_playlist_name']))
    {
         $infos = [
            'playlist_name' => $_POST['delete_playlist_name'], 
            'user_id' => $user_id
        ];

        del_playlist($infos);   
    }


}

$playlists = get_playlists($user_id);

if($playlists)
{
    foreach($playlists as $playlist)
    {
        generate_slider($playlist);

        echo "<br><hr>";
    }
}
?>
		</div>
		</div>
	</div>
