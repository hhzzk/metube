<?php
include_once("./common.php");

function medias_layout()
{
    $order="viewed_times";
    if(isset($_GET['search_text']))
    {
        $search_text = $_GET['search_text']; 
        show_slides('search', $search_text);
    }
    elseif(isset($_GET['size']))

}

?>

<div class="col-md-offset-2 main">
    <div class="main-grids">
	    <div class="top-grids">
	        <div class="recommended-info">
                <div class="container" >
                    <form class="form-inline" method='GET' action='index.php'>
                        <input type="hidden" name="main" value="search">
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="size" name='size'>
                            <option selected disabled value="">Size</option>
                            <option value="lessthan1m">Less than 1M </option>
                            <option value="greatethan1m">Greater than 1M</option>
                        </select>
                        <select class="form=control mb-2 mr-sm-2 mb-sm-0" id="upload_time" name='upload_time'>
                            <option selected disabled value="">Size</option>
                            <option value="today">Today </option>
                            <option value="week">This week</option>
                            <option value="month">This month</option>
                        </select>                       
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="author" placeholder="Author">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
                <hr>
                <?php medias_layout() ?>
		    </div>
		</div>
	</div>
</div>
