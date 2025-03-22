<?php
	include "config.php";
	$sql="delete from pro_category where CID='{$_POST["id"]}'";
	if($con->query($sql))
	{
		echo "User Deleted.";
	}

?>