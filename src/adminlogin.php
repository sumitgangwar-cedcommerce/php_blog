<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logiin page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
</head>
<body >
    <div><?php include "header.php" ?></div>
    <div class="login-div">
        <div class="login-logo"><center><p id="log-logo-content"><br></p><i class="fa fa-bell wave" id="bell1" style="font-size:48px;color:red"></i></center></div>
        <div class="authentication">
            <div class="inner-authentication">
            <center>
                <span style="font-size:2vw;color:brown;"><b>Admin Login</b></span><br>
                <p style="font-size:1.5vw;color:red"> <?php echo $_SESSION['err1'] ?> </p>
                <form method="POST" action="controller.php">
                <input type="text" class="form-input form-gap" name="email" placeholder="Email"><br>
                <input type="password" class="form-input form-gap" name="password" placeholder="Password"><br>
                <input type="submit" name="admin_login_button" class="btnlogin" value="Login">
               
               
                </form>
            </center>
            </div>
        </div>
    </div>
    <?php include "footer.php" ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="code.js"></script>
</body>
</html>