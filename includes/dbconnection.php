<?php
$dbhost="localhost";
$dbname="test";
$dbuser="johannesmu";
$dbpass="";
$dbconnection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$dbconnection){
    echo "error ".PHP_EOL;
    echo "error no: " . mysqli_connect_errno() . PHP_EOL;
    exit;
}
else{
    //echo "success!";
}
//close the database connection (will save memory)
mysqli_connect=>close($dbconnection);
?>