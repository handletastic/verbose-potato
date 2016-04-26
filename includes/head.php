<?php
//start session for the page
session_start();
//include dbconnection script
include_once("dbconnection.php");

function getCurrentPage(){
    $current = array();
    $current["url"] = basename($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $current["page"] = parse_url($currenturl)["path"];
    $current["file"] = basename($_SERVER['PHP_SELF']);
    return $current;
}

$pagetitle = getCurrentPage();
$title = basename($pagetitle["file"]);
?>
<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>
            <?php echo $title;?>
        </title>
        <?php include("styles.php");?>
    </head>
    <body>
<?php include("pageheader.php");?>