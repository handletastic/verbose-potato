<?php
//start session for the page
session_start();
//include dbconnection script
include_once("dbconnection.php");
//function to generate a random token to secure sessions
function generateToken(){
    $seed = openssl_random_pseudo_bytes(16);
    $token = bin2hex($seed);
    return $token;
}
//set token as a session variable if it does not exist already
if(!$_SESSION["token"]){
    $_SESSION["token"]=generateToken();
}

//set table name from where the data will be retrieved
$tablename = "pages";

function getCurrentPage(){
    $current = array();
    $current["url"] = basename($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $current["page"] = parse_url($current["url"])["path"];
    $current["file"] = basename($_SERVER['PHP_SELF']);
    $current["request"] = basename($_SERVER['REQUEST_URI']);
    return $current;
}

function getPageTitle($connection,$table){
    $current = getCurrentPage();
    $currentpage = basename($current["url"]);
    $query = "SELECT pagetitle FROM $table WHERE link='$currentpage'";
    $result = $connection->query($query);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $pagetitle = $row["pagetitle"];
            return $pagetitle;
        }
    }
    else{
        return "<!--empty-->";
        //exit();
    }
}
// print_r(getCurrentPage());
// echo "<br>";
// $table = "pages";
// $current = getCurrentPage();
// $currentpage = $current["url"];
// //$currentpage = "index.php";
// //echo $currentpage;
// $pquery = "SELECT pagetitle FROM $table WHERE link='$currentpage'";
// $presult = $dbconnection->query($pquery);
// if($presult->num_rows > 0){
//     while($prow = $presult->fetch_assoc()){
//         $pagetitle = $prow["pagetitle"];
//         echo $pagetitle;
//     }
// }

$sectionname = getPageTitle($dbconnection,$tablename);
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
        echo "<script>var token =\"$sessiontoken\";</script>";
        ?>
    </head>
    <body>
    
<?php 
include("pageheader.php");
?>