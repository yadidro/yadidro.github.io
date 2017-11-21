<?php
    function email_exists($email, $con){
        $resault = mysqli_query( $con ,  "SELECT id FROM users WHERE email='$email' ");
        if(mysqli_num_rows($resault)==1){
            return true;
        }else{
            return false;
        }


    }



?>


