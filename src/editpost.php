<?php
session_start();
if(isset($_GET['action2'])){
    $id=$_GET['id'];
    include "connection.php";
    $query = "SELECT * FROM POST WHERE post_id = '$id'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
}
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
    <?php
      include "header.php";
    ?>
      <center><div class="write-content">
        <form method="POST"  enctype="multipart/form-data" >
          <input type="text" name="blogtitle" id="blogtitleid" class="form-input title" placeholder="Title" value="<?php echo $row['blog_title'] ?>">&nbsp;&nbsp;<input type="text" style="font-size:1vw;" id="blogstatusid" class="public-checkbox" name="blogtype" value="<?php echo $row['status'] ?>" readable ><br>
          <textarea rows="10" name="blogcontent" id="blogcontentid" cols="70" placeholder="Start writing about your post" class="text-long-content"><?php echo $row['content'] ?></textarea><br>
          <img src="<?php echo $row['image'] ?>" style="height:10vw;width:10vw;">
          <label for="files" class="btn">Change Image</label>
          <input id="files" type="file" id="blogimageid" name="img_upload" class="form-input" style="Visibility:hidden;" ><br>
          <input type="submit" name="submit-edit-public" class="btn-public" id="<?php echo $id; ?>" value="Save" onclick="saveeditdata(this.id);">


        </form>
    </div></center>
    <?php include "footer.php" ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="code.js"></script>
</body>
</html>