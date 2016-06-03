<?php 
include("includes/head.php");
?>
<main class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    <?php echo $sectionname;?>
                </h2>
                <p>
                    <?php
                    echo "<p>".$content[0]['content']."</p>";
                    ?>
                </p>
            </div>
        </div>
        <div class="row">
           <?php
              if(count($_GET)>0){
                 $id=$_GET["id"];
                 //get product details with the above id
                 $product = getProduct($dbconnection,$id);
                 //get images for this product
                 $images = getProductImages($dbconnection,$id);
            ?>
           <div class="col-md-6 gallery">
              <?php
                 foreach($images as $img){
                    echo "<img class='product-image' src=products/".$img['file'].">";
                 }
              }
              ?>
           </div>
           <div class="col-md-6">
              <?php
                  $name = $product["name"];
                  $description = $product["description"];
                  $price = $product["sellprice"];
                  $saleprice = $product["saleprice"];
                  $special = $product["special"];
                  echo "<h3>$name</h3>";
                  echo "<p>$description</p>";
                  //if product is on special
                  if($special){
                     echo "<p class=\"dollar price normal-price cross\">$price</p>";
                     echo "<p class=\"dollar price special-price\">$saleprice</p>";
                  }
                  else{
                     echo "<p class=\"dollar price normal-price\">$price</p>";
                  }
                  //buttons
                  
              ?>
           </div>
        </div>
   </div>
</main>
<?php
include("includes/footer.php");?>
?>