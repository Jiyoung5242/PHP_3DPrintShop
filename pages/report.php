
<?php

if(isset($_POST['submit'])){
$reportType = $_POST["reason"];
$message = $_POST["message"];

include("connection.php");

$sql = "INSERT INTO report (ReportType, Message) VALUES ('".$reportType."', '".$message."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("location: /php_3dprintshop/index.php");
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

<div class="bgded overlay" style="background-image:url('/php_3dprintshop/images/backgrounds/main_image.jpg');"> 

<?php include "./topbar.html" ?>

<?php include "./header_menu.html" ?>
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
                    <h4 class="card-title mt-2">send a report</h4>
                </header>
                <article class="card-body">
                    <form method="post" action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data">
                        <legend>Report</legend>
                        <label>All reports are anonymous. For problems with deliveries or quality of products, please email us at <a href="mailto:3dprintshop@gmail.com">3dprintshop@gmail.com</a>.</label> <br>
                        <label for="subject">Subject:<strong title="Required" class="req"></strong>
                        <input id="reason" name="reason" type="text" size="30">
                        </label><br>
                        <label for="message">Message:
                        <textarea id="message" name="message" rows="5" cols="40" maxlength="150"></textarea>
                        </label>
                        <input name="submit" type="submit" value="Submit">
                    </form>
                </article>
            </div>
        </div> 
    </div> 
        

    <!-- ################################################################################################ -->
  </section>
</div>

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<?php
    include('partial/footer.php')
?>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>