<?php
session_start();
include_once("../includes/dbconnection.php");
//include functions file
include_once("../includes/functions.php");
$token = $_SESSION["token"];
//array to store errors and error messages
$errors = array();
//array to store data
$data = array();
//if there is data being submitted via POST
if(count($_POST)>0){
   //sanitize input from client side
   $productid=$_POST["id"];
   $mode=$_POST["mode"];
   $usertoken=$_POST["token"];
   //get userid from session variable "userid" or "tempuserid"
   if($_SESSION["userid"]){
      $userid = $_SESSION["userid"];
   }
   elseif($_SESSION["tempuserid"]){
      $userid = $_SESSION["tempuserid"];
   }
   //check the tokens being submitted if it matches session token(optional)
   if($usertoken==$token){
      if($mode=="quantity"){
         $cart = getCartFromDB($dbconnection,$userid,"quantity");
         $data["success"]=true;
         $data["quantity"]=$cart;
      }
      elseif($mode=="items"){
         $cart = getCartFromDB($dbconnection,$userid,"items");
         $data["success"]=true;
         $data["products"]=$cart;
      }
      else{
         $data["success"]=false;
         $data["message"]="incorrect parameters";
      }
      returnJSONData($data,$errors);
   }
}
//if no data has been submitted
else{
   //kill the script
   exit();
}


function getCartFromDB($connection,$userid,$mode){
   $cartitems = array();
   if($mode=="quantity"){
      //get all items belonging to the user that has not been checked out
      $query = "SELECT userid,productid,quantity FROM shoppingcart 
      WHERE userid='$userid' AND checkedout='false'";
   }
   elseif($mode=="items"){
      //get all items belonging to the user that has not been checked out
      //and get images for the products and price
      //by using inner join with the images and products table
      $query = "SELECT 
               shoppingcart.productid AS productid,
               shoppingcart.quantity AS quantity,
               images.imagefile AS image,
               products.name AS name,
               products.sellprice AS price,
               products.saleprice AS saleprice,
               products.stocklevel AS stock
               FROM shoppingcart INNER JOIN images ON images.productid=shoppingcart.productid 
               INNER JOIN products ON products.id=shoppingcart.productid
               WHERE shoppingcart.userid='$userid'AND shoppingcart.checkedout='false'
               GROUP BY shoppingcart.productid
               ORDER BY products.name ASC";
   }
   $result = $connection->query($query);
   if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
         array_push($cartitems,$row);
      }
   }
   if($mode=="quantity"){
      return count($cartitems);
   }
   elseif($mode=="items"){
      return $cartitems;
   }
}

function returnJSONData($arraydata,$arrayerrors){
   //add errors to data array
   $arraydata["errors"] = $arrayerrors;
   //return data as json
   echo json_encode($arraydata);
   exit();
}
?>