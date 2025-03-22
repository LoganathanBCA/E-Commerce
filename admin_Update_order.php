<?php 
include "config.php";
$sql="update orders set status=1 WHERE ID={$_GET["id"]}";
$con->query($sql);
echo "<script>window.open('admin_order_details.php','_self')</script>";

?>
