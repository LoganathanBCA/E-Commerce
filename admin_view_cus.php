
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
 
          <div class="container" style="margin-top:70px;">
          <div class="row">
		  <div class="col-md-12">
		  <h3 class="text-primary">Order Details</h3>
					<hr>
		  </div>
		  <div class="col-md-3">
					<?php include 'admin_sidnav.php';?>
			
				</div>
				<div class="col-md-9">
<?php
$sql="Select orders.id, user_reg.UNAME, orders.total_price, orders.created,user_reg.UID ,
orders.status
From user_reg Inner Join
orders On user_reg.UID = orders.customer_id where user_reg.UID='{$_GET["id"]}' order by orders.id asc";


					
$result=$con->query($sql);
//Total Number of Rows
$total_rows=$result->num_rows;


//Total Rows Per Page
$page_rows=100;

//Last Page Number
$last=ceil($total_rows/$page_rows);
if($last<1)
{
	$last=1;
}

//Default Page Number
$pagenum=1;

//Getting Page number 
if(isset($_GET['pn']))
{
	$pagenum=preg_replace('#[^0-9]#','',$_GET['pn']);
}


if($pagenum<1){
	$pagenum=1;
}
elseif($pagenum>$last)
{
	$pagenum=$last;
}


//Limit Values
$limit='LIMIT '.($pagenum-1)*$page_rows.','.$page_rows;

$sql="Select orders.id, user_reg.UNAME, orders.total_price, orders.created,user_reg.UID ,
  orders.status
From user_reg Inner Join
  orders On user_reg.UID = orders.customer_id where user_reg.UID='{$_GET["id"]}' order by orders.id asc $limit";
					$result=$con->query($sql);

$text1="Total $total_rows Order Details";
$text2="$pagenum Page of $last";

//Pagination Controls
$pagination='<ul class="pagination">';

if($last!=1)
 {
		 if($pagenum>1)
		 {
			 $previous=$pagenum-1;
			 $pagination.=' <li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a></li>';
			 for($i=$pagenum-4;$i<$pagenum;$i++)
			 {
				 if($i>0)
				 {
					 $pagination.='<li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a></li>';
				 }
			 }
		 }
	 

	 $pagination.='<li class="active" 	><a href="#"  >'.$pagenum.'</a></li> ';
	 
	 for($i=$pagenum+1;$i<=$last;$i++)
	 {
		 $pagination.='<li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> </li>';
		 if($i>=$pagenum+4)
		 {
			 break;
		 }
	 }
	 
	 if($pagenum!=$last)
	 {
		 $next=$pagenum+1;
		 $pagination.='<li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a></li></ul>';
	 }
	else
	{
		 $pagination.='</ul>';
	}
 }
$list='';
 $result=$con->query($sql);
						if($result->num_rows>0)
						{
								$list.= "<table class='table table-hover table-bordered table-striped'>";
									$list.= '
					<thead class="text-primary">
                                    <tr>
                                     <th>S.no</th>
									 <th>Order No</th>
									 <th>Name</th>
									 <th>Total Amount</th>
									 <th>Order Date</th>
									 <th>View</th>
									 <th>Status</th>
								</tr>
   
					</thead>';
										$p=isset($_GET["pn"])?$_GET["pn"]:1;
										$i=($p*$page_rows)-$page_rows;
										while($row=$result->fetch_assoc())
										{
											$i++;
											$list.="<tr>";
											$list.= "<td>$i</td>";
											$list.= '<td>GR'.$row["id"].'</td>';
											$list.= '<td>'.$row["UNAME"].'</td>';
											$list.= '<td>'.$row["total_price"].'</td>';
											$list.= '<td>'.$row["created"].'</td>';
											$list.= '<td><a href="adminviewOrderDetails.php?id='.$row["id"].'&'.'uid='.$row["UID"].'" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a></td><td>';
								
								if($row["status"]==1)
								{
								
									$list.="<a href='#' class='btn btn-success btn-xs'><i class='fa fa-eye'></i> Completed</a>";
									
								}
								else
								{
									
									$list.="<a href='#' class='btn btn-danger btn-xs'><i class='fa fa-eye'></i> Pending</a>";
									
								}
								
								
								
								
											$list.="</td></tr>";
										}
								$list.= "</table>";
						}
						else
						{
								$list.= "<div class='alert alert-danger'>No Order Details Found</div>";
						}


				
				echo $list; 
				
				echo $pagination; ?>	

<h4 align="right" class='text-primary'><?php echo $text1; ?></h4>
<p align="right"><?php echo $text2; ?></p>				
				
				

				</div>
			</div>
			</div>
<?php include'footer.php';?>