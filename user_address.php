<?php 
session_start();
	if(!isset($_SESSION["UID"]))
	{
		echo "<script>window.open('login','_self')</script>";
	}
include("config.php");
	

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
        <div class="row" >
			<div class="col-md-12">
				   <h2 class="page-header text-primary">Delivery Address</h2>	
			</div>
			<div class="col-md-3">
				<?php
					include "user_sidnav.php";
				?>
			</div>
			<div class="col-md-6">
				<?php
			

					if(isset($_POST["submit"]))
							{
									  $sql="UPDATE user_reg SET STR1='{$_POST["str1"]}',STR2='{$_POST["str2"]}',LAND='{$_POST["land"]}', APHONE='{$_POST["aphone"]}' WHERE UID='{$_SESSION["UID"]}'";
									if($con->query($sql))
									{
										echo '
							<div class="alert alert-success fade in">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Success!</strong> Delivery Address Updated
							</div>
			
							';
									}
									
							}
							
$sql="SELECT * FROM user_reg WHERE UID='{$_SESSION["UID"]}'";
$res=$con->query($sql);
if($res->num_rows>0)
{
	$rec=$res->fetch_assoc();
}

	
				?>
			<form action="<?php echo $_SERVER["REQUEST_URI"]?>"  method="POST">
							 <div class="form-group">
								 <label class="text-primary"> Street - 1 : </label>
								 <input type="text"  name="str1"  required value="<?php  if(isset($rec["STR1"])){ echo $rec["STR1"];}?>"  class="form-control" placeholder="street 1">
							 </div>
							 <div class="form-group">
								 <label class="text-primary"> Street - 2 : </label>
								 <input type="text"  name="str2"  required value="<?php  if(isset($rec["STR2"])){ echo $rec["STR2"];}?>"  class="form-control" placeholder="street 2">
							 </div>
							  <div class="form-group">
								 <label class="text-primary"> Land Mark : </label>
								 <input type="text"  name="land"  required value="<?php  if(isset($rec["LAND"])){ echo $rec["LAND"];}?>" class="form-control" placeholder="Land Mark">
							 </div>
							  <div class="form-group">
								 <label class="text-primary"> Alternate Number : </label>
								 <input type="text"  name="aphone" maxlength="10"  required value="<?php  if(isset($rec["APHONE"])){ echo $rec["APHONE"];}?>" class="form-control num" placeholder="Alternate Number">
							 </div>
							
							 <div class="form-group">
								<button type="submit" class="btn btn-success" id="submit" name="submit"> Update Details</button>
							</div>
				</form>	
				
				<?php
					//print_r($_SESSION);
				?>
		
		</div>
		</div>
</div>
			
<?php require "footer.php"; ?>


</body>

</html>
