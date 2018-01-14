<?php
    $db = mysqli_connect("localhost","root","","dev_ver");
    if (mysqli_connect_errno()){
        echo "error occured while coneccting to db " . mysqli_connect_errno();


    }
    #echo "connected";

?>