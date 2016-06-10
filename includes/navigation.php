<?php
//all functions have been moved to includes/functions.php
?>
<nav class="navbar navbar-default top-nav">
    <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Website</a>
        </div>
        <div class="collapse navbar-collapse" id="main-menu">
            <?php
            //render navigation group 1 (main navigation)
            //the function getNavigationItems() is in functions.php file which is included before this file
            //in head.php (that's why it's not included in this file)
            $nav = getNavigationItems(0,$dbconnection,$tablename,1,"navbar-right main-nav");
            echo implode("",$nav);
            ?>
            <form class="navbar-form navbar-right" 
            role="search" 
            action="search_result.php"
            method="post">
                <div class="form-group">
                    <input type="text" 
                    class="form-control" 
                    placeholder="Search"
                    name="search">
                </div>
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
    </div>
</nav>
<nav class="navbar top-nav">
    <div class="container-fluid">
        <?php
        //if user is logged in, show their username or email address.
        //the function getNavigationItems() is in functions.php file which is included before this file
        //in head.php (that's why it's not included in this file)
        if($_SESSION["userid"]){
            $userid = $_SESSION["userid"];
            echo "<span class=\"navbar-text navbar-left user-greeting\">".
            getUserName($userid,$dbconnection)
            ."</span>";
        }
        //we render navigation that belongs in group 2
        $usernav = getNavigationItems(0,$dbconnection,$tablename,2,"navbar-right user-nav");
        echo implode($usernav);
        ?>
    </div>
</nav>