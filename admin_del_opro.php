<?php 
include "config.php";

$sql="delete from offers WHERE PID=".$_POST["id"];
$res=$con->query($sql);
echo "Product Is Removed From Offer List";
?>