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
			<h1 class='page-header text-primary'>Our Clients</h1>
		</div>
		<div class="col-md-6">
		<ul class="terms">
			<li>Chellama Mess</li>
			<li>Nallan Hotel</li>
			<li>Murugan Malligai</li>
			<li>Jayam Hotel</li>
			<li>Rajaganapathy hotel</li>
			<li>Vallivillas Hotel</li>
			<li>Marina Hotel</li>
			<li>Guru Hotel</li>
			<li>Kumar Military Hotel</li>
			<li>S.M Coffee Bar</li>
			<li>Amman Hotel</li>
		</ul>
		</div>
		<div class="col-md-6">
		<ul class="terms">
		
		<li>Hari malligai</li>
		<li>Poornitha malligai</li>
		<li>Ragunath malligai</li>
		<li>Lakshmi Coffee bar</li>
		<li>Jaya Hotel</li>
		<li>S.S.R Malligai</li>
		<li>Selvi Store</li>
		<li>Kuppana catering</li>
		<li>Rajendran catering</li>

			</ul>
		</div>

	</div>
</div>

    

	 <?php
		require "footer.php";
	 ?>

  

</body>

</html>
