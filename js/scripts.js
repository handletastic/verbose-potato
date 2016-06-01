/*site wide javascript*/
// UI Elements
//define spinner
var spinner = '<i class="fa fa-spinner fa-spin spinner"></i>';
//alert for forms
var formalert = '<div class="alert alert-dismissible">'+
'<span class="message"></span>'+
'<button type="button" class="close" data-dismiss="alert">'+
'<span>&times;</span></button></div>';

var productalert ='<div class="alert alert-warning alert-dismissible" role="alert">'+
  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
  'No product found.</div>';
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
         removeMessage("#user-registration");
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
               updateNavigation(0,2,"user-nav");
               if(data.admin){
                  //if user is admin, redirect to admin page
                  window.location = "admin.php";
               }
            }
            else if(data.errors){
               message = showErrorCode(data.errors.code);
               showMessage("#user-login",false,message);
            }
         });
      }
      
   });
   $("#category-select").on("change",function(event){
      //console.log($(event.target).val());
      filterProducts(event);
   });
   $("#brand-select").on("change",function(event){
      filterProducts(event);
   });
   if($(".store-products").length){
      loadProducts();
   }
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
   var target = $(element).find(".alert");
   $(target).remove();
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
//this function relies on get-navigation.php in the ajax directory
function updateNavigation(navlevel,navgroup,navelement){
   var navdata = {
      'level' : navlevel,
      'group' : navgroup
   };
   $.ajax({
      type        : 'POST',
      url         : 'ajax/get-navigation.php',
      data        : navdata,
      dataType    : 'json',
      encode      : true
   })
   .done(function(data){
      if(data.success){
         console.log(data);
         var nav = data.navigation;
         elm = "."+navelement;
         $(elm).html(nav);
      }
   });
}

function loadProducts(){
   var usertoken = token;
   var ProductData = {
      'category' : 0,
      'brand' : 0,
      'token' : usertoken
   };
   console.log(ProductData);
   $.ajax({
      type        : 'POST',
      url         : 'ajax/get-products.php',
      data        : ProductData,
      dataType    : 'json',
      encode      : true
   })
   .done(function(data){
      if(data.success){
         console.log(data);
         $(".store-products").html("");
         var lg = data.products.length;
         for(i=0;i<lg;i++){
            renderProduct("store-products",data.products[i]);
         }
      }
      else{
         $(".store-products").html("");
         console.log(data);
         $(".store-products").append(productalert);
      }
   });
}
//this function is used to load products when filtering is used in the store
//this program depends on get-products.php in ajax directory
function filterProducts(evt){
   //toggleVisibility(".store-overlay");
   //get values of filters
   var usertoken = token;
   var SelectorsData = {
      'category' : $('#category-select option:selected').val(),
      'brand' : $('#brand-select option:selected').val(),
      'token' : usertoken
   };
   console.log(SelectorsData);
   $.ajax({
      type        : 'POST',
      url         : 'ajax/get-products.php',
      data        : SelectorsData,
      dataType    : 'json',
      encode      : true
   })
   .done(function(data){
      if(data.success){
         console.log(data);
         $(".store-products").html("");
         var lg = data.products.length;
         for(i=0;i<lg;i++){
            renderProduct("store-products",data.products[i]);
         }
      }
      else{
         $(".store-products").html("");
         console.log(data);
         $(".store-products").append(productalert);
      }
   });
}
function toggleVisibility(overlay){
   $(overlay).toggleClass("visible");
}

function renderProduct(elm,product){
   var container = $("[class='elm']");
   var id = "#"+product.productid;
   //path to the product image directory (the forward slash has to be escaped)
   var imagedir = 'products\/';
   //the product container
   var product = 
   '<div id="'+product.productid+'" class="col-md-4 col-xs-6 product-item">'+
   '<h4>'+product.productname+'</h4>'+
   '<a href="product-detail.php?id='+product.productid+'">'+
   '<img class="product-image" src="'+imagedir+'default.png" data-image="'+product.productimage+'"></a>'+
   '<div class="product-button-bar">'+
   '<button class="btn btn-default buy-btn" data-id="'+product.productid
   +'"><i class="fa fa-shopping-bag"></i>Buy It</button>'+
   '<button class="btn btn-default wish-btn" data-id="'+product.productid
   +'"><i class="fa fa-heart"></i>Fave It</button>'+
   '</div></div>';
   $(".store-products").append(product);
   var image=imagedir+$(id+" .product-image").data("image");
   setTimeout(function(){
     $(id+" img").attr("src",image); 
   },500);
}

