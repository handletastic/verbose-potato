/*site wide javascript*/
// UI Elements
//define spinner
var spinner = '<i class="fa fa-spinner fa-spin spinner"></i>';
//alert for forms
var formalert = '<div class="alert alert-dismissible">'+
'<span class="message"></span>'+
'<button type="button" class="close" data-dismiss="alert">'+
'<span>&times;</span></button></div>';
//submit variable to stop double clicking
var submitting = false;
$(document).ready(function(){
   //------------------------------------user registration form
   //when the register button is clicked
   $("#user-registration").on("submit",function(event){
      //stop form from navigating
      event.preventDefault();
      //get data from forms
      var formData = {
         'email'     : $('input[name=email]').val(),
         'password'  : $('input[name=password]').val(),
         'user-token': $('input[name=user-token]').val()
      };
      if(submitting==false){
         addSpinner(event);
         submitting=true;
         $.ajax({
            type        : 'POST',
            url         : 'ajax/user-registration.php',
            data        : formData,
            dataType    : 'json',
            encode      : true
         })
         .done(function(data){
            //do something when done
            //remove the spinner
            removeSpinner(event);
            //set submitting to false
            submitting = false;
            //check what comes back
            if(data.success){
               //add alert to the form
               showMessage("#user-registration",true,"your account has been created,why not go shopping?");
               //wait 10 seconds and remove the message
               //setTimeout(function(){removeMessage("#user-registration")},5000);
            }
            else if(data.errors){
               message = showErrorCode(data.errors.code);
               showMessage("#user-registration",false,message);
            }
         });
      }
   });
   // ------------------------------------------user login form
   $("#user-login").on("submit",function(event){
      event.preventDefault();
      var formData = {
         'email'     : $('input[name=email]').val(),
         'password'  : $('input[name=password]').val(),
         'user-token': $('input[name=user-token]').val()
      };
      if(submitting==false){
         addSpinner(event);
         submitting=true;
         $.ajax({
            type        : 'POST',
            url         : 'ajax/user-login.php',
            data        : formData,
            dataType    : 'json',
            encode      : true
         })
         .done(function(data){
            removeSpinner(event);
            submitting = false;
            if(data.success){
               //add alert to the form
               showMessage("#user-login",true,"welcome back!");
               
            }
            else if(data.errors){
               message = showErrorCode(data.errors.code);
               showMessage("#user-login",false,message);
            }
         });
      }
      
   });
});

//functions
function addSpinner(event){
   $(event.target).find(".btn").append(spinner);
}

function removeSpinner(event){
   $(event.target).find(".spinner").remove();
}

function showMessage(element,success,message){
   $(element).append(formalert);
   if(success){
      $(".message").parent(".alert").addClass("alert-success");
   }
   else{
      $(".message").parent(".alert").addClass("alert-warning");
   }
   $(".message").html(message);
}

function removeMessage(element){
   var target = $(element).parents().find(".alert");
   $(target).addClass("close").on("transitionend",function(){
      $(target).remove();
   });
}

function showErrorCode(code){
   //use error codes from user-registration.php
   switch(code){
      case 1:
         message = "tokens not matching";
         return message;
         break;
      case 2:
         message = "that email address is already used, would you like to"+"<a href='password-reset.php'>"+" reset"+"</a> the password instead?";
         return message;
         break;
      case 3:
         message = "password needs to be 8 characters or more";
         return message;
         break;
      case 4:
         message = "email address is invalid";
         return message;
         break;
      case 5:
         message = "no form data received";
         return message;
         break;
      case 6:
         message = "sorry, account creation failed";
         return message;
         break;
      case 7:
         message = "authentication failed";
         return message;
      case 8:
         message = "your account has been deactivated";
         return message;
      default:
         break;
   }
}