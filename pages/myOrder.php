<?php
    session_start();
    $AccountID = $_SESSION['AccountID'];
    if(!$AccountID){
        print "<script language=javascript> alert('You need to Login first'); location.replace('../pages/login.php'); </script>";
    }
?>
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
  <?php include "./topbar.html" ?>

    <?php include "./header_menu.html" ?>
  <div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
 
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <h2>My Orders</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Shipping Date</th>
                        <th class="text-center">Status</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                <?php

                $conn = mysqli_connect("localhost","root", "","3dprintshop");
                if (mysqli_connect_errno()) {
                    echo "error occured while connectiing with DB" . mysqli_connect_errno();
                }

                $sql1 = "select * from `Order` where AccountID = " . $AccountID;
                $result = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        $orderQuantity = 0;
                        $orderModelName = '';

                        $sql2 = "select O.Quantity, M.ModelName from OrderItem as O inner join Model as M on O.ModelID = M.ModelID where O.OrderID = " . $row["OrderID"];
                        $result2 = mysqli_query($conn, $sql2);
                        if (mysqli_num_rows($result2) > 0) {
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                $orderQuantity = $orderQuantity + $row2["Quantity"];// int
                                if (!$orderModelName){
                                    // $orderModelName 이 '' 이면
                                    $orderModelName = $row2["ModelName"];
                                }
                            }
                        }

                        echo '<tr>
                            <td class="col-sm-2 col_md-1">
                                <h5>' . $row["OrderID"] . '</h5>
                            </td>
                            
                            <td class="col-sm-5 col_md-1">
                                <h4 class="media-heading"><a href="../pages/orderDetail.php?id=' . $row["OrderID"] . '">' . $orderModelName . '</a></h4>';

                        if(mysqli_num_rows($result2) > 1){
                            echo '<span>and </span><span class="text-success"><strong>' . (mysqli_num_rows($result2) - 1) . ' items</strong></span>';
                        }

                       echo '</td>
                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                <h5 class="media-heading">' . $orderQuantity . '</h5>
                            </td>
                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                <h5 class="media-heading">' . ($row["TotalCost"] + $row["Tax"] + $row["DeliveryCost"]) . '$</h5>
                            </td>
                            <td class="col-sm-2 col-md-2 text-center"><strong>' . $row["ShipDate"] . '</strong></td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>
                            ' . $row["ShippingType"] . '
                            </strong></td>
                            <td class="col-sm-1 col-md-1"></td>
                        </tr>';
                    }
                } else {
                    echo "No Data exist.";
                }
                mysqli_close($conn); // 디비 접속 닫기

                ?>
                </tbody>
            </table>
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