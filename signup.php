<?php
include("connect.php");
session_start();
include ("head.html");
$error = "";
$credit=null;
$firstName=null;

if (isset($_POST['submit'])){//if the user push the "send" button on the login system
//take all the details from the sign in system
    
    $firstName1=mysqli_real_escape_string($db, $_POST['fname']);//defend from sql injections (the function delete all resevd words of sql)
    $firstName = htmlspecialchars($firstName1,ENT_COMPAT);//defend from XSS attacks via client-side code (usually with JavaScript)

    $lastName1 = mysqli_real_escape_string($db,$_POST['lname']);
    $lastName = htmlspecialchars($lastName1,ENT_COMPAT);

    $email1 = mysqli_real_escape_string($db,$_POST['email']);
    $email = htmlspecialchars($email1,ENT_COMPAT);

    $password1 = mysqli_real_escape_string($db, $_POST['password']);
    $password = htmlspecialchars($password1,ENT_COMPAT);

    $passwordConfirm1 = mysqli_real_escape_string($db, $_POST['passwordConfirm']);
    $passwordConfirm = htmlspecialchars($passwordConfirm1,ENT_COMPAT);

    $credit1 = mysqli_real_escape_string($db, $_POST['credit']);
    $credit = htmlspecialchars($credit1,ENT_COMPAT);

    $id1 = mysqli_real_escape_string($db, $_POST['id']);
    $id = htmlspecialchars($id1,ENT_COMPAT);

    $check_email="SELECT email FROM users where email='$email'";
    $check_id="SELECT id FROM users where id='$id'";
    $result_email=mysqli_query($db,$check_email);
    $result_id=mysqli_query($db,$check_id);
    
 if(strlen($firstName)<3){
  
        $error = "first name is too short";
    }
    else if (strlen($lastName)<3){
        $error = "last name is too short";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "please enter valid email address";
    }
    else if (mysqli_num_rows($result_email)<>0) {//check if the email is not already in use
        $error = "This mail is already in use";
    }
       else if (strlen($password)<8){
        $error = "password must be 8 characters at least";
    } 
     else if ($password !== $passwordConfirm){
        $error = "password is not match";
    } 
    else if (strlen($id)>10){
        $error = "id too long";
    }
    else if (mysqli_num_rows($result_id)<>0) {//check if the id is not already in use
        $error = "This id is already in use";
    }
    else if (strlen($credit)<16){
        $error = "credit must be 16 characters at least";
    } 
     else{
         $password_new = md5($password);//encrypt the password
   $credit_new=md5($credit);//encript the credit-card number
            $insetQuery = "INSERT INTO users(firstName,lastname,email,password,credit,id) VALUES ('$firstName','$lastName','$email','$password_new','$credit_new','$id') ";
           if (mysqli_query($db, $insetQuery)){ //if all the information has entered succsesfully to the data-basa
                   $error = "you are successfully registered";}
                 else {
                   $error = "somthing is wrong";}
    }
}
?>
<html>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
    <a href="captcha.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">sign in</a>
    <a href="signup.php" class="w3-bar-item w3-button w3-padding-large w3-white">sign up</a>
    <a href="upload.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">order a work to print</a>
    <a href="invetition_status.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">see orderd works</a>
</div>
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
    <div id="error"> <?php echo $error; ?> </div>

       

                <form method="post" action="" >


                    <label>First Name</label> <br/>
                    <input type="text" name="fname"/> <br/><br/>

                    <label>Last Name</label> <br/>
                    <input type="text" name="lname"/> <br/><br/>

                    <label>Email</label> <br/>
                    <input type="text" name="email"/> <br/><br/>

                    <label>Password</label> <br/>
                    <input type="password" name="password"/> <br/><br/>

                    <label>re-enter Password</label> <br/>
                    <input type="password" name="passwordConfirm"/> <br/><br/>


                   <label>credit</label> <br/>
                    <input type="password" name="credit"/> <br/><br/>

                    <label>id</label> <br/>
                    <input type="password" name="id"/> <br/><br/>
                  

                    <input type="submit" name="submit"/> <br/>



                </form>

            
    </body>

</html>
