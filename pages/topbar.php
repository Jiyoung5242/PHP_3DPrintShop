<div class="wrapper row0">
    <div id="topbar" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div class="fl_left"> 
        <!-- ################################################################################################ -->
        <ul class="nospace">
          <li><i class="fas fa-phone"></i> +1 226 743 0596</li>
          <li><i class="far fa-envelope"></i> 3dprintshop@gmail.com</li>
        </ul>
        <!-- ################################################################################################ -->
      </div>
      <div class="fl_right"> 
        <!-- ################################################################################################ -->
        <ul class="nospace">
          <li><div id="welcome" style="<?php if(isset($_SESSION['email']) && $_SESSION['email'] != "") { ?> display:block; <?php } ?> ">
          <?php  if(isset($_SESSION['email'])) {echo $_SESSION['email']; } ?></div></li>
          <li><a href="../index.php"><i class="fas fa-home"></i></a></li>
          <li><a href="./logout.php" title="Logout"><i class="fas fa-sign-out-alt"></i></a></li>
          <li><a href="./login.php" title="Login"><i class="fas fa-sign-in-alt"></i></a></li>
          <li><a href="./register.php" title="Sign Up"><i class="fas fa-edit"></i></a></li>
        </ul>
        <!-- ################################################################################################ -->
      </div>
      <!-- ################################################################################################ -->
    </div>
  </div>

