<?php
	include "config.php";
	 $sql="delete from product_fav where FID='{$_GET["id"]}'";
	if($con->query($sql))
	{
		echo "Favourite Item Deleted.";
		header("location:view_fav.php");
	}

?>