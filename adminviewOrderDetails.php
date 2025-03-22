<?php
	include'config.php';
	session_start();
?>
<html>
<head>
<?php include'head.php';?>
</head>
<body>
	 <?php include'topnav.php';?>
 
          <div class="container">
          <div class="row">
			
				<div class="col-md-12">
				<h3 class="text-primary">Order Details</h3>
					<hr>

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
								<h4 class="text-right">Total Amount Rs: <?php echo $total;?></h4>
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
				<div class="col-md-6">
				<h3 class="text-primary">Delivery Address</h3>
				 <table class="table table-bordered">
                             <tbody>
							 <?php 
							 $total=0;
					 $sql="
Select * From user_reg where UID={$_GET["uid"]}	 
					 ";

							 $res=$con->query($sql);
							 if($res->num_rows>0)
							 {
								
									if($row=$res->fetch_assoc())
									{

									?>

										<tr><th>NAME</th><td><?php echo $row["UNAME"];?></td></tr>
										<tr><th>Street-1</th><td><?php echo $row["STR1"];?></td></tr>
										<tr><th>Street-2</th><td><?php echo $row["STR2"];?></td></tr>
										<tr><th>Land Mark</th><td><?php echo $row["LAND"];?></td></tr>
										<tr><th>City</th><td><?php echo $row["UPLACE"];?></td></tr>
										<tr><th>Mobile No</th><td><?php echo $row["UPHONE"];?></td></tr>
										<tr><th>Alternate Mobile No</th><td><?php echo $row["APHONE"];?></td></tr>
										<tr><th>Email ID</th><td><?php echo $row["UMAIL"];?></td></tr>
										
									<?php
									}
	
							}
							  else
							 {
								 echo "<div class='alert alert-info'>Invalid Delivery Address..</div>";
							 }
							?>
                                 
                             </tbody>
                         </table>
				</div>
			</div>
			</div>
<?php include'footer.php';?>