<?php
	include "config.php";
	$sql="delete from products where PID='{$_POST["id"]}'";
	if($con->query($sql))
	{
		echo "Product Deleted.";
	}

?>