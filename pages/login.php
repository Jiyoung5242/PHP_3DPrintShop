<?php
    include("functions.php");
    include("connection.php");
    //ob_start();
    session_start();

    if(logged_in()){
      //print "<script language=javascript> alert('You already Login'); location.replace('../index.php'); </script>";
    
      header("location:../index.php");
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
              header("location: ../index.php");
              //print "<script language=javascript> alert('LOGIN SUCCESS'); location.replace('../index.php'); </script>";
    
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
  <?php include "./topbar.php" ?>
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
<?php include "./partial/footer.php" ?>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>