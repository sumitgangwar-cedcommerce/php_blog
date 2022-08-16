<?php
session_start();
$_SESSION['edit']="";
$_SESSION['err'] = '';
$_SESSION['err1'] = '';

if(isset($_POST['submit_register']))
  { 
   include "connection.php";

   $img_name = $_FILES['img_upload']['name'];
   $tmp_img_name = $_FILES['img_upload']['tmp_name'];
   $folder='upload/';
   move_uploaded_file($tmp_img_name,$folder.$img_name);
   $image=$folder.$img_name;

   $user_name=$_POST['user'];
   $user_email=$_POST['email'];
   $user_contact=$_POST['contact'];
   $tag_line=$_POST['tagline'];
   $password = $_POST['password'];
   $name=$_POST['user'];

   $role = 'user';
   $query="INSERT INTO `Users`(`name`, `email`, `contact`, `tagline`, `password`, `date_of_joining`, `image`,`role`) VALUES ('$user_name','$user_email','$user_contact','$tag_line','$password',NOW(),'$image','$role')";
   $result=mysqli_query($conn,$query);
   header("Location:login.php");
}


if(isset($_POST['login_button']))
 { 
   include "connection.php";     
   $email= $_POST['email'];
   $password=$_POST['password'];
   $role="user";
  
   $query = "SELECT * FROM Users WHERE email = '$email' and password = '$password' and role ='$role'";
   $result = mysqli_query($conn,$query);
   $count = mysqli_num_rows($result);
   $row = mysqli_fetch_assoc($result);
    if($count == 1) {
      header("Location:index.php"); 
      $_SESSION['err'] = '';
      $_SESSION['name']= $row['name'];
      $_SESSION['userid']= $row['user_id'];
    }
    else{
      header("Location:login.php"); 
      $_SESSION['err'] = '*Invalid email or password';
    }
   

 }

