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
 
          <div class="container" style="margin-top:30px;">
          <div class="row">
				<div class="col-md-12">
					<h3 class="text-primary text-primary"> 	 Order Details</h3>
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
									 <th>Order No</th>
									 <th>Total Amount</th>
									 <th>Order Date</th>
									 <th>View</th>
									 <th>Status</th>
								</tr>
                             </thead>
                             <tbody>
							 <?php 
					 $sql="Select orders.id, orders.total_price, orders.created,orders.status
From orders WHERE orders.customer_id={$_SESSION["UID"]}";

							 $res=$con->query($sql);
							 if($res->num_rows>0)
							 {
								 $i=0;
							 while($row=$res->fetch_assoc())
							 {
								 $i++;
							 ?>
                              <tr>
								<td><?php echo $i; ?></td>
								<td>GR<?php echo $row["id"];?></td>
								<td><?php echo $row["total_price"];?></td>
								<td><?php echo $row["created"];?></td>
								<td><a href='viewOrderDetails.php?id=<?php echo $row["id"]; ?>' class='btn btn-info btn-xs'><i class='fa fa-eye'></i> View</a></td>
<td>								
								<?php 
								if($row["status"]==1)
								{
									?>
									<a href="#" class='btn btn-success btn-xs'>Completed</a>
									<?php
								}
								else
								{
										?>
									<a href='#' class='btn btn-danger btn-xs'>Pending</a>
									<?php
								}
								
								?>
								</td>
							</tr>
									
						<?php
							 }
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
