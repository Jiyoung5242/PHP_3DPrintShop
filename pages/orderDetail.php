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
  <div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
 
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">

            <section>
                <a href='../pages/myorder.php'>go to list ...</a>
            </section>

            <h2>Order Detail</h2>

            <?php
                $orderId = $_GET['id'];

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

            // 아이템정보를 가져오자
            $conn = mysqli_connect("localhost","root", "","3dprintshop");
            if (mysqli_connect_errno() > 0) {
                return;
            }

            $sql = "SELECT O.ModelID, O.Quantity, M.ModelName, M.ModelImage, M.Size, M.Infill, M.Colour, M.Cost FROM OrderItem as O INNER JOIN Model as M on O.ModelID = M.ModelID where O.OrderID = " . $orderId;
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

            echo '</tbody>';
            echo '</table>';
            echo 'totalCost: ' . $totalCost;

            echo '<br/><br/>';
            echo '<br/><br/>';

            // 여기는 그냥 order 정보
            $sql2 = "select orderid, accountid, recipientname, 
            phonenumber, shippinginstructions, shipdate, shipaddress, 
            shippingtype, ifpaymentconfirmed, totalcost, 
            cardnumber, expirydate from `Order` where OrderID = " . $orderId;
            $result2 = mysqli_query($conn, $sql2);

            // 아이디로 조회해서 과는 1개 밖에 안나와야 정상
            while ($row2 = mysqli_fetch_assoc($result2)) {
                echo 'shippingInstructions: ' . $row2["shippinginstructions"];
                echo '<br/><br/>';
                echo 'recipientname: ' . $row2["recipientname"];
                echo '<br/>';
                echo 'phonenumber: ' . $row2["phonenumber"];
                echo '<br/><br/>';
                echo 'shipaddress: ' . $row2["shipaddress"];
                echo '<br/><br/>';
                echo 'cardnumber: ' . $row2["cardnumber"];
                echo '<br/>';
                echo 'expirydate: ' . $row2["expirydate"];
            }


            ?>

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