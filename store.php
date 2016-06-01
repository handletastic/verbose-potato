<?php 
include("includes/head.php");
//get products from products table
function getProducts($connection,$filterby,$filtervalue){

    //filterby columns 
    switch($filterby){
        case "category":
            $category = $filtervalue;
            break;
        case "brand" :
            $brand = $filtervalue;
            break;
        case "color" :
            $color = $filtervalue;
        default:
            $category =0;
            $brand=0;
            $color=0;
            break;
    }
    $query = "SELECT 
    products.id,
    products.name,
    brands.name,
    products.sellprice,
    products.special,
    products.saleprice,
    products.description,
    products.color
    FROM productscategories 
    INNER JOIN products ON productscategories.productid = products.id 
    INNER JOIN brands ON brands.id=products.brandid
    WHERE published=1";
    
    $result = $connection->query($query);
    $products = array();
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $item = array();
            $item["id"] = $row["id"];
            $item["name"] = $row["name"];
            $item["material"] = $row["material"];
            $item["color"] = $row["color"];
            $item["netprice"] = $row["price"];
            $item["featured"] = $row["featured"];
            $item["special"] = $row["special"];
            $item["saleprice"] = $row["saleprice"];
            $item["images"] = getProductImages($item["id"],$connection);
        }
        return $products;
    }
    
}

function getProductImages($productid,$connection){
    $query = "SELECT title,imagefile,caption FROM images WHERE productid='$productid' AND published=1";
    $result = $connection->query($query);
    $images = array();
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $image = array();
            $image["title"] = $row["title"];
            $image["image"] = $row["file"];
            $image["caption"] = $row["caption"];
            $image["file"] = $row["imagefile"];
            array_push($images,$image);
        }
        return $images;
    }
    $connection->close();
}

function getProductFilter($connection,$filter){
    switch($filter){
        case "colour":
            $table = "color";
            break;
        case "categories":
            $table = "categories";
            break;
        case "brands":
            $table = "brands";
            break;
        default:
            break;
    }
    $query = "SELECT id,name FROM $table";
    $result = $connection->query($query);
    $categories = array();
    $all = array("id"=>0,"name"=>"all $table");
    array_push($categories,$all);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            array_push($categories,$row);
        }
        return $categories;
    }
    $connection->close();
}

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
            <div class="col-md-2 sidebar">
                <!--sidebar-->
                <h5>Choose A Category</h5>
                <form id="category-select">
                    <select class="form-control">
                        <?php
                            $filter = getProductFilter($dbconnection,"categories");
                            //var_dump($filter);
                            foreach ($filter as $category) {
                                $id=$category["id"];
                                $name=$category["name"];
                                echo "<option value=\"$id\">$name</option>";
                            }
                        ?>
                    </select>
                </form>
               
                <h5>Choose A Brand</h5>
                <form id="brand-select">
                    <select class="form-control">
                        <?php
                            // $filter = getProductFilter($dbconnection,"categories");
                            $filter = getProductFilter($dbconnection,"brands");
                            //var_dump($filter);
                            foreach ($filter as $category) {
                                $id=$category["id"];
                                $name=$category["name"];
                                echo "<option value=\"$id\">$name</option>";
                            }
                        ?>
                    </select>
                </form>
            </div>
            <div class="col-md-10 store-products">
                <div class="store-overlay">
                    <i class="fa fa-circle-o-notch fa-3x fa-spin"></i>
                </div>
                <!--store items-->
                <?php
                
                ?>
            </div>
        </div>
    </div>
</main>
<?php include("includes/footer.php");?>