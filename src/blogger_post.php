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
<body style="background-color:#cadbe6;">
<div style="background-color:white"><?php include "header.php"; ?></div>
    <div >
    <?php if(isset($_GET['action'])){
        $status1="PUBLIC";
        $status2="Approved";
        $id=$_GET['id'];
        include "connection.php";
        $query ="SELECT * FROM `POST` where status ='$status1' and user_id='$id' and status_by_admin ='$status2'  ORDER BY post_id DESC ";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_assoc($result);
        $query1="SELECT name,image FROM Users where user_id='$id'";
           $result1=mysqli_query($conn,$query1);
           $row1=mysqli_fetch_assoc($result1); ?>
          
    <?php    echo '<p id="name_of_blogger_post" >'.$row1['name'].'</p>';
         foreach($result as $row){
           
           $str=substr($row['content'],0,200);
           $str1= "$str...";
           echo '
           

           <a href="detailaboutblog.php?action1=detail&id='.$row['post_id'].'&name='.$row1['name'].'"<div class="display_blog_sql" >
            <div id="id_of_blog_content" class="display_content_sql"><p id="id_of_blog_title">'.$row['blog_title'].'</p>'.$str1.'</div>
            <div class="content_image_sql"><span id="id_of_publishing_time_post"> Published At: '.$row['published_at'].'</span><img src='.$row['image'].' id="image_of_blog_post"></div>
            </div></a><hr>';

          } ?>
          </div>
  <?php  }?>
  <?php include "footer.php"; ?>
</body>
</html>