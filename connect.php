<?php
    $con = mysqli_connect("localhost","root","","registration");
    if (mysqli_connect_errno()){
        echo "error occured while coneccting to db " . mysqli_connect_errno();


    }
    #echo "connected";

?>