$(document).ready(function(){
	$("#getPrice").change(function(){
      var size = $(this).val();
      var product_id = $(this).attr("product-id");
      $.ajax({
            	headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
            	url:'/get-product-price',
            	data:{size:size,product_id:product_id},
            	type:'post',
      	        success:function(resp){
            		
                if(resp['discount']>0){
                  $(".getAttributePrice").html("<div class='product-price'><span>R"+resp['final_price']+"</span><del>R"+resp['product_price']+"</del></div>");
                                          }else{
                  $(".getAttributePrice").html("<div class='product-price'><span>R"+resp['final_price']+"</span></div>");
                }
            	},error:function(){
            		alert("Error");
            	}
          });
	  });
    
    // update cart items qty
     $(document).on('click','.updateCartItem',function(){
       if($(this).hasClass('inc qtybutton')){
         // get qty
         var quantity = $(this).data('qty');
         // increase the qty by 1
         new_qty = parseInt(quantity) + 1;
        // alert(new_qty);
       }
       if($(this).hasClass('dec qtybutton')){
         // get qty
         var quantity = $(this).data('qty');
         // check qty is atleast 1
         if(quantity<=1){
          alert("Item must be more than 1");
          return false;
         }
         // increase the qty by 1
         new_qty = parseInt(quantity) - 1;
         // alert(new_qty);
       }
       var cartid = $(this).data('cartid');
       $.ajax({
        headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
        data:{cartid:cartid,qty:new_qty},
        url:'/cart/update',
        type:'post',
        success:function(resp){
          if(resp.status==false){
            alert(resp.message);
          }
          $("#appendCartItems").html(resp.view);
        },error:function(){
          alert("Error");
        }

       });
      });

    // delete cart item
    $(document).on('click','.deleteCartitem',function(){
      var cartid = $(this).data('cartid');
      var result = confirm("Are you sure to delete this Cart Item?");
      if(result){
         $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{cartid:cartid},
        url:'/cart/delete',
        type:'post',
        success:function(resp){
          $("#appendCartItems").html(resp.view);
        },error:function(){
          alert("Error");
        }

      })

      }

    });
     
     // Account form validation
    $("#accountForm").submit(function(){
       $(".loader").show();
       var formdata = $(this).serialize();
       $.ajax({
          url:"/user/account",
          type:"POST",
          data:formdata,
          success:function(resp){
            if(resp.type=="error"){
               $(".loader").hide();
               $.each(resp.errors,function(i,error){
                  $("#account-"+i).attr('style','color:red');
                  $("#account-"+i).html(error);
               setTimeout(function(){
                $("#account-"+i).css({
                  'display':'none'
                });
               },3000);
               });
            }else if(resp.type=="success"){
              // alert(resp.message);
               $(".loader").hide();
               $("#account-success").attr('style','color:green');
               $("#account-success").html(resp.message);
           
            }
            
          },error:function(){
            alert("Error");
          }

       })
    });

    // Password form validation
    $("#passwordForm").submit(function(){
       $(".loader").show();
       var formdata = $(this).serialize();
       $.ajax({
          url:"/user/update-password",
          type:"POST",
          data:formdata,
          success:function(resp){
            if(resp.type=="error"){
               $(".loader").hide();
               $.each(resp.errors,function(i,error){
                  $("#password-"+i).attr('style','color:red');
                  $("#password-"+i).html(error);
               setTimeout(function(){
                $("#password-"+i).css({
                  'display':'none'
                });
               },3000);
               });
            }else if(resp.type=="incorrect"){
               $(".loader").hide();
                  $("#password-error").attr('style','color:red');
                  $("#password-error").html(resp.message);
               setTimeout(function(){
                $("#password-error").css({
                  'display':'none'
                });
               },3000);
            }else if(resp.type=="success"){
              // alert(resp.message);
               $(".loader").hide();
               $("#password-success").attr('style','color:green');
               $("#password-success").html(resp.message);
           
            }
            
          },error:function(){
            alert("Error");
          }

       })
    });

     // register form validation
    $("#registerForm").submit(function(){
       $(".loader").show();
       var formdata = $(this).serialize();
       $.ajax({
          url:"/user/register",
          type:"POST",
          data:formdata,
          success:function(resp){
            if(resp.type=="error"){
               $(".loader").hide();
               $.each(resp.errors,function(i,error){
                  $("#register-"+i).attr('style','color:red');
                  $("#register-"+i).html(error);
               setTimeout(function(){
                $("#register-"+i).css({
                  'display':'none'
                });
               },3000);
               });
            }else if(resp.type=="success"){
              // alert(resp.message);
               $(".loader").hide();
               $("#register-success").attr('style','color:green');
               $("#register-success").html(resp.message);
           
            }
            
          },error:function(){
            alert("Error");
          }

       })
    });

    // login form validation
    $("#loginForm").submit(function(){
       var formdata = $(this).serialize();
       $.ajax({
          url:"/user/login",
          type:"POST",
          data:formdata,
          success:function(resp){
            if(resp.type=="error"){
               $.each(resp.errors,function(i,error){
                  $("#login-"+i).attr('style','color:red');
                  $("#login-"+i).html(error);
               setTimeout(function(){
                $("#register-"+i).css({
                  'display':'none'
                });
               },3000);
               });
            }else if(resp.type=="incorrect"){
              // alert(resp.message);
              $("#login-error").attr('style','color:red');
              $("#login-error").html(resp.message);
             }else if(resp.type=="inactive"){
              // alert(resp.message);
              $("#login-error").attr('style','color:red');
              $("#login-error").html(resp.message);
            }else if(resp.type=="success"){
              window.location.href = resp.url;
            }    
          },error:function(){
            alert("Error");
          }

       })
    });
    
    
      // forgot password form validation
    
    
    
    $(document).on('click','.editAddress',function(){
      var addressid = $(this).data("addressid");
      $.ajax({
          headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
        data:{addressid:addressid},
        url:'/get-delivery-address',
        type:'post',
        success:function(resp){
         $("#collapseOne").removeClass("collapse");
         // $(".newAddress").hide();
         $(".deliveryText").text("Edit Delivery Address");
         $('[name=delivery_id]').val(resp.address['id']);
         $('[name=delivery_name]').val(resp.address['name']);
         $('[name=delivery_address]').val(resp.address['address']);
         $('[name=delivery_city]').val(resp.address['city']);
         $('[name=delivery_state]').val(resp.address['state']);
         $('[name=delivery_country]').val(resp.address['country']);
         $('[name=delivery_pincode]').val(resp.address['pincode']);
         $('[name=delivery_mobile]').val(resp.address['mobile']);
        },error:function(){
          alert("Error");
        }

      });
    });

    //save delivery address
    $(document).on('submit',"#addressAddEditForm",function(){
      var formdata = $("#addressAddEditForm").serialize();
      $.ajax({
        url: '/save-delivery-address',
        type: 'post',
        data:formdata,
        success:function(resp){
          $("#deliveryAddresses").html(resp.view);
          window.location.href = "checkout";
        }, error:function(){
            alert("Error");
        }
      });
    })
    
    
     // forgot password form validation for Cooks or Vendor
    $("#forgotForm").submit(function(){
       $(".loader").show();
       var formdata = $(this).serialize();
       $.ajax({
          url:"/vendor/forgot-password",
          type:"POST",
          data:formdata,
          success:function(resp){
            if(resp.type=="error"){
               $(".loader").hide();
               $.each(resp.errors,function(i,error){
                  $("#forgot-"+i).attr('style','color:red');
                  $("#forgot-"+i).html(error);
               setTimeout(function(){
                $("#forgot-"+i).css({
                  'display':'none'
                });
               },3000);
               });
            }else if(resp.type=="success"){
              // alert(resp.message);
               $(".loader").hide();
               $("#forgot-success").attr('style','color:green');
               $("#forgot-success").html(resp.message);
           
            }
            
          },error:function(){
            alert("Error");
          }

       })
    });



    // remove delivery address
    $(document).on('click','.removeAddress',function(){
      if(confirm("Are you sure to remove this?")){
      var addressid = $(this).data("addressid");
      $.ajax({
          headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
        url:'/remove-delivery-address',
        type:'post',
        data:{addressid:addressid},
        success:function(resp){
          $("#deliveryAddresses").html(data.view);
          window.location.href = "checkout";
        },error:function(){
          alert("Error");
        }
       });
     }
  });
  

});