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
		<h1 class='page-header text-primary'>About Us</h1>
		
			<ul class='terms'>
			<li>Having Experience in this field for past 40 years, Now Next Step on the New level.</li>
			<li>FSSAI certified Company.</li>
			<li>Providing the product good Quality & Service with low cost.</li>
			<li>We can deliver direct to your door.</li>
			<li>Bulk Orders, Marriage orders & Corporate orders will be taken & deliver on Time.</li>
			<li>Running with Experienced Marketing Team & Market analyzing Team.</li>
			</ul>
		</div>

	</div>
</div>

    

	 <?php
		require "footer.php";
	 ?>

  

</body>

</html>
