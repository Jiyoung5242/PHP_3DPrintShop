<?php

$conn = mysqli_connect("localhost","root","","3dprintshop");
if (mysqli_connect_errno()){
    
    echo "error occured while connectiing with DB".mysqli_connect_errno();
}

?>