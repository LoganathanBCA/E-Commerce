<?php 
session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo "<script>window.open('alogin.php','_self')</script>";
	}
include("config.php");

if(isset($_GET['id']))
		{
			$sql="SELECT * FROM pro_category WHERE CID='{$_GET['id']}'";
			$res=$con->query($sql);
			$rec=$res->fetch_assoc();
		}

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
				   <h2 class="page-header"><i class="fa fa-edit"></i> Update  Category</h2>	
			</div>
	  
			<div class="col-md-3">
				<?php
					include "admin_sidnav.php";
				?>
			</div>
			<div class="col-md-offset-1 col-md-3">
			
				<form action="<?php echo $_SERVER["REQUEST_URI"]?>" method="POST">
							 <div class="form-group">
								 <label> Category Name : </label>
								 <input type="text"  name="cname"  required  class="form-control" value="<?php echo $rec["CNAME"];?>">
							 </div>
							 <input type="hidden" name="cid" value="<?php echo $rec["CID"];?>">
							<button type="submit" class="btn btn-success" id="submit" name="submit"> Update Category</button>						
				</form>	
				<?php
					if(isset($_POST["submit"]))
					{
						$sql="UPDATE pro_category SET CNAME='{$_POST["cname"]}' WHERE CID='{$_POST["cid"]}'";
						$con->query($sql);
						echo "<script>window.open('admin_add_category.php?mes=category Updated.','_self')</script>";
					
					}
				
				?>
			</div>
		
       </div>

                               
</div>
<hr>
<?php require "footer.php"; ?>
</body>

</html>
