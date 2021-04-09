<?php

    session_start();   
    $AccountID = $_SESSION['AccountID'];
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/upload';

    $message = '';
    if (isset($_FILES)) {
        $file = $_FILES["file"];
        $error = $file["error"];
        $name = $file["name"];
        $type = $file["type"];
        $size = $file["size"];
        $tmp_name = $file["tmp_name"];

        if ($error > 0) {
            $message = "Error: " . $error;
        } else {
            $temp = explode(".", $name);
            $extension = end($temp);

            if (($size / 1024 / 1024) < 2. && in_array($extension, $allowedExts)) {
                //echo "Upload: " . $name . "<br>";
                //echo "Type: " . $type . "<br>";
                //echo "Size: " . ($size / 1024 / 1024) . " Mb<br>";
                //echo "Stored in: " . $tmp_name;
                if (file_exists("$uploads_dir/" . $name)) {
                    $message = $name . " already exists. ";
                } else {

                    //TODO: Change Login User's AccountID
                    include("connection.php");
                    $sql = "INSERT INTO File (FileName, FileData, AccountID) VALUES ('$name', '$extension', $AccountID)";

                    if ($conn->query($sql) === TRUE) {
                        move_uploaded_file($tmp_name, "$uploads_dir/" . $name);
                        $message =  "Upload Success: " . "upload/" . $name;
                    } else {
                        $message =  "Error: " . $sql . "<br>" . $conn->error;
                    }
                    mysqli_close($conn); // 디비 접속 닫기
                }
            } else {
                $message = ($size / 1024 / 1024) . " Mbyte is bigger than 2 Mb " . $extension . "format file is not allowed to upload ! ";
            }
        }
        // echo "<li><a href='../pages/uploadFile.php'>업로드페이지로 이동</a></li>";
    } else {
        $message = "File is not selected";
    }
    print "<script language=javascript> alert('$message'); location.replace('../pages/uploadFile.php'); </script>";
?>
