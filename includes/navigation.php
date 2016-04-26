<?php
/*function to retrieve the current page loaded. we will use this to
determine which navigation items to be marked as "active" */
//set table name
$tablename = "pages";
function getNavigationItems($level,$connection,$table){
    $level=0;
    $navigation = array();
    $query = "SELECT * FROM `$table` WHERE parentid='$level' ORDER BY 'order' ASC";
    $navresult = $connection->query($query);
    if($navresult->num_rows>0){
        $navstart = "<ul class=\"nav navbar-nav navbar-right\">";
        array_push($navigation,$navstart);
        while($row = $navresult->fetch_assoc()){
            $id = $row["id"];
            $name = $row["name"];
            $link = $row["link"];
            $class = implode(" ",addClases($link));
            $dropdowntest = strpos($class,"dropdown");
            if($class=="active"){
                $menuitem = "<li class=\"$class\"><a href=\"$link\">$name</a>";
            }
            elseif($class=="dropdown" || $class=="active dropdown"){
                $menuitem = "<li class=\"$class\">
                <a class=\"dropdown-toggle\" 
                data-toggle=\"dropdown\" href=\"$link\">$name
                <span class=\"caret\"></span></a>";
            }
            else{
                $menuitem = "<li><a href=\"$link\">$name</a>";
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
        return $navigation;
    }
    else{
        //no result
    }
}

function addClases($link){
    $current = getCurrentPage();
    $classes = array();
    if($link==$current["url"] || $link==$current["page"] || $link==$current["file"]){
        array_push($classes,"active");
    }
    elseif($link=="#" || $link==""){
        array_push($classes,"dropdown");
    }
    return $classes;
}

function addAttributes($link){}

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
                $submenuitem = "<li class=\"$class\"><a href=\"$link\">$name</a></li>";
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
        array_push($subnavigation,"empty");
    }
    return $subnavigation;
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
            $nav = getNavigationItems(0,$dbconnection,$tablename);
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
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Admin</a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
</nav>