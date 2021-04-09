<?php
    $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/upload';
    $id = $_GET["id"];
    $name = $_GET["name"];

    include("connection.php");
    $message = '';
    $sql = "DELETE FROM File WHERE FileID = ('$id')";

    if ($conn->query($sql) === TRUE) {

          if (file_exists("$uploads_dir/" . $name)) {
              unlink("$uploads_dir/" . $name);
              $message = "Remove Success: " . "upload/" . $name;
          } else {
              $message = $name . " not exists. ";
          }
        //echo "<li><a href='../pages/uploadFile.php'>업로드페이지로 이동</a></li>";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn); // 디비 접속 닫기
    print "<script language=javascript> alert('$message'); location.replace('../pages/uploadFile.php'); </script>";
?>
