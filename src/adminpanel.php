<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
</head>
<body>
    <div class="admin_header"><center><p>ADMIN PANEL</p></center></div>
    <div class="main_div_panel">
        <div class="side_left_bar">
            <p class="admin_options" id="first"><a href="adminpanel.php">Dash Board</a></p><br>
            <p class="admin_options" id="user_m" onclick="usermanagement();">User Management</p><br>
            <p class="admin_options" id="blog_m" onclick="blogmanagement();">Blog Management</p><br>
            <p class="admin_options" id="pending_blog" onclick="pendingBlog();">Pending Blog status</p><br>
            <p class="admin_options"><a href="logoutadmin.php">Logout</a></p><br>

        </div>
        <div class="side_right_bar">
            <div class="total_no_of_users">
                <?php  
                     include "connection.php";
                     $query1 = "SELECT COUNT(user_id) FROM Users ";
                     $result=mysqli_query($conn,$query1);
                     $count = mysqli_fetch_array($result);
                     $total= $count[0];
                     echo"<p style='margin-top:5vw;margin-left:2vw;font-size:1.5vw;'>Total Users: $total</p>";
                ?>
            </div>
            <div class="total_no_of_post">
            <?php  
                     include "connection.php";
                     $query1 = "SELECT COUNT(post_id) FROM POST ";
                     $result=mysqli_query($conn,$query1);
                     $count = mysqli_fetch_array($result);
                     $total= $count[0];
                     echo"<p style='margin-top:5vw;margin-left:2vw;font-size:1.5vw;'>Total Post: $total</p>";
                ?>
            </div>
            <div class="total_no_of_pending_post">
            <?php  
                     include "connection.php";
                     $query1 = "SELECT COUNT(post_id) FROM POST where status_by_admin='Pending' AND status='PUBLIC' ";
                     $result=mysqli_query($conn,$query1);
                     $count = mysqli_fetch_array($result);
                     $total= $count[0];
                     echo"<p style='margin-top:5vw;margin-left:2vw;font-size:1.5vw;'>Pending Post: $total</p>";
                ?>
            </div>
            <!-- <div class="add_new_user">Add New User</div> -->
           
        </div>
        <div id="return_data"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="admin.js"></script>  
    
</body>
</html>