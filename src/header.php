
<nav class="navigation max-width-1 m-auto">
        <div class="nav-left">
            <a href="index.php"><span id='logo'>BloGGer</span></a>
            <ul>
                <li><a href="/">Home</a></li>
                <?php if(!isset($_SESSION['name'])){ ?> <li><a href="login.php">Write</a></li><?php }else{?><li><a href="write.php">Write</a></li><?php }?>  
               <?php if(!isset($_SESSION['name'])){ ?> <li><a href="register.php">Register</a></li><?php } ?>
            </ul>       
        </div>
        <div class="nav-right ">
        <?php if(isset($_SESSION['name'])){ ?> 
        <div class="dropdown">   <?php }  ?>
        <?php if(!isset($_SESSION['name'])){ ?> <a href="login.php">Login</a><?php } ?>
        <?php if(isset($_SESSION['name'])){ ?> <i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo $_SESSION['name']; ?><?php } ?>
      
        <div class="dropdown-content">
        <p><a href="yourpost.php">Your Post</a></p>
        <p><a href="settings.php">Settings</a></p>
        <p><a href="logout.php"> Logout</a></p>
        </div>
         </div>
        
        </div>
    </nav>