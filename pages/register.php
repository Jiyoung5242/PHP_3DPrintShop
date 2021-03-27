

<?php


if(isset($_POST['submit'])){
$phone = $_POST["phone"];
$email = $_POST["email"];



$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$useDB = "Use 3dprintshop";
$sql = "INSERT INTO account (Email, Address, City, PostalCode, Phone, isAdmin)
VALUES ('".$email."', '423', 'waterloo', 'N2N2N2', '".$phone."', 0)";

if($conn->query($useDB) == TRUE) {
    echo "Use Database ";
} else {
    echo "Error: " . $useDB . "<br>" . $conn->error;
}
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
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
<head>
<title>3D Print SHOP</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="../layout/styles/detail.css" rel="stylesheet" type="text/css" media="all">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('../images/backgrounds/main_image.jpg');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row0">
    <div id="topbar" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div class="fl_left"> 
        <!-- ################################################################################################ -->
        <ul class="nospace">
          <li><i class="fas fa-phone"></i> +00 (123) 456 7890</li>
          <li><i class="far fa-envelope"></i> info@domain.com</li>
        </ul>
        <!-- ################################################################################################ -->
      </div>
      <div class="fl_right"> 
        <!-- ################################################################################################ -->
        <ul class="nospace">
          <li><a href="../index.html"><i class="fas fa-home"></i></a></li>
          <li><a href="#" title="Help Centre"><i class="fas fa-life-ring"></i></a></li>
          <li><a href="#" title="Login"><i class="fas fa-sign-in-alt"></i></a></li>
          <li><a href="./pages/createAccount.html" title="Sign Up"><i class="fas fa-edit"></i></a></li>
        </ul>
        <!-- ################################################################################################ -->
      </div>
      <!-- ################################################################################################ -->
    </div>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div id="logo" class="fl_left">
        <h1><a href="../index.html">3D Print SHOP</a></h1>
      </div>
      <!-- ################################################################################################ -->
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="../index.html">Home</a></li>
          <li><a class="drop" href="#">3D Models</a>
            <ul>
              <li><a class="drop" href="#">Toys</a>
                <ul>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="#">Level 3</a></li>
                </ul>
              </li>
              <li><a href="#">Level 2 + Drop</a>
              </li>
              <li><a href="#">Beauty</a></li>
              <li><a href="#">Parts</a></li>
              <li><a href="#">Figures</a></li>
            </ul>
            
          </li>
          <li><a href="#">My Files</a>
            
          </li>
          <li><a href="#">Orders</a></li>
          <li><a class="drop" href="#">My Account</a></li>
            <ul>
              <li><a href="pages/gallery.html">3D Models</a></li>
              <li><a href="pages/full-width.html">My Files</a></li>
              <li><a href="pages/sidebar-left.html">Orders</a></li>
              <li><a href="pages/sidebar-right.html">My Account</a></li>
            </ul>

        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
  </div>

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
 

    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
        <header class="card-header">
            <a href="" class="float-right btn btn-outline-orange mt-1">Log in</a>
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
                <input type="text" class="form-control" placeholder="">
                <small class="form-text text-muted">We'll never share your address with anyone else.</small>
            </div> <!-- form-group end.// -->
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label>City</label>
                  <input type="text" class="form-control">
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
                <input type="text" class="form-control" placeholder="">
            </div> <!-- form-group end.// -->
            <div class="form-group">
                <label>Create password</label>
                <input class="form-control" type="password">
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