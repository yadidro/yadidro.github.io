<?php
    include('connect.php');

    $error = "";

    if (isset($_POST['submit'])){

        $firstName = mysqli_real_escape_string($con, $_POST['fname']);
        $lastName = mysqli_real_escape_string($con,$_POST['lname']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $passwordConfirm = mysqli_real_escape_string($con, $_POST['passwordConfirm']);

        $image = $_FILES['image']['name'];
        $tmp_image = $_FILES['image']['tmp_name'];
        $imageSize = $_FILES['image']['size'];

        $date = date("F, d Y");
        #echo $firstName."<br/>".$lastName."<br/>".$lastName."<br/>".$email."<br/>".$password."<br/>".$passwordConfirm."<br/>".$image."<br/>".$imageSize."<br/>";



        if(strlen($firstName)<3){
            $error = "first name is too short";
        }
        else if (strlen($lastName)<3){
            $error = "last name is too short";
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = "please enter valid email address";
        } else if (strlen($password)<8){
            $error = "password must be 8 characters at least";
        }  else if ($password !== $passwordConfirm){
            $error = "password is not match";
        }else if ($image==""){
            $error = "please upload image";
        }else if($imageSize> 5*1024*1024){
            $error = "image size must be less then 5mb";

        }
        else{
            #$error = "successfully registered";
            $password = md5($password); #encrypt in the data base

            $imageExt = explode("." , $image);
            $imageExtension = strtolower($imageExt[1]) ;

            if($imageExtension == 'jpg' ||$imageExtension == 'png' ||$imageExtension == 'jpeg') {


                $image = rand(0, 100000) . rand(0, 10000) . rand(0, 100000) . time() . "." . $imageExtension; #uniq name for every image


                $insetQuery = "INSERT INTO users(firstName, lastName, email, password, image , date ) VALUES ('$firstName','$lastName','$email','$password','$image','$date') ";
                if (mysqli_query($con, $insetQuery)) {
                    if (move_uploaded_file($tmp_image, "images//.$image")) {
                        $error = "you are seccessfully registeder";
                    } else {
                        $error = "image is not uploaded";
                    }

                }
            }

            else{
                $error= "File must be image";
            }

        }







    }

?>



