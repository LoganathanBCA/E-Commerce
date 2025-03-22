<?php
include"config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php 
	require "head.php";
?>
<style>
	.terms {
		padding-left:20px;
		
	}
	.terms li{
		line-height:30px;
		font-size:18px;
		text-align:justify;
		list-style-type:square;
	}
</style>
</head>
<body>
<?php 
	include "topnav.php";
?>


<div class="container" style="margin-top:30px;">
	<div class="row">
		<div class="col-md-12">
			<h1 class='page-header text-primary'>Payment Mode</h1>
		</div>
		<div class="col-md-6">
			<img src="img/COD.png" class="img-responsive">
		</div>
		<div class="col-md-6">
		<ul class='terms'>		
			<li>Cash on Delivery is a payment method available on Gramy Traders.</li>
			<li>Cash on Delivery is available as a payment method for all items .</li>
			<li>It lets you place orders without the need of an advance payment.</li>
			<li>We accept all valid notes, including newly introduced 500 and 2000 Rupee notes.</li>
			<li>You can also pay conveniently at your doorstep with cards.</li>
			<li>There are no extra charges for Cash on Delivery. We only collect the amount printed on the invoice.</li>
		</ul>
		</div>

	</div>
</div>

    

	 <?php
		require "footer.php";
	 ?>

  

</body>

</html>
