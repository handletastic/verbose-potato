<?php 
include("includes/head.php");
logOutUser();
$redirect = $_SERVER['HTTP_REFERER'];
//redirect user to previous page
header('Location: '.$redirect);

exit();
?>