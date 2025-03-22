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
	.terms li{
		line-height:40px;
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
		<h1 class='page-header text-primary'> Term And Condition</h1>
<ul class='terms'>			
<li>With our secure online service you can order the quality items you require and have them delivered at a time meets you.</li>
<li>When it comes to placing your favorite order, you can search for your shopping by category, browse in category and find specific products to suit your needs.</li>
<li>With our easy-to-use site we can help keep your shopping just you like it. Find your needs.</li>
<li>Minimum Order Rs – 1000/- free delivery within 10 Kms distance.</li>
<li>Below Rs – 1000/- Order Service Charge applicable.</li>
<li>Products once delivered cannot be return if the company pack is opened</li>
<li>Kindly check the Product while receiving from our delivery Staff's.</li>
<li>Order cannot be cancelled by the customer after the verification call from the concern.</li>
<li>Cash on Delivery only available, online payment will be updated soon.</li>
<li>All our fresh groceries are packed on the day they are delivered, so you can be assured of the best of quality products. You will receive your shopping in the same condition as if you had just picked it from your known supermarket shelf</li>
</ul>
</div>
	</div>
</div>

    

	 <?php
		require "footer.php";
	 ?>

  

</body>

</html>
