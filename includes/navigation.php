<?php
//array to hold all nav items
$navigation = array();
// get navigation top level,ie where level = 0
$top_level_query = "SELECT name,link,level,parentid, FROM pages";
//get the result from database | $dbconnection is part of dbconnection.php
$navresult = $dbconnection->query($top_level_query);
//add navigation tags
?>
<!--start of navigation-->
<!--<nav class="navbar navbar-default">-->
<!--    <div class="container-fluid">-->
<!--        <a href="<?php echo $homepage;?>" class="navbar-brand">-->
<!--            <?php echo $sitename;?>-->
<!--        </a>-->
<!--        <ul class="nav navbar-nav">-->
<?php
if($navresult->num_rows>0){
    while($row = $navresult->fetch_assoc()){
        $name = $row["name"];
        $link = $row["link"];
        $level = $row["level"];
        $parentid = $row["parentid"];
        //render top level navigation
        
    }
}
$homepage = "index.php";
?>
<nav class="navbar navbar-default">
    <div class="container-full">
        <a href="<?php echo $homepage;?>" class="navbar-brand">
            <?php echo $sitename;?>
        </a>
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="store.php">Our Store</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </div>
</nav>
