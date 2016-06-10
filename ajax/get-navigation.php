<?php
session_start();
include_once("../includes/dbconnection.php");
include_once("../includes/functions.php");
//session token
$token = $_SESSION["token"];
//store errors and error messages
$errors = array();
//store data
$data = array();
if(count($_POST)>0){
    $level = filter_var($_POST["level"],FILTER_SANITIZE_NUMBER_INT);
    $group = filter_var($_POST["group"],FILTER_SANITIZE_STRING);
    $table = "pages";
    $navigationstring = implode("",getNavigationItemsAjax($level,$dbconnection,$table,$group));
    //we use stripslashes to remove quotes from the array, as 
    $navigation = stripslashes($navigationstring);
    $data["success"]=true;
    $data["navigation"]=$navigation;
    echo json_encode($data);
}
else{
    exit();
}




?>