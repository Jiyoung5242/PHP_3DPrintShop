
<?php

if(isset($_POST['submit'])){
$reportType = $_POST["reason"];
$message = $_POST["message"];

include("connection.php");

$sql = "INSERT INTO report (ReportType, Message) VALUES ('".$reportType."', '".$message."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("location: thankyou.html");
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
<?php 
    include('partial/header.php')
?>
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
                        <label>All reports are anonymous. For problems with deliveries or quality of products, please email us at henrykarnwork@gmail.com.</label> <br>
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