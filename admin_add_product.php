<?php 
session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo "<script>window.open('alogin','_self')</script>";
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
				   <h2 class="page-header text-info"> Add Product</h2>	
			</div>
	  
			<div class="col-md-3">
				<?php
					include "admin_sidnav.php";
				?>
			</div>
			<div class="col-md-offset-1 col-md-8">
			<?php
				if(isset($_POST["submit"]))
				{
					$pname=$_POST["pname"];
					//$tname=$_POST["tname"];
					$cate=$_POST["cate"];
					//$subpro=$_POST["subpro"];
					$oprice=$_POST["oprice"];
					$nprice=$_POST["nprice"];
					$star=$_POST["star"];
					$review=$_POST["review"];
					$des=$_POST["des"];
					$des2=$_POST["des2"];
					$sql="INSERT INTO products(PNAME,CID,OPRICE,NPRICE,STARS,REVIEW,DES,DES2) 
					VALUES
					('{$pname}','{$cate}','{$oprice}','{$nprice}','{$star}','{$review}','{$des}','{$des2}')";
					if($con->query($sql))
						{
							echo"<div class='alert alert-success'>Product Added..</div>";
						}
						else
						{
							echo"<div class='alert alert-danger'>Product Added Failed..</div>";
						}
				}
			
			?>
			
				<form action="<?php echo $_SERVER["REQUEST_URI"]?>" method="POST">
							 <div class="form-group col-md-6">
								 <label class="text-primary"> Product  Name : </label>
								 <input type="text"  name="pname"  required  class="form-control" placeholder="Product  Name">
							 </div>
							 <div class="form-group col-md-6">
								 <label class="text-primary"> Category : </label>
									<select class="form-control" name="cate" required>
									<option value="-">select</option>
									<?php 
										$sql="SELECT * FROM pro_category";
										$res=$con->query($sql);
											if($res->num_rows>0)
												{
													while($row=$res->fetch_assoc())
													{
														echo "<option value='{$row["CID"]}'>{$row["CNAME"]}</option>";
													}
												}
									?>
									</select>
							 </div>
							 <!-- <div class="form-group col-md-6">
								 <label class="text-primary">Tamil Name : </label>
								 <input type="text"  name="tname"  required  class="form-control" placeholder="Product Tamil Name">
							 </div>
							 
							 
							  <div class="form-group col-md-6">
								 <label class="text-primary"> Sub Product For : </label>
									<select class="form-control" name="subpro" required>
									<option value="0">select</option>
									<?php 
										$sql="SELECT PID,PNAME FROM products";
										$res=$con->query($sql);
											if($res->num_rows>0)
												{
													while($row=$res->fetch_assoc())
													{
														echo "<option value='{$row["PID"]}'>{$row["PNAME"]}</option>";
													}
												}
									?>
									</select>
							 </div>-->
							  <div class="form-group col-md-6">
								 <label class="text-primary"> Old Price : </label>
								 <input type="text"  name="oprice"  required  class="form-control" placeholder="Old Price">
							 </div>
							  <div class="form-group col-md-6">
								 <label class="text-primary"> New Price : </label>
								 <input type="text"  name="nprice"  required  class="form-control" placeholder="New Price">
							 </div>
							 <div class="form-group col-md-6">
								 <label class="text-primary"> Stars : </label>
								 <input type="text"  name="star"  required  class="form-control" placeholder="Stars">
							 </div>
							 <div class="form-group col-md-6">
								 <label class="text-primary"> Reviews : </label>
								 <input type="text"  name="review"  required  class="form-control" placeholder="Reviews">
							 </div>
							 <div class="form-group col-md-6">
								 <label class="text-primary"> Description - 1 : </label>
								 <textarea type="text"  name="des" style="resize:none;" rows="5"  required  class="form-control" placeholder="Description Should be Here"></textarea>
							 </div>
							<div class="form-group col-md-6">
								 <label class="text-primary"> Description - 2 : </label>
								 <textarea type="text"  name="des2" style="resize:none;" rows="5"  required  class="form-control" placeholder="Description Should be Here"></textarea>
							 </div>
							 <div class="form-group col-md-6">
								<button type="submit" class="btn btn-success" id="submit" name="submit"> Add Product</button>
							</div>
				</form>	
			
			</div>
       </div>                           
</div>
<hr>
<?php require "footer.php"; ?>
</body>

</html>
