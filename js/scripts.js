/*site wide javascript*/
// UI Elements
//define spinner
var spinner = '<i class="fa fa-spinner fa-spin"></i>';
//alert for forms
var formalert = '<div class="alert alert-dismissible">'+
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
      //stop user from clicking twice
      if(submitting==false){
         
      }
      submitting=true;
      //get data from forms
      var formData = {
         'email'     : $('input[name=email]').val(),
         'password'  : $('input[name=password]').val(),
         'user-token': $('input[name=user-token]').val()
      };
      // console.log(formData);
      if(submitting==false){
         $.ajax({
            type        : 'POST',
            url         : 'ajax/user-registration.php',
            data        : formData,
            dataType    : 'json',
            encode      : true
         })
         .done(function(event){
            //do something when done
         })
         .fail(function(event){
            //do something if fails
         });
      }
   })
});

//functions
function addSpinner(event){
   $(event.target).find(".btn-re")
   $(this).find(".btn-register").append(spinner);
}