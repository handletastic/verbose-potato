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
    $level = $_POST["level"];
    $group = $_POST["group"];
    $table = "pages";
    $navigationstring = implode("",getNavigationItemsAjax($level,$dbconnection,$table,$group));
    $navigation = stripslashes($navigationstring);
    $data["success"]=true;
    $data["navigation"]=$navigation;
    echo json_encode($data);
}
else{
    echo "no data";
}




?>