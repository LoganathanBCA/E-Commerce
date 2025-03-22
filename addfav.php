<?php 
	session_start();
	include "config.php";
	$uid=$_SESSION["UID"];
	$pid=$_POST["id"];
	
	$sql="DELETE FROM product_fav WHERE UID={$uid} and PID={$pid}";
	$con->query($sql);
	$sql="insert into product_fav (UID,PID) values({$uid},{$pid});";
	if($con->query($sql))
	{
		echo "Product Added To Your Favourite";
	}
?>