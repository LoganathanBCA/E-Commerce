<?php 
session_start();
	if(!isset($_SESSION["SKID"]))
	{
		echo "<script>window.open('index','_self')</script>";
	}
include("config.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
<?php 
	require "head.php";
?>
<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
<?php 
	include "topnav.php";
?>
<div class="container" style="margin-top:30px">                                    
        <div class="row">
			<div class="col-md-12">	
				   <h2 class="page-header text-info">  Admin Change Password</h2>	
			</div>
	  
			<div class="col-md-3">
				<?php
					include "shop_sidenav.php";
				?>
			</div>
			<div class="col-md-offset-1 col-md-6">
				 <?php 
								if(isset($_POST["submit"]))
								{
									 $sql="select * from shop_keeper where SKPASS='{$_POST["opass"]}' and SKID='{$_SESSION["SKID"]}'";
									 $result=$con->query($sql);
									 if($result->num_rows>0)
										{
											if($_POST["npass"]==$_POST["cpass"])
											{
												 $sql="UPDATE shop_keeper SET  SKPASS='{$_POST["npass"]}' where  SKID='{$_SESSION["SKID"]}'";
												$con->query($sql);
												echo"<div class='alert alert-success'>password Changed</div>";
											}
												else
												{
													echo"<div class='alert alert-danger'>password Mismatch</div>";
												}
										}
									else
									{
										echo"<div class='alert alert-danger'>Invalid password</div>";
									}
								} 
							 ?>
						 <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
							 <div class="form-group">
								 <label class="text-primary"> Old Password : </label>
								 <input type="password"  name="opass"  required  class="form-control">
							 </div>
							<div class="form-group">
								 <label class="text-primary"> New Password : </label>
								 <input type="password"  name="npass"  required class="form-control">
							 </div>
							 <div class="form-group">
								 <label class="text-primary"> Confirm  Password : </label>
								 <input type="password"  name="cpass"  required class="form-control">
							 </div>                                    
							<button type="submit" class="btn btn-success" id="submit" name="submit"> Save Password</button>
							 <input type="reset" name="clear" class="btn btn-danger" value="Cancel">
						 </form>
			</div>
       </div>

                               
</div>
<hr>
<?php require "footer.php"; ?>
</body>

</html>
