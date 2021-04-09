<?php

    // 파라미터 확인
    $cartIds_string = $_POST["cartIds"];
    if (empty($cartIds_string)){
        echo "plz, add cartIds parameter";
    }

    // 파라미터 배열 확인
    $cartIds = explode(",",$cartIds_string);
    if (empty($cartIds)){
        echo "cartIds has wrong format";
    }

    $shippingInstructions = $_POST["shippingInstructions"];
    $recipientName = $_POST["recipientName"];
    $phoneNumber = $_POST["phoneNumber"];
    $shipAddress = $_POST["shipAddress"];
    $cardNumber = $_POST["cardNumber"];
    $expiryDate = $_POST["expiryDate"];
    $tax = $_POST["tax"];
    $deliver = $_POST["deliver"];
    $totalCost = $_POST["totalCost"];

    // 데이터 확인용
   

    $mysqli = new mysqli("localhost","root","","3dprintshop");

    $AccountId = "1"; // $_SESSION['AccountId']
    // 주문입력
    // AccountId 가져오는 함수로 AccountId를 넣어야 함 // 현재는 임시로 1로 넣음
    // ShippingType 확인필요
    // Discount 코드가 반드시 필요하지 않도록 필드를 null로 바꿔야 함 // 현재는 임시로 freemoney 로 넣음
    $sql1 = 'INSERT INTO `Order` (AccountId, RecipientName, PhoneNumber, ShippingInstructions, ShipDate, ShipAddress, ShippingType, DiscountCode, ifPaymentConfirmed, DeliveryCost, Tax, TotalCost, `Type`, CardNumber, ExpiryDate)' .
    'VALUES ('.$AccountId.', "' . $recipientName . '", "' . $phoneNumber . '", "' . $shippingInstructions . '", CURRENT_TIMESTAMP, "' . $shipAddress . '", "Shipping", "freemoney", 
    false, ' . $deliver. ',' . $tax. ',' . $totalCost . ', "debit", "' . $cardNumber . '", "' . $expiryDate . '")';

    // 주문정보를 넣고
    $message = '';
    if ($mysqli -> query($sql1)) {

        // 주문정보가 잘 담기면
        $last_uid = $mysqli -> insert_id;
        echo 'last_uid: ' . $last_uid . '<br/>';

        // 주문아이템입력
        for($i = 0; $i < count($cartIds); $i++) {
            $sql_select = "SELECT C.ModelID, C.Quantity, M.ModelName, M.ModelImage, M.Size, M.Infill, M.Colour, M.Cost FROM Cart as C INNER JOIN Model as M on C.ModelID = M.ModelID where CartID = " . $cartIds[$i];
            $result = $mysqli -> query($sql_select);

            // 아이디로 조회해서 과는 1개 밖에 안나와야 정상
            while ($row = mysqli_fetch_assoc($result)) {
                $sql2 = "insert into OrderItem (OrderID, ModelID, Quantity) values ('$last_uid', " . $row["ModelID"] . ", " . $row["Quantity"] . ")";
                if ($mysqli -> query($sql2) !== TRUE) {
                    // 에러 전체 리셋 해야 정상 // 그럼 transaction 개념이 들어가야 함
                }
            }
        }

        // 카트삭제
        $sql3 = "DELETE FROM Cart WHERE CartID in ($cartIds_string)";
        echo 'sql3:' . $sql3 . '<br/>';

        if ($mysqli -> query($sql3) === TRUE) {
            $message = "Order Success";
        } else {
            $message = "Order Error: " . $sql3 . "<br>" . $mysqli -> error;
        }

    } else {
        $message = "Order Error: " . $sql1 . "<br>" . $mysqli -> error;
    }
    print "<script language=javascript> alert('$message'); location.replace('../pages/myOrder.php'); </script>";
    $mysqli -> close();
?>
