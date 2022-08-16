<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <?php include "header.php"; ?>
    <?php
        include "connection.php";
        $query1 = "SELECT COUNT(post_id) FROM POST WHERE user_id=".$_SESSION['userid']."";
        $result=mysqli_query($conn,$query1);
        $count = mysqli_fetch_array($result);
        $total= $count[0];
       
        $query = "SELECT * FROM Users WHERE user_id=".$_SESSION['userid']."";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_assoc($result);
        echo '<div class="complete_detail">
              <div class=" user_image">
              <img src='.$row['image'].' id="user_image"> 
             </div>
             <div class="user_detail">
             <span>Your Name:  '.$row['name'].'</span><br>
             <span>Your Email:  '.$row['email'].'</span><br>
             <span>Your Contact:  '.$row['contact'].'</span><br>
             <span>Your Password:  '.$row['password'].'</span><br>
             <span>Your Joined At:  '.$row['date_of_joining'].'</span><br>
             <span>Total number of post:  '.$total.'</span><br>
             </div>
             </div>';
             ?>
<?php include "footer.php" ?>
</body>
</html>