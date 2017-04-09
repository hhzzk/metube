<?php
include_once("./database/tb_user.php");

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $user_name = $_POST['user_name']; 
    $password0 = $_POST['password0']; 
    
    // create accout handling
    if(isset($_POST['signup']))
    {
        $email= $_POST['email']; 
        $password1 = $_POST['password1']; 
        $infos = [ 
            "user_name" => $user_name,
            "password"  => $password0,
            "email"     => $email
        ];

        if($user_id=add_user($infos))
        {
            $_SESSION['user_name'] = $user_name;
            $_SESSION["user_id"] = $user_id;
        }
        else
        {
           echo "add user failed"; 
        }
    }
    // sign in handling
    else
    {
       if($info = get_user_info($user_name))  
       {
            if($info['password'] == $password0) 
            {
                $_SESSION['user_name'] = $info['user_name'];
                $_SESSION["user_id"] = $info["user_id"];
            }
            else
            {
                echo "password error";
            }
       }
       else
       {
        echo "user name error";
       }
    }
}

if (isset($_SESSION['user_id']))
{
    $login_statue=true;
}
else
{
    $login_statue=false;
}



?>


<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"><h1><img src="images/logo.png" alt="" /></h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<div class="top-search">
				<form class="navbar-form navbar-right">
					<input type="text" class="form-control" placeholder="Search...">
					<input type="submit" value=" ">
				</form>
			</div>

			<div class="header-top-right" <?php if ($login_statue===true){?>style="display:none"<? } ?> >
				<div class="file">
				<!--	<a href="upload.html">Upload</a>-->
				</div>	
				<div class="signin" >
                <a href="#small-dialog3" class="play-icon popup-with-zoom-anim"  >Sign Up</a>
					<!-- pop-up-box -->
									<script type="text/javascript" src="js/modernizr.custom.min.js"></script>    
									<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
									<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
									<!--//pop-up-box -->

									<div id="small-dialog3" class="mfp-hide">
										<h3>Create Account</h3> 
										<div class="social-sits">
											<div class="button-bottom">
												<p>Already have an account? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Login</a></p>
											</div>
										</div>
										<div class="signup">
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
												<input type="text" name="user_name" class="email" placeholder="User Name" required="required" maxlength="10" title="Enter a valid user name" />
												<input type="text" name="email" class="email" placeholder="Email" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Enter a valid email"/>
												<input type="password" name="password0" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
												<input type="password" name="password1" placeholder="Password Again" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
												<input name="signup" type="submit"  value="Sign Up"/>
											</form>
										</div>
										<div class="clearfix"> </div>
									</div>	

									<script>
											$(document).ready(function() {
											$('.popup-with-zoom-anim').magnificPopup({
												type: 'inline',
												fixedContentPos: false,
												fixedBgPos: true,
												overflowY: 'auto',
												closeBtnInside: true,
												preloader: false,
												midClick: true,
												removalDelay: 300,
												mainClass: 'my-mfp-zoom-in'
											});
																											
											});
									</script>	
				</div>

				<div class="signin">
					<a href="#small-dialog" class="play-icon popup-with-zoom-anim" id="signin11">Sign In</a>
					<div id="small-dialog" class="mfp-hide">
						<h3>Login</h3>
						<div class="social-sits">
							<div class="button-bottom">
								<p>New account? <a href="#small-dialog3" class="play-icon popup-with-zoom-anim">Signup</a></p>
							</div>
						</div>
						<div class="signup">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
								<input type="text" name="user_name" class="email" placeholder="Enter email / user name" required="required" />
								<input type="password" name="password0" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
								<input name="login" type="submit"  value="LOGIN"/>
							</form>
							<div class="forgot">
								<a href="#">Forgot password ?</a>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="header-top-right1"  <?php if ($login_statue===false){?>style="display:none"<? } ?> >

				<div class="file">
                <a href="upload.php" >Upload</a>
				</div>

				<div class="signin">
                <a href="user.php" class="play-icon" ><?php echo $_SESSION['user_name']; ?></a>
				</div>	

				<div class="signin">
                <a href="logout.php" class="play-icon " id="signin11">Logout</a>
				</div>


				<div class="clearfix"> </div>
			</div>



        </div>
		<div class="clearfix"> </div>
      </div>
    </nav>
