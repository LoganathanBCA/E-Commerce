<?php
include "config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php 
	require "head.php";
?>

</head>
<body>
<?php 
	include "topnav.php";
?>

 

<div class="container" style="margin-top:30px">

<div class="row">
<h1 class="page-header">Welcome To Product Review Monitoring</h1>
<div class="col-md-4 col-md-offset-4 ">
    <div class="panel panel-default shadow-depth-4">
  <div class="login panel-heading"><h3 class="panel-title"><strong>Admin Login</strong></h3>
      
  </div>
  
  <div class="panel-body">
  	<?php
				if(isset($_POST["submit"]))
				{
					$sql="SELECT * FROM admin_log WHERE ANAME='{$_POST["username"]}' AND APASS='{$_POST["password"]}'";
					$res=$con->query($sql);
					$admin=mysqli_fetch_array($res);
					if($admin)
					{
						if(!empty($_POST["rem"]))
						{
							setcookie("username",$_POST["username"],time()+(10*365*24*60*60));
							setcookie("password",$_POST["password"],time()+(10*365*24*60*60));
						}
						else
						{
							if(isset($_COOKIE["username"]))
							{
								setcookie("username","");
							}
							if(isset($_COOKIE["password"]))
							{
								setcookie("password","");
							}
						}
						
						$_SESSION["AID"]=$admin[0];
						$_SESSION["ANAME"]=$admin[1];
						echo "<script>window.open('admin_home.php','_self')</script>";
					}
					else
					{
						echo '
							<div class="alert alert-danger fade in">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Danger!</strong> Invalid User Name OR Password.
							</div>
			
							';
					}
					
				}
				?>
   <form role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
   <!--<div class="alert alert-danger">
                <a class="close" data-dismiss="alert" href="#">×</a>Incorrect Username or Password!
            </div>-->
						<div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" value="<?php if(isset($_COOKIE["username"])){echo $_COOKIE["username"];}?>" class="form-control" name="username" placeholder="username">                                        
                                    </div>
                                
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" value="<?php if(isset($_COOKIE["password"])){echo $_COOKIE["password"];}?>"  class="form-control" name="password" placeholder="password">
                                    </div>
                                    
                                    <div class="input-group">
                                      <div class="checkbox" style="margin-top: 0px;">
                                        <label>
                                          <input type="checkbox" name="rem" <?php if(isset($_COOKIE["username"])){echo "checked";}?>>Remember Me
                                        </label>
                                      </div>
                                    </div>
    <button type="submit" class="btn btn-success" name="submit">Sign in</button>
    <hr style="margin-top:10px;margin-bottom:10px;" >  

</form>
  </div>
</div>
</div>


</div>
</div>
		
        <hr>
    

	 <?php
		require "footer.php";
	 ?>

  

</body>

</html>
