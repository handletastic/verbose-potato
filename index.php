<?php 
include_once("includes/head.php");
?>
<main class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                 <h2><?php echo $sectionname;?></h2>
                <p>
                    <?php
                    echo "<p>".$content[0]['content']."</p>";
                    ?>
                </p>
            </div>
           
        </div>
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
    </div>
</main>
<?php include("includes/footer.php");?>