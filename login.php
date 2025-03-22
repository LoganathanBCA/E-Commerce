<?php
include "config.php";
session_start();
if(isset($_SESSION["UID"]))
{
	echo "<script>window.open('user_home.php','_self')</script>";
}
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
<!-- <div class="jumbotron signBanner"></div>-->
<div class="col-md-12 ">
	<h1 class="page-header"><?php if(isset($_GET["mes"])){echo $_GET["mes"];}else{ echo"Get Into Our Gramy World";	}?></h1>
</div>
<div class="col-md-4 col-md-offset-4 ">
    <div class="panel panel-default shadow-depth-4">
  <div class="login panel-heading"><h3 class="panel-title"><strong>Sign in </strong></h3>
      <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
  </div>
  
  <div class="panel-body">
	<?php
	if(isset($_GET["err"]))
	{
						echo '
							<div class="alert alert-danger fade in">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Warning!</strong> '.$_GET["err"].'.
							</div>
			
							';
	}
		if(isset($_POST["submit"]))
				{
					 $sql="SELECT UID,UNAME FROM user_reg WHERE (UPHONE='{$_POST["name"]}' AND UPASS='{$_POST["pass"]}') OR (UMAIL='{$_POST["name"]}' AND UPASS='{$_POST["pass"]}')";
					$res=$con->query($sql);
					
					if($res->num_rows>0)
					{
						$row=$res->fetch_assoc();
						if(!empty($_POST["rem"]))
						{
							setcookie("name",$_POST["name"],time()+(10*365*24*60*60));
							setcookie("pass",$_POST["pass"],time()+(10*365*24*60*60));
						}
						else
						{
							if(isset($_COOKIE["name"]))
							{
								setcookie("name","");
							}
							if(isset($_COOKIE["pass"]))
							{
								setcookie("pass","");
							}
						}
						
						$_SESSION["UID"]=$row["UID"];
						$_SESSION["UNAME"]=$row["UNAME"];
						if(isset($_SESSION["page"]))
						{
							echo "<script>window.open('{$_SESSION["page"]}','_self')</script>";
						}
						else
						{
						
							echo "<script>window.open('user_home.php','_self')</script>";
						}
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
   <form role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
   <!--<div class="alert alert-danger">
                <a class="close" data-dismiss="alert" href="#">×</a>Incorrect Username or Password!
            </div>-->
  <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" value="<?php if(isset($_COOKIE["name"])){echo $_COOKIE["name"];}?>" class="form-control" name="name" placeholder="Email Or Phone">                                        
                                    </div>
                                
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" value="<?php if(isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>"   class="form-control" name="pass" placeholder="Password">
                                    </div>
                                    
                                    <div class="input-group">
                                      <div class="checkbox" style="margin-top: 0px;">
                                        <label>
                                           <input type="checkbox" name="rem" <?php if(isset($_COOKIE["name"])){echo "checked";}?>>Remember Me
                                        </label>
                                      </div>
                                    </div>
                                    
  <button type="submit" name="submit" class="btn btn-success">Sign in</button>
  
  <hr style="margin-top:10px;margin-bottom:10px;" >
  
  <div class="form-group">
                                    
                                        <div style="font-size:85%">
                                            Don't have an account! 
                                        <a href="user_reg.php">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    
                                </div> 
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


