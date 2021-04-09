

<?php


if(isset($_POST['submit'])){
$phone = $_POST["phone"];
$email = $_POST["email"];
$address = $_POST["address"];
$city = $_POST["city"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$postalcode = $_POST["postalcode"];
$password = $_POST["password"];


include("connection.php");

$sql = "INSERT INTO account (Email, Address, City, FirstName, LastName, PostalCode, Phone, password, isAdmin)
VALUES ('".$email."', '".$address."', '".$city."', '".$first_name."', '".$last_name."', '".$postalcode."', '".$phone."', '".$password."', 0)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("location: login.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

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
  <div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
 

    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
        <header class="card-header">
            <a href="./login.php" class="float-right btn btn-outline-orange mt-1">Log in</a>
            <h4 class="card-title mt-2">Sign up</h4>
        </header>
        <article class="card-body">
        <form action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col form-group">
                    <label>First name </label>   
                      <input type="text" class="form-control" placeholder="" name="first_name">
                </div> <!-- form-group end.// -->
                <div class="col form-group">
                    <label>Last name</label>
                      <input type="text" class="form-control" placeholder=" " name="last_name">
                </div> <!-- form-group end.// -->
            </div> <!-- form-row end.// -->
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" placeholder="" name="email">
                <small class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div> <!-- form-group end.// -->
            <div class="form-group">
                <label>Phone Number</label>
                <input type="tel" class="form-control" placeholder="" name="phone">
                <small class="form-text text-muted">We'll never share your phone number with anyone else.</small>
            </div> <!-- form-group end.// -->
            <!--<div class="form-group">
                    <label class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" value="option1">
                  <span class="form-check-label"> Male </span>
                </label>
                <label class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" value="option2">
                  <span class="form-check-label"> Female</span>
                </label>
            </div>  form-group end.// -->
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="" name="address">
                <small class="form-text text-muted">We'll never share your address with anyone else.</small>
            </div> <!-- form-group end.// -->
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label>City</label>
                  <input type="text" class="form-control" name="city">
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-6">
                  <label>Province</label>
                  <select id="inputState" class="form-control">
                    <option> Choose...</option>
                      <option>Quebec</option>
                      <option>British Columbia</option>
                      <option selected="">Ontario</option>
                      <option>Alberta</option>
                      <option>Manitoba</option>
                  </select>
                </div> <!-- form-group end.// -->
            </div> <!-- form-row.// -->
            <div class="form-group">
                <label>Postal Code</label>
                <input type="text" class="form-control" placeholder="" name="postalcode">
            </div> <!-- form-group end.// -->
            <div class="form-group">
                <label>Create password</label>
                <input class="form-control" type="password" name="password">
            </div> <!-- form-group end.// -->  
            <p></p>
            <div class="form-group">
                <button type="submit" class="btn btn-orange btn-block" name="submit"> Sing Up  </button>
            </div> <!-- form-group// -->      
            <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>                                          
        </form>
        </article> <!-- card-body end .// -->
        <div class="border-top card-body text-center">Have an account? <a href="">Log In</a></div>
        </div> <!-- card.// -->
        </div> <!-- col.//-->
        
        </div> <!-- row.//-->
        
        



    <!-- ################################################################################################ -->
  </section>
</div>
<?php include "./partial/footer.php" ?>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>