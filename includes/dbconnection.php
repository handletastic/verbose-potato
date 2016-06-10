<?php
$dbhost="localhost";
$dbname="test";
$dbuser="root";
$dbpass="root";
$dbconnection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$dbconnection){
    //if there is an error show the error code
    echo "error ".PHP_EOL;
    echo "error no: " . mysqli_connect_errno() . PHP_EOL;
    exit;
}
else{
    //echo "<!--success-->";
}

?>
