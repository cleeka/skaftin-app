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