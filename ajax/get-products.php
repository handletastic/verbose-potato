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
   $stocklevel = $_POST["stocklevel"];
   $special = $_POST["special"];
   $featured = $_POST["featured"];
   $limit = $_POST["limit"];
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
         $qualifier1="AND productscategories.categoryid='$categoryid'";
      }
      elseif($categoryid==0 && $brandid){
         $qualifier1="AND productsbrands.brandid='$brandid'";
      }
      elseif($categoryid && $brandid){
         $qualifier1="AND productsbrands.brandid='$brandid' 
         AND productscategories.categoryid='$categoryid'";
      }
      //add qualifiers for stocklevel and special
      if($special==1){
         $qualifier2="AND special=true";
      }
      if($stocklevel==1){
         $qualifier3="AND stocklevel>0";
      }
      //concatenate basic query and qualifiers
      $query = $basicquery." ".$qualifier1." "
      .$qualifier2." "
      .$qualifier3." GROUP BY products.id ORDER BY productname ASC";
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