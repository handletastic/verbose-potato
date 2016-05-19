<?php
session_start();
include_once("../includes/dbconnection.php");
//session token
$token = $_SESSION["token"];
//store errors and error messages
$errors = array();
//store data
$data = array();
if(count($_POST)>0){
    $level = $_POST["level"];
    $group = $_POST["group"];
    $table = "pages";
    $navigationstring = implode("",getNavigationItems($level,$dbconnection,$table,$group));
    $navigation = stripslashes($navigationstring);
    $data["success"]=true;
    $data["navigation"]=$navigation;
    echo json_encode($data);
}
else{
    echo "no data";
}

function getNavigationItems($startlevel,$connection,$table,$group){
    $level=$startlevel;
    $navigation = array();
    //table name is defined in head.php
    $query = "SELECT * FROM `$table` 
    WHERE level='$level' 
    AND pagesgroup='$group' 
    AND published=1 
    ORDER BY showorder ASC";
    $navresult = $connection->query($query);
    if($navresult->num_rows>0){
        // $navstart = "<ul class=\"nav navbar-nav navbar-right\">";
        // array_push($navigation,$navstart);
        while($row = $navresult->fetch_assoc()){
            //the right hand side is the names of database columns
            $id = $row["id"];
            $name = $row["name"];
            $link = $row["link"];
            $pagetitle = $row["pagetitle"];
            $icon = $row["icon_name"];
            $showicon = $row["show_icon"];
            $showname = $row["show_name"];
            $needlogin = $row["needlogin"];
            $admin = $row["admin"];
            //get classes for the link
            if($needlogin==0 && $link!="login.php" && $link!="register.php"){
                $class = addClases($link);
                //if class is active (ie we are currently on this page)
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
                //close the navigation list item
                array_push($navigation,"</li>");
            }
            //only add these menuitem if user is logged in
            elseif($needlogin && $_SESSION["userid"] && $admin==0){
                $menuitem = "<li>".addIconToLink($link,$name,$showname,$showicon,$icon)."</li>";
                array_push($navigation,$menuitem);
            }
            elseif($needlogin && $admin && $_SESSION["userid"] && $_SESSION["admin"]){
                $menuitem = "<li>".addIconToLink($link,$name,$showname,$showicon,$icon)."</li>";
                array_push($navigation,$menuitem);
            }
            elseif($link=="login.php" && !$_SESSION["userid"]){
                $menuitem = "<li>".addIconToLink($link,$name,$showname,$showicon,$icon)."</li>";
                array_push($navigation,$menuitem);
            }
            elseif($link=="register.php" && !$_SESSION["userid"]){
                $menuitem = "<li>".addIconToLink($link,$name,$showname,$showicon,$icon)."</li>";
                array_push($navigation,$menuitem);
            }
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

function getCurrentPage(){
    $current = array();
    $current["url"] = basename($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $current["page"] = parse_url($current["url"])["path"];
    $current["file"] = basename($_SERVER['PHP_SELF']);
    $current["request"] = basename($_SERVER['REQUEST_URI']);
    return $current;
}
?>