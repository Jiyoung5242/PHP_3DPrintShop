
<?php
include("connection.php");
session_start();

if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
  $selectCart  = "SELECT * FROM 3dprintshop.cart where AccountID = '$email'";
  echo "sql = ".$selectCart;

  $cartResult = mysql_query($selectCart);

  while($rows=mysql_fetch_array($cartResult))
  {
      $modelId = $rows['ModelID'];
      echo "Model ID = ".$modelId;
      
  } 


}
/*
if(isset($_POST['modelCheck'])){

  $checkList = join(", ", $_POST['modelCheck']);
  echo "modelCheck = " .$checkList;

  $sqlimage  = "SELECT ModelImage FROM 3dprintshop.model where ModelID IN ($checkList)";
  echo "sql = ".$sqlimage;

  $imageresult1 = mysql_query($sqlimage);

  while($rows=mysql_fetch_array($imageresult1))
  {
      $image = $rows['ModelImage'];
      echo "$image";
      echo'<img height="300" width="300" src="../../images/model/earrings.jpg">';
      
  } 


}else{

  echo "No Model list!!";
}
*/
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

<?php include "./header_menu.html" ?>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
 
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <h2>My Cart</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th colspan="2">Model</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-sm-2 col_md-1">
  
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="../images/headphone_stand.jpg" style="width: 72px; height: 72px;"> </a>
      
                        </td>
                        <td class="col-sm-5 col_md-1">
                            <h4 class="media-heading"><a href="#">Headphone Stand</a></h4>
                            <h6 class="media-heading"> middle : white : infill </h6>
                            <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                        </td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="3">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$4.87</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$14.61</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-orange">Remove
                        </button></td>
                    </tr>
                    <tr>
                        <td class="col-sm-2 col_md-1">
  
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="../images/key_chain.jpg" style="width: 72px; height: 72px;"> </a>
      
                        </td>
                        <td class="col-sm-5 col_md-1">
                            <h4 class="media-heading"><a href="#">Headphone Stand</a></h4>
                            <h6 class="media-heading"> small : red : infill </h6>
                            <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                        </td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="1">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$3.91</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$3.91</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-orange">Remove
                        </button></td>
                    </tr>
                    <tr>
                        <td colspan="2">   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>$18.52</strong></h5></td>
                    </tr>
                    <tr>
                        <td colspan="2">   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>$6.94</strong></h5></td>
                    </tr>
                    <tr>
                        <td colspan="2">   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>$25.46</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-outline-orange">Continue Shopping
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-orange">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

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
        <form method="post" action="#">
          <fieldset>
            <legend>Newsletter:</legend>
            <input class="btmspace-15" type="text" value="" placeholder="Name">
            <input class="btmspace-15" type="text" value="" placeholder="Email">
            <button type="submit" value="submit">Submit</button>
          </fieldset>
        </form>
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