<?php
include_once("dbconnection.php");
function getCurrentPageName(){
    $page = basename($_SERVER['PHP_SELF']);
    $ln = strlen($page)-4;
    return $page;
}
$pagetitle = getCurrentPageName(true);
?>
<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>
            <?php echo $pagetitle;?>
        </title>
        <?php include("styles.php");?>
    </head>
    <body>
<?php include("pageheader.php");?>