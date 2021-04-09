<!DOCTYPE html>
<html lang="">
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
        
        <a href="../pages/myorder.php" class="float-right btn btn-outline-orange mt-1">Go to List</a>
            <h4 class="card-title mt-2">Order</h4>
        </header>
        <article class="card-body">

            <?php
                $orderId = $_GET['id'];

            echo '<table class="table table-hover">';
            echo '<thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price ($)</th>
                            <th>Total Price ($)</th>
                        </tr>
                    </thead>';
            echo '<tbody>';

            // 이렇게 한번에 가져오는 방법도 있음, 이렇게 가져와서 for 문을 돌려도 됨
            // $sql = "select CartID, ModelID, Quantity from Cart where CartID in (1, 2)";

            $totalCost = 0;
            $tax = 0;
            $deliver = 0;

            // 아이템정보를 가져오자
            $conn = mysqli_connect("localhost","root", "","3dprintshop");
            if (mysqli_connect_errno() > 0) {
                return;
            }

            // oer table
            $sql = "SELECT * FROM `Order` where OrderID = " . $orderId;
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $totalCost = $row["TotalCost"];
                $tax = $row["Tax"];
                $deliver = $row["DeliveryCost"];
            }

            // this is orderITem 
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
                echo '</tr>';
            }

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

            echo '<br/><br/>';

            // 여기는 그냥 order 정보
            $sql2 = "select orderid, accountid, recipientname, 
            phonenumber, shippinginstructions, shipdate, shipaddress, 
            shippingtype, ifpaymentconfirmed, totalcost, 
            cardnumber, expirydate from `Order` where OrderID = " . $orderId;
            $result2 = mysqli_query($conn, $sql2);

            // 아이디로 조회해서 과는 1개 밖에 안나와야 정상
            while ($row2 = mysqli_fetch_assoc($result2)) {
                echo '<div class="col form-group">';
                echo '<label>Recipient name</label>';
                echo '<input class="form-control" value="' . $row2["recipientname"] .' " size="22" disabled/>';
                echo '</div>';

                echo '<div class="col form-group">';
                echo '<label>Phone number</label>';
                echo '<input class="form-control" value="' . $row2["phonenumber"] .' " size="22" disabled/>';
                echo '</div>';

                echo '<div class="col form-group">';
                echo '<label>Ship Address</label>';
                echo '<input class="form-control" value="' . $row2["shipaddress"] .' " size="22" disabled/>';
                echo '</div>';
                
                echo '<div class="col form-group">';
                echo '<label>Card Number</label>';
                echo '<input class="form-control" value="' . $row2["cardnumber"] .' " size="22" disabled/>';
                echo '</div>';

                echo '<div class="col form-group">';
                echo '<label>Shipping Instructions</label>';
                echo '<input class="form-control" value="' . $row2["shippinginstructions"] .' " size="22" disabled/>';
                echo '</div>';

                echo '<div class="col form-group">';
                echo '<label>Expiry date</label>';
                echo '<input class="form-control" value="' . $row2["expirydate"] .' " size="22" disabled/>';
                echo '</div>';
    
            }



            ?>

        </div>
    </div>

    </article> <!-- card-body end .// -->
        </div> <!-- card.// -->
        </div> <!-- col.//-->
        
        </div> <!-- row.//-->
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