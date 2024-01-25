$(document).ready(function() {

  // call datatable class
  $('#users').DataTable();


  $(".nav-item").removeClass("active");
  $(".nav-link").removeClass("active");

  // Check Admin Password is correct or not
  $("#current_password").keyup(function(){
      var current_password = $("#current_password").val();
     // alert (current_password);
     $.ajax({
     	type: 'post',
     	url: '/admin/check-admin-password',
     	data:{current_password:current_password},
     	success:function(resp){
     
     		if(resp=="false"){
               $("#check_password").html("<font color='red'>Current Password is Incorrect!</font>");
     		}else if(resp=="true"){
               $("#check_password").html("<font color='green'>Current Password is Correct!</font>");
     		}
     	},error:function(){
     		alert('Error');
     	}

     });
  })

  //update admin status
  $(document).on("click",".updateAdminStatus",function(){
    var status = $(this).children("i").attr("status");
    var admin_id = $(this).attr("admin_id");
    //alert(admin_id);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:'post',
      url:'/admin/update-admin-status',
      data:{status:status,admin_id:admin_id},
      success:function(resp){
       // alert(resp);
       if(resp['status']==0){
           $("#admin-"+admin_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline'  status='Inactive' ></i>");
       }else if(resp['status']==1){
           $("#admin-"+admin_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check'  status='Active' ></i>");
       }
      },error:function(){
        alert("Error");
      }

   })
  });

  //update section status
  $(document).on("click",".updateSectionStatus",function(){
    var status = $(this).children("i").attr("status");
    var section_id = $(this).attr("section_id");
    //alert(admin_id);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:'post',
      url:'/admin/update-section-status',
      data:{status:status,section_id:section_id},
      success:function(resp){
       // alert(resp);
       if(resp['status']==0){
           $("#section-"+section_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline'  status='Inactive' ></i>");
       }else if(resp['status']==1){
           $("#section-"+section_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check'  status='Active' ></i>");
       }
      },error:function(){
        alert("Error");
      }

   })
  });


  //update category status
  $(document).on("click",".updateCategoryStatus",function(){
    var status = $(this).children("i").attr("status");
    var category_id = $(this).attr("category_id");
    //alert(admin_id);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:'post',
      url:'/admin/update-category-status',
      data:{status:status,category_id:category_id},
      success:function(resp){
       // alert(resp);
       if(resp['status']==0){
           $("#category-"+category_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline'  status='Inactive' ></i>");
       }else if(resp['status']==1){
           $("#category-"+category_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check'  status='Active' ></i>");
       }
      },error:function(){
        alert("Error");
      }

   })
  });

  //update brand status
  $(document).on("click",".updateBrandStatus",function(){
    var status = $(this).children("i").attr("status");
    var brand_id = $(this).attr("brand_id");
    //alert(admin_id);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:'post',
      url:'/admin/update-brand-status',
      data:{status:status,brand_id:brand_id},
      success:function(resp){
       // alert(resp);
       if(resp['status']==0){
           $("#brand-"+brand_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline'  status='Inactive' ></i>");
       }else if(resp['status']==1){
           $("#brand-"+brand_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check'  status='Active' ></i>");
       }
      },error:function(){
        alert("Error");
      }

   })
  });

  //update user status
  $(document).on("click",".updateUserStatus",function(){
    var status = $(this).children("i").attr("status");
    var user_id = $(this).attr("user_id");
    //alert(admin_id);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:'post',
      url:'/admin/update-user-status',
      data:{status:status,user_id:user_id},
      success:function(resp){
       // alert(resp);
       if(resp['status']==0){
           $("#user-"+user_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline'  status='Inactive' ></i>");
       }else if(resp['status']==1){
           $("#user-"+user_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check'  status='Active' ></i>");
       }
      },error:function(){
        alert("Error");
      }

   })
  });


  //update dish status
  $(document).on("click",".updateDishStatus",function(){
    var status = $(this).children("i").attr("status");
    var dish_id = $(this).attr("dish_id");
    //alert(admin_id);
    $.ajax ({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:'post',
      url:'/admin/update-dish-status',
      data:{status:status,dish_id:dish_id},
      success:function(resp){
       // alert(resp);
       if(resp['status']==0){
           $("#dish-"+dish_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline'  status='Inactive' ></i>");
       }else if(resp['status']==1){
           $("#dish-"+dish_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check'  status='Active' ></i>");
       }
      },error:function(){
        alert("Error");
      }

   })
  });


   // confirm Deletion
   $(".confirmDelete").click(function(){
    var title = $(this).attr("title");
    if(confirm("Are you sure to delete this "+title+"?")){
      return true;
    }else{
      return false;
    }

   })

   //append categories level
   $("#section_id").change(function(){
      var section_id = $(this).val();
      $.ajax({
         headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
         type:'get',
         url: '/admin/append-categories-level',
         data:{section_id:section_id},
         success:function(resp){
          $("#appendCategoriesLevel").html(resp);
         },error:function(){
            alert("Error");
         }
      })
   });

    // Products Attributes Add/Remove Script
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><div style="height:10px"></div><input type="text" name="size[]" placeholder="Size" style="width: 120px"/>&nbsp;<input type="text" name="sku[]" placeholder="SKU" style="width: 120px"/>&nbsp;<input type="text" name="price[]" placeholder="Price" style="width: 120px"/>&nbsp;<input type="text" name="stock[]" placeholder="Stock" style="width: 120px"/>&nbsp;<a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
    
    


 });



 