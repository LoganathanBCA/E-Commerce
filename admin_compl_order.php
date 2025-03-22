
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
 
          <div class="container-fluid">
          <div class="row">
				<div class="col-md-3">
					<?php include 'admin_sidnav.php';?>
				
				</div>
				<div class="col-md-9">
				<h3 class="text-primary">Completed Order Details</h3>
					<hr>

				 <table class="table table-hover table-striped table-bordered">
                             <thead class="text-success">
                                 <tr>
                                     <th>S.no</th>
									 <th>Order No</th>
									 <th>Name</th>
									 <th>Total Amount</th>
									 <th>Order Date</th>
									 <th>View</th>
								</tr>
                             </thead>
                             <tbody>
							 <?php 
					 $sql="
Select orders.id, user_reg.UNAME, orders.total_price, orders.created,
  user_reg.UID, orders.status
From user_reg Inner Join
  orders On user_reg.UID = orders.customer_id
Where orders.status = 1
Order By orders.id
					 ";

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
								<td><?php echo $row["UNAME"];?></td>
								<td><?php echo $row["total_price"];?></td>
								<td><?php echo $row["created"];?></td>
								<td><a href='adminviewOrderDetails.php?id=<?php echo $row["id"]; ?>&uid=<?php echo $row["UID"]; ?>' target='_blank' class='btn btn-info btn-xs'><i class='fa fa-eye'></i> View</a></td>
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