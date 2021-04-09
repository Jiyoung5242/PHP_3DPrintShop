
<?php
include("connection.php");
session_start();

if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
  $selectCart  = "SELECT CartID, ModelName,ModelImage, Size, Infill, Colour, Quantity, m.Cost AS Cost  FROM 3dprintshop.cart c, 3dprintshop.model m where c.Email = '$email' AND c.ModelID = m.ModelID";
  //echo "sql = ".$selectCart;

}

if(isset($_POST['submit'])){
  $cartid = join(",",$_POST['cartid']);
  header("location:order.php?cartIds=".$cartid);
  //echo "Cart ID = ".$cartid;
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
  <?php include "./topbar.php" ?>

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
            <form action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data" id="addCartForm">
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
                    

                    <?php
                      
                      $cartResult = mysqli_query($conn,$selectCart);
                      $total = 0;  
                      while($row = mysqli_fetch_assoc($cartResult)) {
                        //mysql_fetch_array
                        $total = $total + $row['Cost'];
                    ?>
                    <tr>
                        <input type="hidden" name="cartid[]" value="<?php echo $row['CartID'] ?>">
                        <td class="col-sm-2 col_md-1">
  
                            <img id="imageSize" src="../images/model/<?php echo $row['ModelImage'] ?>.jpg">
      
                        </td>
                        <td class="col-sm-5 col_md-1">
                            <h4 class="media-heading"><a href="#"><?php echo $row['ModelName'] ?></a></h4>
                            <h6 class="media-heading"> <?php echo $row['Size'] ?> : <?php echo $row['Colour'] ?> : <?php echo $row['Infill'] ?> </h6>
                            <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                        </td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="number" class="form-control" name="inputQuantity[]" id="inputQuantity" value="<?php echo $row['Quantity'] ?>">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$<div name="cost[]" id="cost"><?php echo $row['Cost'] ?></div></strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$<div id="subtotal"> <?php echo $row['Quantity'] * $row['Cost']?></div></strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-orange">Remove
                        </button></td>
                        </tr>
                        <?php 
                        }
                        $conn->close();

                      ?>
                    

                    <tr>
                        <td colspan="2">   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>$<?php echo $total ?></strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-outline-orange">Continue Shopping
                        </button></td>
                        <td>
                        <button type="submit" class="btn btn-orange" name="submit">
                            Checkout
                        </button></td>
                    </tr>
                </tbody>
            </table>
            </form>
        </div>
    </div>

    <!-- ################################################################################################ -->
  </section>
</div>
<?php include "./partial/footer.php" ?>
<!-- JAVASCRIPTS -->
<script>
  const input = document.querySelector('input');
  const subtotal = document.getElementById('subtotal');
  const cost = document.getElementById('cost');

  input.addEventListener('change', updateValue);

  function updateValue(e) {
    
    subtotal.textContent = e.target.value * cost.textContent;
}

function change_cost(){
  alert("CHANGE COST");
  alert("alert " + document.getElementByName("inputQuantity")[1].value);

}
</script>
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>