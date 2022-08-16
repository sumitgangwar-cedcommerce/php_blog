<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create your post</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <?php include "header.php"; ?>
  <center>  <div class="write-content">
        <form method="POST" action="controller.php" enctype="multipart/form-data" >
          <input required type="text" name="blogtitle" class="form-input title" placeholder="Title">&nbsp;&nbsp;<input type="text" class="public-checkbox" name="blogtype" value="Public"  ><br>
          <textarea required rows="10" name="blogcontent" cols="70" placeholder="Start writing about your post" class="text-long-content"></textarea><br>
          <input required type="file" name="img_upload" class="form-input" style="margin-top:3%;"><br>
          <input type="submit" name="submit_write_public" class="btn-public" value="Post ">


        </form>
    </div></center>
    <?php include "footer.php" ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="code.js"></script>
</body>
</html>