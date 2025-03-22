<?php
	include "config.php";
	$sql="delete from contact where MID='{$_POST["id"]}'";
	if($con->query($sql))
	{
		echo "Message Deleted.";
	}

?>