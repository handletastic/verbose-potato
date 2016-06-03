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
   $usertoken = $_POST["token"];
   $categoryid = $_POST["category"];
   $brandid = $_POST["brand"];
   //check if client token matches session token
   if($usertoken==$_SESSION["token"]){
      $basicquery="SELECT products.id AS productid,
         products.name AS productname,
         products.description AS productdescription,
         products.sellprice AS productprice,
         products.special,products.saleprice,
         brands.name AS brandname,
         images.imagefile AS productimage
         FROM products
         INNER JOIN productscategories ON productscategories.productid = products.id 
         INNER JOIN productsbrands ON products.id=productsbrands.productid 
         INNER JOIN brands ON productsbrands.brandid = brands.id
         INNER JOIN images ON products.id = images.productid
         WHERE products.published=true";
      if($categoryid && $brandid==0){
         $qualifier="AND productscategories.categoryid='$categoryid'";
      }
      elseif($categoryid==0 && $brandid){
         $qualifier="AND productsbrands.brandid='$brandid'";
      }
      elseif($categoryid && $brandid){
         $qualifier="AND productsbrands.brandid='$brandid' 
         AND productscategories.categoryid='$categoryid'";
      }
      $query = $basicquery." ".$qualifier." GROUP BY products.id ORDER BY productname ASC";
      $result = $dbconnection->query($query);
      $products = array();
      if($result->num_rows > 0){
         while($row = $result->fetch_assoc()){
            array_push($products,$row);
         }
         //return the data
         $data["success"]=true;
         $data["products"]=$products;
         echo json_encode($data);
      }
      else{
         $data["success"]=false;
         echo json_encode($data);
      }
   }
}

?>