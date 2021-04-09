<?php
    session_start();
    $AccountID = $_SESSION['AccountID'];
    if(!$AccountID){
        print "<script language=javascript> alert('You need to Login first'); location.replace('../pages/login.php'); </script>";
    }
?>

<!DOCTYPE html><!--없어서추가 지수가 추가함-->
<html lang="">
<?php include "./header.html" ?>
<body id="top">
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('../images/backgrounds/main_image.jpg');"> 
  <!-- ################################################################################################ -->
  <?php include "./topbar.php" ?>

    <?php include "./header_menu.html" ?>
  <div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->

    <!--<div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <h2>Order Items</h2>-->
            <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
        <header class="card-header">
            <h4 class="card-title mt-2">Order</h4>
        </header>
        <article class="card-body">


<?php
//echo 'a: ' . $_SESSION['AccountID'];
//echo 'e: ' . $_SESSION['email'];

// 파라미터 확인
$cartIds_string = $_GET["cartIds"];
if (empty($cartIds_string)){
    print "<script language=javascript> alert('plz, add cartIds parameter'); location.replace('../pages/myCart.php'); </script>";
    exit;
}

// 파라미터 배열 확인
$cartIds = explode(",",$cartIds_string);
if (empty($cartIds)){
    //echo "cartIds has wrong format";
    print "<script language=javascript> alert('cartIds has wrong format'); location.replace('../pages/myCart.php'); </script>";
    
    exit;
}

// 테이블 생성
echo '<table class="table table-hover">';
echo '<thead>
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price($)</th>
        <th>Total Price($)</th>
    </tr>
</thead>';
echo '<tbody>';

    // 이렇게 한번에 가져오는 방법도 있음, 이렇게 가져와서 for 문을 돌려도 됨
    // $sql = "select CartID, ModelID, Quantity from Cart where CartID in (1, 2)";

    $taxPercent = 13;
    $tax = 0;
    $deliver = 6;
    $totalCost = 0;

    for($i = 0; $i < count($cartIds); $i++) {

        // 아이템정보를 가져오자
        $conn = mysqli_connect("localhost","root", "","3dprintshop");
        if (mysqli_connect_errno() > 0) {
            return;
        }

        $sql = "SELECT C.ModelID, C.Quantity, M.ModelName, M.ModelImage, M.Size, M.Infill, M.Colour, M.Cost FROM Cart as C INNER JOIN Model as M on C.ModelID = M.ModelID where CartID = " . $cartIds[$i];
        $result = mysqli_query($conn, $sql);

        // 아이디로 조회해서 과는 1개 밖에 안나와야 정상
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<th>' . $row["ModelID"] . '</th>' .
                '<th>' . $row["ModelImage"] . '</th>' .
                '<th>' . $row["ModelName"] . '</th>' .
                '<th>' . $row["Quantity"] . '</th>' .
                '<th>' . $row["Cost"] . '</th>' .
                '<th>' . $row["Quantity"] * $row["Cost"] . '</th>';
            $totalCost = $totalCost + $row["Quantity"] * $row["Cost"];
            echo '</tr>';
        }
    }
    $tax = $totalCost * $taxPercent / 100;
echo '</tbody>';
echo '</table>';

echo '<div class="col form-group">';
echo '<label>Tax</label>';
echo '<input class="form-control" value="' . $tax ." $". ' " size="22" disabled/>';
echo '</div>'; 

echo '<div class="col form-group">';
echo '<label>Deliver</label>';
echo '<input class="form-control" value="' . $deliver ." $". ' " size="22" disabled/>';
echo '</div>';

echo '<div class="col form-group">';
echo '<label>Total Cost</label>';
echo '<input class="form-control" value="' . ($totalCost + $deliver + $tax) ." $". ' " size="22" disabled/>';
echo '</div>';

// 요청사항
echo '<br/><br/>';
echo '<form action="orderProc.php" method="post">';
    echo '<div class="col form-group">';
    echo '<label>Recipient Name</label>';
    echo '<input class="form-control" type="text" name="recipientName" id="recipientName" value="" size="22"/>'; 
    echo '</div>';

    echo '<div class="col form-group">';
    echo '<label>Phone Number</label>';
    echo '<input class="form-control" type="text" name="phoneNumber" id="phoneNumber" value="" size="22"/>';
    echo '</div>';

    echo '<div class="col form-group">';
    echo '<label>Ship Address</label>';
    echo '<input class="form-control" type="text" name="shipAddress" id="shipAddress" value="" size="22"/>';
    echo '</div>';

    echo '<div class="col form-group">';
    echo '<label>Shipping Instructions</label>';
    echo '<input class="form-control" type="text" name="shippingInstructions" id="shippingInstructions" value="" size="22"/>';
    echo '</div>';

    echo '<div class="col form-group">';
    echo '<label>Card Number</label>';
    echo '<input class="form-control" type="text" name="cardNumber" id="cardNumber" value="" placeholder="without - mark" size="22"/>';
    echo '</div>';

    echo '<div class="col form-group">';
    echo '<label>Expiry Date</label>';
    echo '<input class="form-control" type="text" name="expiryDate" id="expiryDate" placeholder="MM/YY" value="" size="22"/>';
    echo '</div>'; 
    echo '<br/><br/>';
    echo '<input type="submit" class="btn btn-orange btn-block" name="submit" value="Order"/>';
    echo '<input type="hidden" name="cartIds" id="cartIds" value="' . $cartIds_string . '"/>';
    echo '<input type="hidden" name="tax" id="tax" value="' . $tax . '"/>';
    echo '<input type="hidden" name="deliver" id="deliver" value="' . $deliver . '"/>';
    echo '<input type="hidden" name="totalCost" id="totalCost" value="' . $totalCost . '"/>';
echo '</form>';
?>
          
        </article> <!-- card-body end .// -->
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