<?php
session_start();
include_once("../includes/dbconnection.php");
//include functions file
include_once("../includes/functions.php");
$token = $_SESSION["token"];
//store errors and error messages
$errors = array();
//store data
$data = array();
if(count($_POST)>0){
}

?>