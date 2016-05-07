<?php

/*function to retrieve the current page loaded. we will use this to
determine which navigation items to be marked as "active" */
function getNavigationItems($startlevel,$connection,$table,$group){
    $level=$startlevel;
    $navigation = array();
    $query = "SELECT * FROM `$table` 
    WHERE level='$level' 
    AND pagesgroup='$group' 
    AND published=1 
    ORDER BY showorder ASC";
    $navresult = $connection->query($query);
    if($navresult->num_rows>0){
        $navstart = "<ul class=\"nav navbar-nav navbar-right\">";
        array_push($navigation,$navstart);
        while($row = $navresult->fetch_assoc()){
            //the right hand side is the names of database columns
            $id = $row["id"];
            $name = $row["name"];
            $link = $row["link"];
            $pagetitle = $row["pagetitle"];
            $icon = $row["icon_name"];
            $showicon = $row["show_icon"];
            $showname = $row["show_name"];
            //get classes for the link
            $class = addClases($link);
            //if class is active (we are currently on this page)
            if($class=="active"){
                $menuitem = "<li class=\"$class\">".
                addIconToLink($link,$name,$showname,$showicon,$icon);
            }
            //if the item has a dropdown, add these extra attributes (part of bootstrap dropdown menu)
            elseif($class=="dropdown" || $class=="active dropdown"){
                $menuitem = "<li class=\"$class\">
                <a class=\"dropdown-toggle\" 
                data-toggle=\"dropdown\" href=\"$link\">$name
                <span class=\"caret\"></span></a>";
            }
            //otherwise just render as normal menu item
            else{
                $menuitem = "<li>".addIconToLink($link,$name,$showname,$showicon,$icon);
            }
            array_push($navigation,$menuitem);
            //get the submenu, if any
            if($link == "#" || $link == ""){
                $dropdownmenu = getSubMenu($id,$connection,$table);
                if($dropdownmenu){
                    array_push($navigation,implode("",$dropdownmenu));
                }
            }
            array_push($navigation,"</li>");
        }
        //return the navigation elements
        return $navigation;
        //close the database connection (saves memory)
        $connection->close();
    }
    else{
        //no navigation found
    }
}

function addClases($link){
    //get the current URL or page file name
    $current = getCurrentPage();
    $classes = array();
    if($link==$current["url"] || $link==$current["page"] || $link==$current["file"]){
        array_push($classes,"active");
    }
    elseif($link=="#" || $link==""){
        array_push($classes,"dropdown");
    }
    return implode(" ",$classes);
}

function getSubMenu($parent,$connection,$table){
    $subnavigation = array();
    $query = "SELECT * FROM pages WHERE parentid='$parent' ORDER BY 'order' ASC";
    $result = $connection->query($query);
    if($result->num_rows>0){
        //add the open tags of subnavigation
        $submenu = "<ul class=\"dropdown-menu\">";
        array_push($subnavigation,$submenu);
        while($row = $result->fetch_assoc()){
            $name = $row["name"];
            $link = $row["link"];
            $class = implode(" ",addClases($link));
            if($class){
                $submenuitem = "<li class=\"$class\">
                <a href=\"$link\">$name</a>
                </li>";
            }
            else{
                $submenuitem = "<li><a href=\"$link\">$name</a></li>";
            }
            array_push($subnavigation,$submenuitem);
        }
        //at the end of sub menu items, close the submenu <ul> tag
        array_push($subnavigation,"</ul>");
       
    }
    else{
        array_push($subnavigation,"<!--empty-->");
    }
    return $subnavigation;
    $connection->close();
}

function addIconToLink($link,$name,$showname,$showicon,$icon){
    if($showicon && $showname){
        if($icon){
            $linkwithicon = "<a href=\"$link\"><i class=\"$icon\"></i>$name</a>";
        }
    }
    elseif($showicon && !$showname){
        if($icon){
            $linkwithicon = "<a href=\"$link\"><i class=\"$icon\"></i></a>";
        }
    }
    elseif(!$showicon && $showname){
        $linkwithicon = "<a href=\"$link\">$name</a>";
    }
    return $linkwithicon;
}

function checkLogin(){
    if($_SESSION["user"]){
        return true;
    }
    else{
        return false;
    }
}

function checkAdmin(){
    if($_SESSION["admin"]){
        return true;
    }
}
?>

<nav class="navbar navbar-default main-nav">
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
            $nav = getNavigationItems(0,$dbconnection,$tablename,1);
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
<nav class="navbar user-nav">
    <div class="container-fluid">
        <?php
        //we render navigation that belongs in group 2
        $usernav = getNavigationItems(0,$dbconnection,$tablename,2);
        echo implode($usernav);
        ?>
    </div>
</nav>
