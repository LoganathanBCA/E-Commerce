<?php
	include "config.php";
	$sql="delete from banner where BID='{$_POST["id"]}'";
	if($con->query($sql))
	{
		echo "Banner Deleted.";
	}

?>