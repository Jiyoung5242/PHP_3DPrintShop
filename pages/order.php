<!DOCTYPE html><!--없어서추가 지수가 추가함-->
<html lang="">
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
  <div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->

    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <h2>Order Items</h2>

                <?php

                    // 파라미터 확인
                    $cartIds_string = $_GET["cartIds"];
                    if (empty($cartIds_string)){
                        echo "plz, add cartIds parameter";
                    }

                    // 파라미터 배열 확인
                    $cartIds = explode(",",$cartIds_string);
                    if (empty($cartIds)){
                        echo "cartIds has wrong format";
                    }

                    // 테이블 생성
                    echo '<table class="table table-hover">';
                    echo '<thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>';
                    echo '<tbody>';

                        // 이렇게 한번에 가져오는 방법도 있음, 이렇게 가져와서 for 문을 돌려도 됨
                        // $sql = "select CartID, ModelID, Quantity from Cart where CartID in (1, 2)";

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
                    echo '</tbody>';
                    echo '</table>';
                    echo 'totalCost: ' . $totalCost;

                    // 요청사항
                    echo '<br/><br/>';
                        echo '<form action="orderProc.php" method="post">';
                        echo 'shippingInstructions: <input type="text" name="shippingInstructions" id="shippingInstructions" value="" size="22"/>';
                        echo '<br/><br/>';
                        echo 'RecipientName: <input type="text" name="recipientName" id="recipientName" value="" size="22"/>';
                        echo 'PhoneNumber: <input type="text" name="phoneNumber" id="phoneNumber" value="" size="22"/>';
                        echo '<br/><br/>';
                        echo 'ShipAddress: <input type="text" name="shipAddress" id="shipAddress" value="" size="22"/>';
                        echo '<br/><br/>';
                        echo 'CardNumber: <input type="text" name="cardNumber" id="cardNumber" value="" placeholder="without - mark" size="22"/>';
                        echo 'ExpiryDate: <input type="text" name="expiryDate" id="expiryDate" placeholder="MM/YY" value="" size="22"/>';
                        echo '<br/><br/>';
                        echo '<input type="submit" name="submit" value="Order"/>';
                        echo '<input type="hidden" name="cartIds" id="cartIds" value="' . $cartIds_string . '"/>';
                        echo '<input type="hidden" name="totalCost" id="totalCost" value="' . $totalCost . '"/>';
                    echo '</form>';
                    ?>

<!--            <table class="table table-hover">-->
<!--                <thead>-->
<!--                    <tr>-->
<!--                        <th colspan="2">Model</th>-->
<!--                        <th>Quantity</th>-->
<!--                        <th class="text-center">Price</th>-->
<!--                        <th class="text-center">Total</th>-->
<!--                        <th> </th>-->
<!--                    </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                    <tr>-->
<!--                        <td class="col-sm-2 col_md-1">-->
<!---->
<!--                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="../images/earings.jpg" style="width: 72px; height: 72px;"> </a>-->
<!---->
<!--                        </td>-->
<!--                        <td class="col-sm-5 col_md-1">-->
<!--                            <h4 class="media-heading"><a href="#">Earings</a></h4>-->
<!--                            <h6 class="media-heading"> small : red : infill </h6>-->
<!--                            <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>-->
<!--                        </td>-->
<!--                        <td class="col-sm-1 col-md-1" style="text-align: center">-->
<!--                        <input type="email" class="form-control" id="exampleInputEmail1" value="1">-->
<!--                        </td>-->
<!--                        <td class="col-sm-1 col-md-1 text-center"><strong>$30</strong></td>-->
<!--                        <td class="col-sm-1 col-md-1 text-center"><strong>$30</strong></td>-->
<!--                        <td class="col-sm-1 col-md-1">-->
<!--                        <button type="button" class="btn btn-orange">Remove-->
<!--                        </button></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td colspan="2">   </td>-->
<!--                        <td>   </td>-->
<!--                        <td>   </td>-->
<!--                        <td><h5>Subtotal</h5></td>-->
<!--                        <td class="text-right"><h5><strong>$30</strong></h5></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td colspan="2">   </td>-->
<!--                        <td>   </td>-->
<!--                        <td>   </td>-->
<!--                        <td><h5>Estimated shipping</h5></td>-->
<!--                        <td class="text-right"><h5><strong>$6.94</strong></h5></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                      <td colspan="2">   </td>-->
<!--                      <td>   </td>-->
<!--                      <td>   </td>-->
<!--                      <td><h5>tax</h5></td>-->
<!--                      <td class="text-right"><h5><strong>$3.9</strong></h5></td>-->
<!--                  </tr>-->
<!--                    <tr>-->
<!--                        <td colspan="2">   </td>-->
<!--                        <td>   </td>-->
<!--                        <td>   </td>-->
<!--                        <td><h3>Total</h3></td>-->
<!--                        <td class="text-right"><h3><strong>$40.84</strong></h3></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>   </td>-->
<!--                        <td>   </td>-->
<!--                        <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<!--                        <button type="button" class="btn btn-outline-orange">Continue Shopping-->
<!--                        </button></td>-->
<!--                        <td>-->
<!--                        <button type="button" class="btn btn-orange">-->
<!--                            Checkout <span class="glyphicon glyphicon-play"></span>-->
<!--                        </button></td>-->
<!--                    </tr>-->
<!--                </tbody>-->
<!--            </table>-->
        </div>
    </div>

    <!-- ################################################################################################ -->
  </section>
</div>

<?php include "./footer.html" ?>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>