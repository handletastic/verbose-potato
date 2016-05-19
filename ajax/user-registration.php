<?php
session_start();
include_once("../includes/dbconnection.php");
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
    //check the tokens to see if the one in form matches the session variable "token"
    if($formtoken!=$_SESSION["token"]){
        $data["token"]="tokens do not match";
        returnErrorMessage($data,$errors,1,"session id does not match");
    }
    //sanitize the data ie remove any illegal characters
    $clean_email = filter_var($email,FILTER_VALIDATE_EMAIL);
    //validate the email address
    if(filter_var($clean_email,FILTER_VALIDATE_EMAIL)){
        //check the email against database if true then email already used
        if(checkEmailInDB($clean_email,$dbconnection)){
            $data["email"]="email already used";
            returnErrorMessage($data,$errors,2,"email is already in use");
        }
        //check the length of password -- minimum 8 characters
        //since it is a string, we use strlen() function
        if(strlen($password)<8){
            $data["password"]="password too short";
            returnErrorMessage($data,$errors,3,"password must be at least 8 characters");
        }
        else{
            //if all else is good, create the user
            addNewUser($email,$password,$dbconnection);
        }
    }
    else{
        //if email is invalid
        $data["email"]="email invalid";
        returnErrorMessage($data,$errors,4,"email address is invalid");
    }
}
else{
    //if no data was sent from the form
    returnErrorMessage($data,$errors,5,"no data received");
}

//------------Functions
//check if the email already exists
function checkEmailInDB($useremail,$connection){
    $query = "SELECT email FROM users WHERE email='$useremail'";
    $result = $connection->query($query);
    if($result->num_rows>0){
        return true;
        $connection->close();
    }
    else{
        return false;
        $connection->close();
    }
}
//function to add a new user
function addNewUser($email,$password,$connection){
    //hash password
    $hashed_password = password_hash($password,PASSWORD_DEFAULT);
    //generate date for the creation of the account
    $createdate = date("Y-m-d H:i:s");
    //generate id for the user
    $userid = generateUserId();
    
    $query = "INSERT INTO users (email,userid,password,active,created) VALUES('$email','$userid','$hashed_password','1','$createdate')";
    if($connection->query($query)){
        //if account creation is a success send the success message
        $data["success"]=true;
        $data["message"]="user account created";
        echo returnData($data,$errors);
        $connection->close();
    }
    else{
        returnErrorMessage($data,$errors,6,"user creation failed");
        $connection->close();
    }
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
    */
    $errors["code"] = $code;
    echo returnData($data,$errors);
    //if a data error occurs, stop the script from running
    exit();
}
//generate a unique user id
function generateUserId(){
    $prefix = "user";
    $userid = md5(uniqid($prefix,TRUE));
    return $userid;
}
?>