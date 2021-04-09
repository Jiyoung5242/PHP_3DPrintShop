<?php
    include("functions.php");
    include("connection.php");
    //ob_start();
    session_start();

    if(logged_in()){
      //print "<script language=javascript> alert('You already Login'); location.replace('../index.php'); </script>";
    
      //header("location:../index.php");
      exit;
    }
      $error="";
      $msg = "";

       
      if (isset($_POST['login']) && !empty($_POST['email']) 
          && !empty($_POST['password'])) {

          $email = mysqli_real_escape_string($conn, $_POST['email']);
          $password = mysqli_real_escape_string($conn, $_POST['password']);
          $checkBox = isset($_POST['keep']);

          if(email_exists($email,$conn))
		      {

            $result = mysqli_query($conn, "SELECT AccountID, password FROM account WHERE Email='$email'");
			      $retrievepassword = mysqli_fetch_assoc($result);
            echo "password=".md5($password);
            echo "retrieve password = ".$retrievepassword['password'];
            //if (md5($password) !== $retrievepassword['password'])
            if ($password !== $retrievepassword['password'])
            {
              $error = "Password is incorrect";
              
              //alert("Password is incorrect!");
            }
            else
            {
              $_SESSION['AccountID'] = $retrievepassword['AccountID'];
              $_SESSION['email'] = $email;
            
              $_SESSION['valid'] = true;
              $_SESSION['timeout'] = time();
              $_SESSION['username'] = mysqli_query($conn, "SELECT concat(FirstName, LastName) AS username FROM account WHERE Email='$email'");

              if($checkBox == "on")
              {
                setcookie("email",$email, time()+3600);
              }
              echo "OKOKOK";
              //header("location: ../index.php");
              print "<script language=javascript> alert('LOGIN SUCCESS'); location.replace('../index.php'); </script>";
    
            }
			

            
            
            echo 'You have entered valid use name and password';
          }else {
            $error = 'Wrong username or password';
            echo $error;
            //alert("Wrong username or password");
          }
      }

  ?>


<!DOCTYPE html>
<!--
Template Name: Besloor
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<?php include "./header.html" ?>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('../images/backgrounds/main_image.jpg');"> 
  <!-- ################################################################################################ -->
  <?php include "./topbar.html" ?>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <?php include "./header_menu.html" ?>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
 

    <div class="row justify-content-center">
        <div class="col-md-3">
        <div class="card">
        <div id="error" style=" <?php  if($error !=""){ ?>  display:block; <?php } ?> "><?php echo $error; ?></div>
        <div id="error"></div>
        <header class="card-header">
            <h4 class="card-title mt-2">Log In</h4>
        </header>
        <article class="card-body">
        <form action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="" name="email">
            </div> <!-- form-group end.// -->
            <div class="form-group">
                <label>Password</label>
                <input type="tel" class="form-control" placeholder="" name="password">
            </div> 
            <div class="form-group">
              <input type="checkbox" name="keep" style="display: inline !important"><label>Remember me</label>
              
            </div>
            <p></p>
            <div class="form-group">
                <button type="submit" class="btn btn-orange btn-block" name="login"> Log In  </button>
            </div> <!-- form-group// --> 
        </form>
        </article> <!-- card-body end .// -->
        <div class="border-top card-body text-center">Do you want to sign up? <a href="./register.php">Sign up</a></div>
        </div> <!-- card.// -->
        </div> <!-- col.//-->
        
        </div> <!-- row.//-->
        
        



    <!-- ################################################################################################ -->
  </section>
</div>

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="center btmspace-50">
      <h6 class="heading">3D Print SHOP</h6>
      <nav>
        <ul class="nospace inline pushright uppercase">
          <li><a href="../index.html"><i class="fas fa-lg fa-home"></i></a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Terms</a></li>
          <li><a href="#">Privacy</a></li>
          <li><a href="#">Cookies</a></li>
          <li><a href="#">Disclaimer</a></li>
        </ul>
      </nav>
    </div>
    <!-- ################################################################################################ -->
    <hr class="btmspace-50">
    <!-- ################################################################################################ -->
    <div class="group">
      <div class="one_quarter first">
        <h6 class="heading">CONTACTS</h6>
        <ul class="nospace btmspace-30 linklist contact">
          <li><i class="fas fa-map-marker-alt"></i>
            <address>
            Street Name &amp; Number, Town, Postcode/Zip
            </address>
          </li>
          <li><i class="fas fa-phone"></i> +00 (123) 456 7890</li>
          <li><i class="far fa-envelope"></i> info@domain.com</li>
        </ul>
        <ul class="faico clear">
          <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
          <li><a class="faicon-google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
          <li><a class="faicon-linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
          <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a class="faicon-vk" href="#"><i class="fab fa-vk"></i></a></li>
        </ul>
      </div>
      <div class="one_quarter">
        <h6 class="heading">Vivamus risus maecenas</h6>
        <p class="nospace btmspace-15">Nunc urna porttitor eget molestie a consequat at lectus donec sollicitudin.</p>
        <!--<form method="post" action="#">
          <fieldset>
            <legend>Newsletter:</legend>
            <input class="btmspace-15" type="text" value="" placeholder="Name">
            <input class="btmspace-15" type="text" value="" placeholder="Email">
            <button type="submit" value="submit">Submit</button>
          </fieldset>
        </form> -->
      </div>
      <div class="one_quarter">
        <h6 class="heading">Dictum sit amet tortor</h6>
        <ul class="nospace linklist">
          <li><a href="#">Est a orci donec eleifend</a></li>
          <li><a href="#">Dignissim erat proin diam</a></li>
          <li><a href="#">Aenean vehicula augue</a></li>
          <li><a href="#">Et neque sed ligula nisl</a></li>
          <li><a href="#">Dictum quis tempus eu</a></li>
        </ul>
      </div>
      <div class="one_quarter">
        <h6 class="heading">Proin tincidunt venenatis</h6>
        <ul class="nospace clear latestimg">
          <li><a class="imgover" href="#"><img src="images/demo/100x100.png" alt=""></a></li>
          <li><a class="imgover" href="#"><img src="images/demo/100x100.png" alt=""></a></li>
          <li><a class="imgover" href="#"><img src="images/demo/100x100.png" alt=""></a></li>
          <li><a class="imgover" href="#"><img src="images/demo/100x100.png" alt=""></a></li>
          <li><a class="imgover" href="#"><img src="images/demo/100x100.png" alt=""></a></li>
          <li><a class="imgover" href="#"><img src="images/demo/100x100.png" alt=""></a></li>
          <li><a class="imgover" href="#"><img src="images/demo/100x100.png" alt=""></a></li>
          <li><a class="imgover" href="#"><img src="images/demo/100x100.png" alt=""></a></li>
          <li><a class="imgover" href="#"><img src="images/demo/100x100.png" alt=""></a></li>
        </ul>
      </div>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>