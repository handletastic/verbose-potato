<?php
session_start();
include_once("../includes/dbconnection.php");
include_once("../includes/functions.php");
//session token
$token = $_SESSION["token"];
//store errors and error messages
$errors = array();
//store data
$data = array();
//if there is data posted ie there are post variables
if(count($_POST)>0){
    //create variables for data
    $email = $_POST["email"];
    $password = $_POST["password"];
    $formtoken = $_POST["user-token"];
    //check tokens
    if($token==$formtoken){
        //sanitise user's email. password is not sanitised as it is not used
        //in the query and auth could fail if any character is removed 
        //in the process
        $clean_email = filter_var($email,FILTER_SANITIZE_EMAIL);
        $query = "SELECT email,userid,password,active,admin FROM users WHERE email='$clean_email'";
        $result = $dbconnection->query($query);
        if($result->num_rows>0){
            //create variables from database data
            $dbdata = $result->fetch_assoc();
            //if the user account is not active send error back
            if($dbdata["active"]==false){
                returnErrorMessage($data,$errors,8,"account inactive");
            }
            //verify password
            if(password_verify($password,$dbdata["password"])){
                //set data for last login
                insertUserLoginDate($dbdata["email"],$dbconnection);
                //update user activity column to prevent immediate logout
                
                //create session variable
                $_SESSION["userid"]=$dbdata["userid"];
                if($dbdata["admin"]){
                    $_SESSION["admin"] = 1;
                    $data["admin"] = 1;
                }
                logActivity($dbconnection);
                $data["success"] = true;
                echo returnData($data,$errors);
            }
            else{
                returnErrorMessage($data,$errors,7,"authentication failed");
            }
            
        }
        else{
            returnErrorMessage($data,$errors,7,"authentication failed");
        }
    }
    else{
        returnErrorMessage($data,$errors,7,"authentication failed");
    }
}
else{
    exit();
}

//------------Functions


//function to update user login date
function insertUserLoginDate($email,$connection){
    $date = date("Y-m-d H:i:s");
    $query = "UPDATE users SET lastaccess='$date' WHERE email='$email'";
    $connection->query($query);
    //$connection->close();
}

//function to return data to ajax script
function returnData($data,$errors){
    $data["errors"]=$errors;
    return json_encode($data);
}
//function to return an error message
function returnErrorMessage($data,$errors,$code,$message){
    $data["success"]=false;
    $errors["message"] = $message;
    //error codes
    /*
    1=tokens not matching
    2=email already used
    3=password is too short
    4=email address is invalid
    5=no form data received
    6=user creation failed
    7=authentication failed
    8=account is inactive
    */
    $errors["code"] = $code;
    echo returnData($data,$errors);
    //if a data error occurs, stop the script from running
    exit();
}

?>