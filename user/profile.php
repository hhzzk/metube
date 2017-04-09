<?php
include_once("./database/tb_user.php");

session_start();

if(isset($_SESSION['user_name']))
{
    $info = get_user_info($_SESSION['user_name']);
}
else
{
    echo "error";
}

$update_infos = array();
/*
if(isset($_POST['user_id']))
{
    $user_id = $_POST['user_id']); 
}
if(isset($_POST['email']))
{
    $update_infos['email'] = $_POST['email']); 
}
if(isset($_POST['phone']))
{
    $update_infos['phone'] = $_POST['phone']); 
}
if(isset($_POST['password0']))
{
    $update_infos['password0'] = $_POST['password0']); 
}

if(update_user($user_id, $update_infos))
{
    echo "update success";
}
else
{
    echo "update fail";
}
 */
?>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="main-grids">
	    <div class="top-grids">
	        <div class="recommended-info">
	            <h3>Profile</h3>
            </div>

<form class="form-horizontal" method="POST" action="user.php?main=profile">
  <div class="form-group">
  <label class="control-label col-sm-2" for="user_id">User ID</label>
    <div class="col-sm-6">
      <input type="email" class="form-control" id="user_id" placeholder="<?php echo $info['user_id']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="user_name">User Name:</label>
    <div class="col-sm-6">
      <input type="email" class="form-control" id="user_name" placeholder="<?php echo $info['user_name']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-6">
      <input type="email" class="form-control" id="email" placeholder="<?php echo $info['email']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="phone">Phone:</label>
    <div class="col-sm-6">
      <input type="email" class="form-control" id="phone" placeholder="<?php echo $info['phone']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-6"> 
      <input type="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd1">Password:</label>
    <div class="col-sm-6"> 
      <input type="password" class="form-control" id="pwd1" placeholder="Enter password again">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-6">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>


		</div>

		</div>
	</div>

			<!-- footer -->
<?php
    include("./footer.php");
?>

			<!-- //footer -->
</div>
