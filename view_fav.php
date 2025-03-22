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
				   <h2 class="page-header text-primary"> Favourite Items</h2>	
			</div>
			<div class="col-md-3">
				<?php
					include "user_sidnav.php";
				?>
			</div>
			<div class="col-md-9">
			 <table class="table table-hover table-striped table-bordered">
                             <thead class="text-primary">
                                 <tr>
                                     <th>S.no</th>
									 <th>Product Name</th>
									 <th>Product</th>
									 
									 <th>Delete</th>
								</tr>
                             </thead>
                             <tbody>
							  <?php 
										$sql= "Select product_fav.FID, product_fav.UID, products.PNAME, products.LOC
From product_fav Inner Join
  products On products.PID = product_fav.PID where product_fav.UID= '{$_SESSION["UID"]}'";
										$res=$con->query($sql);
										if($res->num_rows>0)
										{
											$i=0;
											while($row=$res->fetch_assoc())
											{
												$i++;
												echo'
													<tr>
													   <td>'.$i.'</td>
													   <td>'.$row["PNAME"].'</td>
													   <td><img src="products/'.$row["LOC"].'" height="50px" width="50px"></td>
													  
													   <td><a  href="fav_delete?id='.$row['FID'].'"><i class="fa fa-trash text-danger"></i></a></td>
													</tr>
												';
											}
										}
								   
								   ?>
                                      
                                 
                             </tbody>
                         </table>
			</div>
       </div>                         
</div>
<hr>
<?php require "footer.php"; ?>
</body>

</html>
