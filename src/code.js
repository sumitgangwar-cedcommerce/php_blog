 var filename="";
$(document).ready(function(){
    $("#bell1").click(function(){
        $(".login-logo").hide(1000);
    });
    $('.public-checkbox').click(function() {
        var $this = $(this);
        var changedToPublic = ! $this.hasClass('private');
        $this.val(changedToPublic ? 'Private' : 'Public');
        $(this).toggleClass('private');
      });
      $("#files").change(function() {
        filename = this.files[0].name;
       
      });
      setTimeout(function() {


          
        $('#edit_notification').fadeOut('fast');
    }, 1000);
    
    
});


function saveeditdata(post_id){

    
    var edittitle = $("#blogtitleid").val();
    var editcontent = $("#blogcontentid").val();
    var editstatus = $("#blogstatusid").val();
    $.ajax({
        url:"controller.php",
        type:"POST",
        data:{
            post_id:post_id,
            edittitle:edittitle,
            editcontent:editcontent,
            editstatus:editstatus,
            filename:filename
        },
        success: function(result){
            if(result==1){
           window.location.href="yourpost.php";
          }
        }

    })
}