if(isset($_POST['admin_login_button']))
{ 
  include "connection.php";     
  $email= $_POST['email'];
  $password=$_POST['password'];
  $role="admin";
  $query = "SELECT * FROM Users WHERE email = '$email' and password = '$password' and role='$role'";
  $result = mysqli_query($conn,$query);
  $count = mysqli_num_rows($result);
  $row = mysqli_fetch_assoc($result);
   if($count == 1) {
    $_SESSION['admin']= $row['name'];
     header("Location:adminpanel.php");
     $_SESSION['err1'] = '';
   }
   else{
    header("Location:adminlogin.php");
    $_SESSION['err1'] = '*Invalid email or password';
   }
   

}
 if(isset($_POST['submit_write_public'])){
  
   include "connection.php";

   $img_name = $_FILES['img_upload']['name'];
   $tmp_img_name = $_FILES['img_upload']['tmp_name'];
   $folder='upload/';
   move_uploaded_file($tmp_img_name,$folder.$img_name); 
   $image=$folder.$img_name;

   $id=$_SESSION['userid'];
   $blogtitle=$_POST['blogtitle'];
   $blogtype=$_POST['blogtype'];
   $blogcontent=$_POST['blogcontent'];
   $status_by_admin='Pending';
   $query="INSERT INTO `POST`( `user_id`, `status`, `content`, `image`, `published_at`,  `blog_title`,`status_by_admin`) VALUES ('$id','$blogtype','$blogcontent','$image',NOW(),'$blogtitle','$status_by_admin')";
   $result=mysqli_query($conn,$query);
   header("Location:yourpost.php");

 }
 if(isset($_POST['edittitle'])){
  $_SESSION['edit']=$_SESSION['name'];
  include "connection.php";
  $post_id=$_POST['post_id'];
  $blogtitle=$_POST['edittitle'];
  $blogtype=$_POST['editstatus'];
  $blogcontent=$_POST['editcontent'];
  $img_name = $_POST['filename'];
  $tmp_img_name = $_FILES['img_upload']['tmp_name'];
  $folder ='upload/';
  move_uploaded_file($tmp_img_name,$folder.$img_name);
  $image = $folder.$img_name;

  $status_by_admin='Pending';
  if($image!=""){
  $query="UPDATE `POST` SET `status`='$blogtype',`content`='$blogcontent',`image`='$image',`edited_at`=NOW(),`blog_title`='$blogtitle',`status_by_admin`='$status_by_admin' WHERE post_id='$post_id'";
  $result=mysqli_query($conn,$query);
   }
  

  else{
    $query="UPDATE `POST` SET `status`='$blogtype',`content`='$blogcontent',`edited_at`=NOW(),`blog_title`='$blogtitle',`status_by_admin`='$status_by_admin' WHERE post_id='$post_id'";
    $result=mysqli_query($conn,$query);
  }
   echo 1;

  }


  if(isset($_POST['user_m'])){
    include "connection.php";
    $query = "SELECT * FROM Users where user_id != 5";
    $result=mysqli_query($conn,$query);
   
    $txt.="<table><thead><th>User Id</th><th>Image</th><th>User Name</th><th>Email</th><th>Contact</th><th>Tagline</th><th>Password</th><th>Date Of Joining</th><th>Role</th><th>Action</th></thead>";
    foreach($result as $row){
      if($row['role']=='user'){
      $txt.='<tr><td>'.$row['user_id'].'</td><td><img class="img_user_class" src='.$row['image'].'></td><td>'.$row['name'].'</td><td>'.$row['email'].'</td><td>'.$row['contact'].'</td><td>'.$row['tagline'].'</td><td>'.$row['password'].'</td><td>'.$row['date_of_joining'].'</td><td><select id='.$row["user_id"].' class="selectdrop" name="status" onchange="changeSelect(this.id,this.value,0)">
       <option value="user">User</option>
       <option value="admin">Admin</option>
      </select></td><td><i class="fa fa-edit edituser" id='.$row['user_id'].' onclick="editUser(this.id);"></i></td></tr>';
      }
      if($row['role']=='admin'){
        $txt.='<tr><td>'.$row['user_id'].'</td><td><img class="img_user_class" src='.$row['image'].'></td><td>'.$row['name'].'</td><td>'.$row['email'].'</td><td>'.$row['contact'].'</td><td>'.$row['tagline'].'</td><td>'.$row['password'].'</td><td>'.$row['date_of_joining'].'</td><td><select id='.$row["user_id"].' class="selectdrop" name="status" onchange="changeSelect(this.id,this.value,0)">
        <option value="admin">User</option>
        <option value="user">Admin</option>
       </select></td><td><i class="fa fa-edit edituser" id='.$row['user_id'].' onclick="editUser(this.id);"></i></td></tr>';
      }
    }
    $txt.="</table>";
    echo $txt;
  }



  if(isset($_POST['blog_m'])){
    $status="PUBLIC";
    include "connection.php";
    $query = "SELECT * FROM POST where status='$status'";
    $result=mysqli_query($conn,$query);
   
    $txt.="<table id='myTable'><thead><th>Post Id</th><th>User Id</th><th>Status</th><th>Image</th><th>Published At</th><th>Blog Title</th><th>Status By Admin</th><th>Last Edit</th><th>Action</th></thead>";
    foreach($result as $row){
      if($row['status_by_admin']=="Pending"){
      $txt.='<tr><td>'.$row['post_id'].'</td><td>'.$row['user_id'].'</td><td>'.$row['status'].'</td><td><img src='.$row['image'].' class="img_user_class"></td><td>'.$row['published_at'].'</td><td>'.$row['blog_title'].'</td><td><select id='.$row["post_id"].' class="selectdrop" name="status" onchange="changeSelect(this.id,this.value,1)">
      <option value="Pending">Pending</option>
      <option value="Approved">Approved</option>
    
    </select></td><td>'.$row['edited_at'].'</td><td><i class="fa fa-trash-o deleteuser" id='.$row['post_id'].' onclick="Delete(this.id);" style="font-size:2vw;"></i></td></tr>';
      }
      if($row['status_by_admin']=="Approved"){
        $txt.='<tr><td>'.$row['post_id'].'</td><td>'.$row['user_id'].'</td><td>'.$row['status'].'</td><td><img src='.$row['image'].' class="img_user_class"></td><td>'.$row['published_at'].'</td><td>'.$row['blog_title'].'</td><td><select id='.$row["post_id"].' class="selectdrop" name="status" onchange="changeSelect(this.id,this.value,1)">
        <option value="Approved">Approved</option>
        <option value="Pending">Pending</option>
    
      </select></td><td>'.$row['edited_at'].'</td><td><i class="fa fa-trash-o deleteuser" id='.$row["post_id"].' onclick="Delete(this.id);" style="font-size:2vw;"></i></td></tr>';
        }
       
    }
    $txt.="</table>";
  
    echo $txt;
  }


  if(isset($_POST['id'])){
    $select =$_POST['value'];
    $id=$_POST['id'];
    $table=$_POST['table'];
    include "connection.php";
    if($table==1){
      $query="UPDATE `POST` SET `status_by_admin`='$select' WHERE post_id='$id'";
      $result=mysqli_query($conn,$query);
    }
    if($table==0){
      $query="UPDATE `Users` SET `role`='$select' WHERE user_id='$id'";
      $result=mysqli_query($conn,$query);
    }
    
  }

  if(isset($_POST['pending_blog'])){
    $status="Pending";
    $status1="PUBLIC";
    include "connection.php";
    $query = "SELECT * FROM POST where  status='$status1' AND status_by_admin='$status'";
    $result=mysqli_query($conn,$query);
    
   
    $txt.="<table id='myTable'><thead><th>Post Id</th><th>Status</th><th>Published At</th><th>Blog Title</th><th>Status By Admin</th><th>Last Edit</th><th>Content</th></thead>";
    foreach($result as $row){
     
      $txt.='<tr><td>'.$row['post_id'].'</td><td>'.$row['status'].'</td><td>'.$row['published_at'].'</td><td>'.$row['blog_title'].'</td><td><select id='.$row["post_id"].' class="selectdrop" name="status" onchange="changeSelect(this.id,this.value,1)">
      <option value="Pending">Pending</option>
      <option value="Approved">Approved</option>
    
    </select></td><td>'.$row['edited_at'].'</td><td><input type="button" id='.$row['post_id'].' onclick ="read(this.id);" value="click to read"></td></tr>';
      }
    
    
    $txt.="</table>";
  
    echo $txt;
  }



  if(isset($_POST['postid'])){
    
    $post_id=$_POST['postid'];
    include "connection.php";
    $query="SELECT * FROM `POST` WHERE post_id='$post_id'";
    $result=mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    echo '<center><div style="height:10vw;width:70vw;margin-left:3vw;margin-top:2vw;font-size:1.5vw;">'.$row['content'].'</div</center>';
    
  }

  if(isset($_POST['deletepostid'])){
        include "connection.php";
        $id=$_POST['deletepostid'];
        $sql = "DELETE FROM `POST` where post_id='$id'";
        $result = mysqli_query($conn,$sql);
        $query1 = "SELECT * FROM POST";
        $result1=mysqli_query($conn,$query1);
   
        $txt.="<table id='myTable'><thead><th>Post Id</th><th>User Id</th><th>Status</th><th>Image</th><th>Published At</th><th>Blog Title</th><th>Status By Admin</th><th>Last Edit</th><th>Action</th></thead>";
        foreach($result1 as $row){
          if($row['status_by_admin']=="Pending"){
           $txt.='<tr><td>'.$row['post_id'].'</td><td>'.$row['user_id'].'</td><td>'.$row['status'].'</td><td><img src='.$row['image'].' class="img_user_class"></td><td>'.$row['published_at'].'</td><td>'.$row['blog_title'].'</td><td><select id='.$row["post_id"].' class="selectdrop" name="status" onchange="changeSelect(this.id,this.value)">
            <option value="Pending">Pending</option>
            <option value="Approved">Approved</option>
            
            </select></td><td>'.$row['edited_at'].'</td><td><i class="fa fa-edit edituser" style="font-size:2vw;" ></i><i class="fa fa-trash-o deleteuser" id='.$row['post_id'].' onclick="Delete(this.id,0);" style="font-size:2vw;"></i></td></tr>';
          }
         if($row['status_by_admin']=="Approved"){
           $txt.='<tr><td>'.$row['post_id'].'</td><td>'.$row['user_id'].'</td><td>'.$row['status'].'</td><td><img src='.$row['image'].' class="img_user_class"></td><td>'.$row['published_at'].'</td><td>'.$row['blog_title'].'</td><td><select id='.$row["post_id"].' class="selectdrop" name="status" onchange="changeSelect(this.id,this.value)">
           <option value="Approved">Approved</option>
           <option value="Pending">Pending</option>
           
           </select></td><td>'.$row['edited_at'].'</td><td><i class="fa fa-edit edituser" style="font-size:2vw;"></i><i class="fa fa-trash-o deleteuser" id='.$row["post_id"].' onclick="Delete(this.id,0);" style="font-size:2vw;"></i></td></tr>';
          }
       
    }
    $txt.="</table>";
    
    echo $txt;
  }

  if(isset($_POST['edituserid'])){
    $user_id=$_POST['edituserid'];
    include "connection.php";
    $query="SELECT * FROM `Users` WHERE user_id='$user_id'";
    $result=mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    echo '<center>
    <div style="height:10vw;width:70vw;margin-left:3vw;margin-top:4vw;font-size:1.5vw;">
    <table id="myTable"><tr><td>User Name</td><td><input type="text" id="edited_name" value="'.$row['name'].'"></td></tr>
    <tr><td>Email</td><td><input type="text" id="edited_email" value="'.$row['email'].'"></td></tr>
    <tr><td>Contact</td><td><input type="text" id="edited_contact" value="'.$row['contact'].'"></td></tr>
    <tr><td>Tagline</td><td><input type="text" id="edited_tagline" value="'.$row['tagline'].'"></td></tr>
    <tr><td>Password</td><td><input type="text" id="edited_password" value="'.$row['password'].'"></td></tr>
   
    </table>
    <input type="button" id="'.$row['user_id'].'" onclick="saveEditData(this.id);" value="Save" style="margin-top:2vw;color:blue;">
    </div></center>';
   
    
  }


  if(isset($_POST['contact'])){
    include "connection.php";
    $user_id=$_POST['user_id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $password=$_POST['password'];
    $tagline=$_POST['tagline'];
    
    $query = "UPDATE `Users` SET `name`='$name',`email`='$email', `contact`='$contact',`tagline`='$tagline', `password`='$password' WHERE user_id='$user_id'";
    $result=mysqli_query($conn,$query);

    $query1 = "SELECT * FROM Users where role != 'admin'";
    $result1 = mysqli_query($conn,$query1);
   
    $txt.="<table><thead><th>User Id</th><th>Image</th><th>User Name</th><th>Email</th><th>Contact</th><th>Tagline</th><th>Password</th><th>Date Of Joining</th><th>Role</th><th>Action</th></thead>";
    foreach($result1 as $row){
      $txt.='<tr><td>'.$row['user_id'].'</td><td><img class="img_user_class" src='.$row['image'].'></td><td>'.$row['name'].'</td><td>'.$row['email'].'</td><td>'.$row['contact'].'</td><td>'.$row['tagline'].'</td><td>'.$row['password'].'</td><td>'.$row['date_of_joining'].'</td><td>'.$row['role'].'</td><td><i class="fa fa-edit edituser" id='.$row['user_id'].' onclick="editUser(this.id);"></i></td></tr>';

    }
    $txt.="</table>";
    echo $txt;

  }

  // if(isset($_POST['add_new_user'])){
  //    echo '<center>
    // <div style="height:10vw;width:70vw;margin-left:3vw;margin-top:4vw;font-size:1.5vw;">
    // <table id="myTable"><tr><td>User Name</td><td><input type="text" id="new_name" ></td></tr>
    // <tr><td>Email</td><td><input type="text" id="new_email" ></td></tr>
    // <tr><td>Contact</td><td><input type="text" id="new_contact" ></td></tr>
    // <tr><td>Tagline</td><td><input type="text" id="new_tagline" ></td></tr>
    // <tr><td>Password</td><td><input type="text" id="new_password" ></td></tr>
    // <tr><td>Password</td><td><input type="file" name="image_upload" id="new_image" ></td></tr>
   
    // </table>
    // <input type="button"  onclick="addUser();" value="Add" style="margin-top:2vw;color:blue;">
    // </div></center>';
   
   






?>