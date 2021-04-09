<!DOCTYPE html>
-->
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
            <div class="center btmspace-8">
                <h6 class="heading underline font-x2">Upload File</h6>
            </div>

            <div class="Aligner">
                <form action="uploadFileProc.php" method="post" enctype="multipart/form-data">
                    Upload File
                    <br/>
                    <input type="file" name="file" id="file" value="Search File"/>
                    <input type="submit" name="submit" value="Upload your file"/>
                </form>
            </div>

            <!--            <form action="upload_file.php" method="post" enctype="multipart/form-data">-->
            <!--                <label for="file">Filename:</label>-->
            <!--                <input type="file" name="file" id="file"><br>-->
            <!--                <input type="submit" name="submit" value="Submit">-->
            <!--            </form>-->

            <!--    <div class="col-md-2"></div>  -->
            <!--    <footer class="center"><a class="btn" href="#">Bibendum eget hendrerit</a></footer>-->
            <!-- ################################################################################################ -->
        </section>
        <section class="hoc container clear">
            <div class="center btmspace-8">
                <h6 class="heading underline font-x2">File List</h6>
            </div>

            <div class="Aligner">
                <?php

                $conn = mysqli_connect("localhost","root", "","3dprintshop");
                if (mysqli_connect_errno()) {
                    echo "error occured while connectiing with DB" . mysqli_connect_errno();
                }

                $sql = "SELECT FileID, FileName, FileCreatedDate FROM File";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo "<table border=\"1\">";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<th>FileName</th>
                              <th>FileCreatedDate</th>
                                <tr>
                                    <td>" . $row["FileName"] . "<br/><a href=\"./deleteFileProc.php?id=" .
                            $row["FileID"] . "&name=" . $row['FileName'] . "\">Delete</a>" . "</td>
                                    <td>" . $row["FileCreatedDate"] . "</td>
                                </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "데이터가 없습니다.";
                }
                mysqli_close($conn); // 디비 접속 닫기

                ?>
            </div>

        </section>
    </div>
<?php include "./footer.html" ?>

<!-- JAVASCRIPTS -->
    <script src="layout/scripts/jquery.min.js"></script>
    <script src="layout/scripts/jquery.backtotop.js"></script>
    <script src="layout/scripts/jquery.mobilemenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>
</body>
</html>