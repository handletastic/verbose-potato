<?php 
include("includes/head.php");
unset($_SESSION["user"]);
unset($_SESSION["userid"]);
unset($_SESSION["admin"]);
$redirect = $_SERVER['HTTP_REFERER'];
//redirect user to previous page
header('Location: '.$redirect);
exit();
?>