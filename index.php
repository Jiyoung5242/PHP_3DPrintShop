
<?php
session_start();

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
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->



<div class="bgded overlay" style="background-image:url('/php_3dprintshop/images/backgrounds/main_image.jpg');"> 
<?php include "./pages/topbar.php" ?>
<?php include "./pages/header_menu.html" ?>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article class="center">
      <h3 class="heading underline">Imagination into Reality</h3>
      <p>Imagination into reality, whatever you imagine, you'll see more than just your imagination </p>
      <footer><a class="btn" >Whatever you can imagine, it goes beyond your Imagination</a></footer>
    </article>
    <!-- ################################################################################################ -->
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="center btmspace-80">
      <h6 class="heading underline font-x2">Welcome 3D Print SHOP</h6>
    </div>
    <ul class="nospace group overview btmspace-80">
      <li class="one_quarter">
        <article><a href="./pages/searchModel.html"><i class="fas fa-eraser"></i></a>
          <h6 class="heading"><a href="./pages/searchModel.html">Search 3D Models</a></h6>
          <footer><a href="./pages/searchModel.html">View Details &raquo;</a></footer>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="./pages/uploadFile.php"><i class="fas fa-cut"></i></a>
          <h6 class="heading"><a href="./pages/uploadFile.php">Upload my files</a></h6>
          <footer><a href="./pages/uploadFile.php">View Details &raquo;</a></footer>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="./pages/myCart.php"><i class="fas fa-hand-holding-heart"></i></a>
          <h6 class="heading"><a href="./pages/myCart.php">My orders</a></h6>
          <footer><a href="./pages/myCart.php">View Details &raquo;</a></footer>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="./pages/myProfile.php"><i class="fas fa-rocket"></i></a>
          <h6 class="heading"><a href="./pages/myProfile.php">My Account</a></h6>
          <footer><a href="./pages/myProfile.php">View Details &raquo;</a></footer>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <article class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="center btmspace-80">
      <h6 class="heading underline font-x2">Recent 3D Models</h6>
    </div>
    <ul class="nospace group figures btmspace-80">
      <li class="one_third first">
        <figure><img src="images/model/earrings.jpg" alt="">
          <figcaption><em>01</em> <a >Earrings</a></figcaption>
        </figure>
      </li>
      <li class="one_third">
        <figure><img src="images/model/nintendo.jpg" alt="">
          <figcaption><em>02</em> <a >Headphone Stand</a></figcaption>
        </figure>
      </li>
      <li class="one_third">
        <figure><img src="images/model/key_chain.jpg" alt="">
          <figcaption><em>03</em> <a >Keychain</a></figcaption>
        </figure>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </article>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/01.png');">
  <section id="testimonials" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="center btmspace-80">
      <h6 class="heading underline font-x2">Creators</h6>
    </div>
    <ul class="nospace group btmspace-80">
      <li class="one_third first">
        <figure class="clear"><img class="circle" src="images/demo/60x60.png" alt="">
          <figcaption>
            <h6 class="heading">Jiyoung Jung</h6>
            <em>Co-Creator</em></figcaption>
        </figure>
      </li>
      <li class="one_third">
        <figure class="clear"><img class="circle" src="images/demo/60x60.png" alt="">
          <figcaption>
            <h6 class="heading">Jisu Ok</h6>
            <em>Co-Creator</em></figcaption>
        </figure>
      </li>
      <li class="one_third">
        <figure class="clear"><img class="circle" src="images/demo/60x60.png" alt="">
          <figcaption>
            <h6 class="heading">Henry Karn</h6>
            <em>Co-Creator</em></figcaption>
        </figure>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<?php 
    include("pages/partial/footer.php");
?>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>