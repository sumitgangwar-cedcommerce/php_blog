// $(document).ready(function() {
//     var urls = ['image/1.jpg', 'image/2.jpg', 'image/3.jpg', 'image/4.jpg'];
  
//     var cout = 1;
//     $('.register-content').css('background-image', 'url("' + urls[0] + '")');
//     setInterval(function() {
//       $('.register-content').css('background-image', 'url("' + urls[cout] + '")');
//       cout == urls.length-1 ? cout = 0 : cout++;
//     }, 4000);
  
//   });


  

function validateForm(){
 var passwordValidationExpression = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
 var emailValidationExpression = /\S+@\S+\.\S+/;
 var nameValidationExpression = /^[a-zA-Z]+$/;
 var name = document.getElementById("name").value;
 var email = document.getElementById("email").value;
 var contact = document.getElementById("contact").value;
 var password = document.getElementById("password").value;
 var confirm_password = document.getElementById("confirm_password").value;
 


 if((name=="") || (password=="") || (confirm_password=="") || (contact=="") || (email=="") || (address=="")){
       return false;
   }
 if(!(name.match(nameValidationExpression))){
     return false;
 }
 if(!(password.match(passwordValidationExpression))){
      return false;
 }
 if (confirm_password!=password){
     return false;
 }
 if((isNaN(contact)) || (!(contact.length==10))){
     return false;
 }
 if(!(email.match(emailValidationExpression))){ 
     return false;
 }
 return true;

};

