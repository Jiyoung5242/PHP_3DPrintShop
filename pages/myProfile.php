<?php
include("connection.php");
session_start();

if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];

  $result = mysqli_query($conn, "SELECT * FROM account WHERE Email='$email'");
  $retrieveResult = mysqli_fetch_assoc($result);
  $firstName = $retrieveResult['FirstName'];
  $lastName = $retrieveResult['LastName'];
  $address = $retrieveResult['Address'];
  $city = $retrieveResult['City'];
  $postalcode = $retrieveResult['PostalCode'];
  $phone = $retrieveResult['Phone'];
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

  <?php include "./header_menu.html" ?>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">


<div class="container">
  <div class="row justify-content-center">
  <div class="col-md-12">


  </div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo $firstName. " ". $lastName ?></h3>
        </div>
        <div class="panel-body">
          <div class="row">

            <div class=" col-md-12 col-lg-12 "> 
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td>Name:</td>
                    <td><?php echo $firstName. " ". $lastName ?></td>
                  </tr>
                  <tr>
                    <td>Address:</td>
                    <td><?php echo $address ?></td>
                  </tr>
                  <tr>
                    <td>City</td>
                    <td><?php echo $city ?></td>
                  </tr>
                  <tr>
                    <td>Postal Code</td>
                    <td><?php echo $postalcode ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><a href="mailto:info@support.com"><?php echo $email ?></a></td>
                  </tr>
                    <td>Phone Number</td>
                    <td><?php echo $phone ?>
                    </td>
                       
                  </tr>
                </tbody>
              </table>
              
              <!--<a href="#" class="btn btn-orange">Edit Profile</a>-->
              <a href="../pages/logout.php" class="btn btn-orange">Logout</a>
            </div>
          </div>
        </div>
             <div class="panel-footer">

                </div>
        
      </div>
    </div>
  </div>
</div>
</div>

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<?php include("../pages/partial/footer.php") ?>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>