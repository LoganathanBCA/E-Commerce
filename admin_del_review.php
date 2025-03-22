<?php 
include "config.php";

$sql="delete from review WHERE RID=".$_POST["id"];
$res=$con->query($sql);
echo "Review is delete successfully";
?>