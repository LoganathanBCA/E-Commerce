<?php 
include "config.php";

$sql="select * from offers WHERE PID=".$_POST["id"];
$res=$con->query($sql);
if($res->num_rows>0)
{
	echo "Already Added";
}
else
{
	$sql="insert into offers (PID) values ({$_POST["id"]})";
	if($res=$con->query($sql))
	{
		echo "Offered Added";
	}
}

?>