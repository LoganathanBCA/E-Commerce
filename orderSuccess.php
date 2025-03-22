<?php
session_start();
if(!isset($_GET['id']))
{
echo "<script>window.open('product','_self')</script>";
}
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order</title>
	<?php include "head.php";?>
 
</head>

<body>
<?php include "topnav.php"; 	?>
<div class="container" style="margin-top:70px;">
	<h2><img src='img/ok.gif' style='height:100px;'> Hai <?php echo $_SESSION["UNAME"]; ?></h2>
	<h3 class="text-primary">Your order has submitted successfully. Order ID is #GR<?php echo $_GET['id']; ?></h3>
	
	<?php 
			$s="SELECT STR1,STR2 FROM user_reg WHERE UID={$_SESSION["UID"]}";
			$re=$con->query($s);
			if($re->num_rows>0)
			{
				$ro=$re->fetch_assoc();
				$s1=strlen($ro["STR1"]);
				$s2=strlen($ro["STR1"]);
				if($s1>0&&$s2>0)
				{
					
					?>
						<p><b>Note: </b> Do you need To Change Delivery Address . <a href='user_address'>Change Now</a> </p>
					<?php
				}
				else
				{
					?>
						<p style='color:red;'><b>Note: </b> Please Add Your Delivery Address . <a href='user_address'>Add Now</a> </p>
					<?php
					
				}
			}
	?>
	



</div>
<?php 
	include "footer.php";
?>
</body>
</html>