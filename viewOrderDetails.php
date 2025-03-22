<?php
	include'config.php';
	session_start();
?>
<html lang="en">
<head>
<?php 
	require "head.php";
?>
</head>
<body>
	 <?php include'topnav.php';?>
 
          <div class="container" style="margin-top:70px;">
          <div class="row">
				<div class="col-md-12">
				<h3 class="text-primary"> Order Details</h3>
					<hr>
				</div>
				<div class="col-md-3">
					<?php include 'user_sidnav.php';?>
				
				</div>
				<div class="col-md-9">
				
				 <table class="table table-hover table-striped table-bordered">
                             <thead class="text-primary">
                                 <tr>
                                     <th>S.no</th>
									 <th>Product Name</th>
									 <th>Quantity</th>
									 <th>Unit Price</th>
									 <th>Sub Total</th>
								</tr>
                             </thead>
                             <tbody>
							 <?php 
							 $total=0;
					  $sql="
Select products.PNAME, order_items.quantity, products.NPRICE, order_items.order_id
From order_items Inner Join
  products On order_items.product_id = products.PID
Where order_items.order_id = {$_GET["id"]}	 
					 ";

							 $res=$con->query($sql);
							 if($res->num_rows>0)
							 {
								 $i=0;
							 while($row=$res->fetch_assoc())
							 {
								 $i++;
								 $a=($row["NPRICE"]*$row["quantity"]);
							 ?>
                              <tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $row["PNAME"];?></td>
								<td><?php echo $row["quantity"];?></td>
								<td><?php echo $row["NPRICE"];?></td>
								<td><?php echo $a;?></td>
								
							</tr>
									
						<?php
						$total+=$a;
							 }
							 ?>
							 <tr>
							 <td colspan="5">
								<span class="text-primary pull-right" style="font-weight:bold;">Total Amount Rs: <?php echo $total;?></span>
							 </td>
							 </tr>
							 <?php
							}
							  else
							 {
								 echo "<div class='alert alert-info'>Still No Order Placed...</div>";
							 }
							?>
                                 
                             </tbody>
                         </table>
				</div>
			</div>
			</div>
<?php include'footer.php';?>

</body>

</html>
