<?php
//start session for the page
session_start();
//include dbconnection script
include_once("dbconnection.php");
//include global functions
include_once("functions.php");
//set token as a session variable if it does not exist already
if(!$_SESSION["token"]){
    $_SESSION["token"]=generateToken();
    //$sessiontoken = $_SESSION["token"];
}
if(checkSessionAge($dbconnection,3000)==true){
    unset($_SESSION["userid"]);
    $redirect = "index.php";
    header('Location: '.$redirect);
}
//this function is to log user activity, it is part of functions.php file
logActivity($dbconnection);
//set table name from where the data for the page will be retrieved
// also used for navigation
$tablename = "pages";


$sectionname = getPageTitle($dbconnection,$tablename);
//get the content of the page
$content = getPageContent($dbconnection);
?>
<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>
            <?php echo $sectionname;?>
        </title>
        <?php 
        include("styles.php");
        //add token into page as a javascript variable
        $sessiontoken = $_SESSION["token"];
        echo "<script> var token =\"$sessiontoken\";</script>";
        ?>
    </head>
    <body>
    
<?php 
include("pageheader.php");
?>