<?php 
session_start();
unset($_SESSION["AID"]);
unset($_SESSION["UID"]);
unset($_SESSION["SKID"]);
session_destroy();
echo "<script>window.open('index.php','_self')</script>";
?>