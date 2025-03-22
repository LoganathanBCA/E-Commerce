<?php
	include "config.php";
	$sql="delete from bulkorder where BID='{$_POST["id"]}'";
	if($con->query($sql))
	{
		echo "Bulk Order Deleted.";
	}

?>