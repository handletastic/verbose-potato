<?php 
include("includes/head.php");
if(!$_SESSION["admin"]){
   unset($_SESSION["userid"]);
   $redirect = $_SERVER['HTTP_REFERER'];
}
else{
   unset($_SESSION["userid"]);
   unset($_SESSION["admin"]);
   $redirect = "index.php";
}
//redirect user to previous page
header('Location: '.$redirect);

exit();
?>