<?php 
include("includes/head.php");
?>
<main class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
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
           <div class="col-md-8 gallery">
              <?php
                  $i=0;
                 foreach($images as $img){
                    $i++;
                    $imageid = "product-image-".$i;
                    echo "<img id='".$imageid."' class='product-image' src=products/".$img['file'].">";
                 }
              }
              ?>
           </div>
           <div class="col-md-4">
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
                  echo "<div class=\"store-detail-buttons\">
                  <form class=\"form-inline\">
                    <button class=\"btn btn-default buy-btn\" data-id=\"$id\">
                    <i class=\"fa fa-shopping-bag\"></i><span class=\"hidden-sm\">Buy It</span></button>
                    <input class=\"form-control qty\" type=\"number\" value=\"1\">
                    <button class=\"btn btn-default wish-btn\" data-id=\"$id\">
                    <i class=\"fa fa-heart\"></i><span class=\"hidden-sm\">Fave It</span></button>
                    </form>
                  </div>";
                  
              ?>
           </div>
        </div>
   </div>
</main>
<?php
include("includes/footer.php");?>
?>