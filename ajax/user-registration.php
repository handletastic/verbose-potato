<?php
//session token
$token = $_SESSION["token"];
//store errors and error messages
$errors = array();
//store data
$data = array();
//variables received from the form
$email = $_POST["email"];
$password = $_POST["password"];
$formtoken = $_POST["token"];
//check if tokens match between session and one sent from form
if($formtoken!=$token){
    $errors["token"]="invalid request token";
}
else if($token === $formtoken){
    //if tokens match check to make sure that emails and password are not blank
    if(!empty($email) && !empty($password)){
        //validate the email
        if(filter_var($s_email,FILTER_VALIDATE_EMAIL)){
            //if email validation is true, sanitize the email
            $clean_email = filter_var($email,FILTER_SANITIZE_EMAIL);
            if($clean_email==$email){
                //if sanitised email is the same as the one sent from form
                //CHECK if it's already in database
                
            }
        }
        else{
            $errors["email"]="email address is invalid";
        }
    }
    else if(empty($password)){
        $errors["password"]="password cannot be blank";
    }
    else if(empty($email)){
        $errors["email"]="email cannot be blank";
    }
    
}
echo json_encode($data);

function checkEmailInDB($useremail){
    $query = "SELECT email FROM users WHERE email='$useremail'";
    $result = $dbconnection->query($query);
    if($result->num_rows>0){
        return true;
        $dbconnection->close();
    }
    else{
        return false;
        $dbconnection->close();
    }
}
?>