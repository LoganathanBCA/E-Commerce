<?php
	include "config.php";
	$sql="delete from rate_review where CRID='{$_POST["id"]}'";
	if($con->query($sql))
	{
		echo "Message Deleted.";
	}

?>