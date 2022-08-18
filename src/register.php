<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utils.css">
    
</head>
<body>
<div class="registernav"><?php include "header.php"; ?></div>
  <div class="register-content">
  <center>
    <p id="heading-before-register-table">We are <span class="wave" >&#128515;</span> you are joining us.</p>
    <div class="user-registration m-auto">
        <form  method="POST" action="controller.php" enctype="multipart/form-data" onsubmit="validateForm();">
        <table class="registration-table" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            
            <tr><td class="first-td-table">Name</td><td class="second-td-table"><input placeholder="Your Name" type="text" name="user" id="name" class="form-input" required></td></tr>
            <tr><td class="first-td-table">Email</td><td class="second-td-table"><input placeholder="Email address" type="email" name="email" id="email" class="form-input" required></td></tr>
            <tr><td class="first-td-table">Contact</td><td class="second-td-table"><input placeholder="### ### ####" type="number" name="contact" id="contact" class="form-input" required></td></tr>
            <tr><td class="first-td-table">Tag line</td><td class="second-td-table"><input placeholder="Eg:- Delivering technology" type="text" name="tagline" class="form-input" required></td></tr>
            <tr><td class="first-td-table">Upload Image</td><td class="second-td-table"><input type="file" name="img_upload" class="form-input"></td></tr>
            <tr><div style="color:red;"><?php echo $_SESSION['err3'] ?></div><td class="first-td-table">Password</td><td class="second-td-table"><input placeholder="Eg:- AA12ad@c" type="password" name="password" id="password" class="form-input" required></td></tr>
            <tr><td class="first-td-table">Confirm Password</td><td class="second-td-table"><input type="password" name="confirm_password" id="confirm_password"class="form-input" required></td></tr>
        </table>
        <input type="submit" name="submit_register" class="btn" value="Click to Register">
</form>
    </div>
</center>
</div>
<?php include "footer.php" ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="register.js"></script>


</body>
</html>
