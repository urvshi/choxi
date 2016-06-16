<?php 
$check_log_in ="YES";
include_once("includes/init.php");
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
$_SESSION=array();
?>