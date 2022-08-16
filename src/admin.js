$(document).ready(function(){
    $("#user_m").click(function(){
       
        $.ajax({
            url:"controller.php",
            type:"POST",
            data:{
                user_m:'user_m'
            },
            success: function(result){
             $(".side_right_bar").css("display","none");
             $("#return_data").html(result);
            
             $(".admin_options").css("background-color","bisque");
             $("#user_m").css("background-color","lightgrey");
            }
    
        })
    })

    $("#blog_m").click(function(){
        
        $.ajax({
            url:"controller.php",
            type:"POST",
            data:{
                blog_m:'blog_m'
            },
            success: function(result){
             $(".side_right_bar").css("display","none");
             $("#return_data").html(result);
          
             $(".admin_options").css("background-color","bisque");
             $("#blog_m").css("background-color","lightgrey");
            }
    
        })
    })


    $("#pending_blog").click(function(){
        
        $.ajax({
            url:"controller.php",
            type:"POST",
            data:{
                pending_blog:'pending_blog'
            },
            success: function(result){
             $(".side_right_bar").css("display","none");
             $("#return_data").html(result);
          
             $(".admin_options").css("background-color","bisque");
             $("#pending_blog").css("background-color","lightgrey");
            }
    
        })
    })
    $(".add_new_user").click(function(){
        
        $.ajax({
            url:"controller.php",
            type:"POST",
            data:{
                add:'add'
            },
            success: function(result){
             $(".side_right_bar").css("display","none");
             $("#return_data").html(result);
          
           
            }
    
        })
    })








   


})

function changeSelect(id,value,table)
{  
    $.ajax({
            url:"controller.php",
            method:"POST",
            data:{
              id:id,
              table:table,
              value:value
            },
            success:function(data){
               
               
               
            }
        })


}
function read(postid)
{ 
    $.ajax({
            url:"controller.php",
            method:"POST",
            data:{
              postid:postid,
            
            },
            success:function(data){
             $(".side_right_bar").css("display","none");
             $("#return_data").html(data);
               
            }
        })


}
function Delete(deletepostid){
    $.ajax({
        url:"controller.php",
        method:"POST",
        data:{
             deletepostid:deletepostid,
           
             
        },
        success:function(data){
            $(".side_right_bar").css("display","none");
            $("#return_data").html(data);
     }
 
     })

};
function editUser(edituserid){
  
    $.ajax({
        url:"controller.php",
        method:"POST",
        data:{
             edituserid:edituserid,
        
        },
        success:function(data){
            $(".side_right_bar").css("display","none");
            $("#return_data").html(data);
     }
 
     })

};
function saveEditData(user_id){
   var name= $("#edited_name").val();
   var email =$("#edited_email").val();
   var contact =$("#edited_contact").val();
   var tagline =$("#edited_tagline").val();
   var password =$("#edited_password").val();
   $.ajax({
       url:"controller.php",
       method:"POST",
       data:{
           user_id:user_id,
           name:name,
           email:email,
           contact:contact,
           tagline:tagline,
           password:password
       },
       success:function(data){
        $(".side_right_bar").css("display","none");
        $("#return_data").html(data);
 }
   })

}





