<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include "header.php"; ?>
    <?php if(isset($_GET['action1'])){
        $id=$_GET['id'];
        $name=$_GET['name'];
        include "connection.php";
        $query ="SELECT * FROM `POST` where post_id='$id'";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_assoc($result); ?>
        <div style="background-color:#F0F2F5;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
     <?php   echo '<p id="name_of_detailblogger_post" >'.$name.'<i class="fa fa-twitter" style="float:right;margin-right:18vw;"  ></i><i class="fa fa-facebook" style="float:right;margin-right:2vw;" ></i><i class="fa fa-instagram" style="float:right;margin-right:2vw;" ></i></p>';
        
            foreach($result as $row){
                echo '<center><p id="title_detail">'.$row['blog_title'].'</p></center>
                      <center><img src='.$row['image'].' id="image_detail"></center>
                      <center><div style="background-color:#dbe1f1"><p id="content_detail">'.$row['content'].'</p></div></center>';
            


            }
    }?> 
      <?php include "footer.php"; ?>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="code.js"></script>
</body>
</html>