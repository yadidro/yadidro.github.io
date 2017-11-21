<?php
    include('connect.php');
    include('functions.php');
    $error = "";

    if (isset($_POST['submit'])){

        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        if(email_exists($email, $con)){
            $result = mysqli_query($con, "SELECT password FROM users WHERE email='$email'");
            $retrievpassword = mysqli_fetch_assoc($result);


            if (md5($password) !== $retrievpassword['password']){
                $error = "password is incorect";
            }else{

                $error = "password  corect";

            }

        }



        else{

            $error= "email is not exist";
        }

    }

?>



