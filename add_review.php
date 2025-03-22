<?php 
session_start();
	if(!isset($_SESSION["UID"]))
	{
		echo "<script>window.open('login.php','_self')</script>";
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
				   <h2 class="page-header text-primary"> Add Review</h2>	
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
						$sql="INSERT INTO review(UID,MES,LOGS) VALUES ('{$_SESSION["UID"]}','{$_POST["review"]}',NOW())";
						if($con->query($sql))
						{
							echo "<div class='alert alert-success'>Insert Successfully....</div>";
						}
						else
						{
							echo "<div class='alert alert-danger'>Insert Failed....</div>";
						}
					}
				?>
			<form action="<?php echo $_SERVER["REQUEST_URI"]?>"  method="POST">
							 <div class="form-group">
								 <label class="text-primary"> Review : </label>
								 <textarea type="text" style="resize:none;" name="review"  required   class="form-control" placeholder="Review"></textarea>
							 </div>
							
							 <div class="form-group">
								<button type="submit" class="btn btn-success" id="submit" name="submit"> Save Details</button>
							</div>
				</form>	
			</div>
       </div>                         
</div>
<hr>
<?php require "footer.php"; ?>
</body>

</html>
