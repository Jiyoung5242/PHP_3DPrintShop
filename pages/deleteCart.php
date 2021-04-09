<?php
	
    include("connection.php");
    $id = $_GET['cartid'];
    $sql = "DELETE FROM cart WHERE CartID = ('$id')";

    if ($conn->query($sql) === TRUE) {

         echo "SUCCESS"; 
        //echo "<li><a href='../pages/uploadFile.php'>업로드페이지로 이동</a></li>";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn); // 디비 접속 닫기

	header("location: myCart.php");

?>