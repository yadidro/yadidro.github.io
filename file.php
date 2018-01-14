<?php
//after the customer has finished to enter all his work deatils,he will arrive to this page to load the file of his work
include("connect.php");
session_start();
include ("head.html");
$error = "";
$file_name=null;
$file_size=null;
$file_type=null;
$date=$_SESSION['date'];//we want to know the time,to select the properties that belong to the file which will be loaded
?>
<html>
<body>
<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
    <a href="captcha.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">sign in</a>
    <a href="signup.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">sign up</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-white">order a work to print</a>
    <a href="invetition_status.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">see orderd works</a>
</div>
   <head>
   <div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
       <form action="" method="POST" enctype="multipart/form-data">
          <input type="file" name="image" value="Choose a file"/>
          <input type="submit" value="Send"/>

       </form>
    </div>
   
    <br/>


</body>

           <h5> <?php echo $error;?> </h5>
           <?php
        //upload file
        if(isset($_FILES['image'])){
          $errors= array();
          $num_inv_req="SELECT order_num FROM work WHERE date= '$date'";
          $result = $db->query($num_inv_req);
          $row2 = $result->fetch_assoc();
          $file_num_inv=(string) $row2["order_num"];
          $file_name =$_FILES['image']['name'];
          ?>
          <h5><?php echo $file_name; ?></h5>
          <?php
          $file_size =$_FILES['image']['size'];
          $file_tmp =$_FILES['image']['tmp_name'];
          $file_type=$_FILES['image']['type'];
          $explode=explode('.',$_FILES['image']['name']);
          $file_ext=strtolower(end($explode));
          $new_file_name=(string)$file_num_inv.".".$file_ext;//change the name of the file to his number order name.In this way,we can know the properties of the file accroding to the data-base.
          $expensions= array("jpeg","jpg","png","pdf");
          
          if(in_array($file_ext,$expensions)=== false){
             $errors[]="extension not allowed, please choose a JPEG or PNG or PDF file.";
          }
          
          if($file_size > 2097152){
             $errors[]='File size must be excately 2 MB';
          }
          if($file_size==0){
           $errors[]='File size must be excately 2 MB';
        }
          
          if(empty($errors)==true){
             chmod ($file_tmp, 666);//change the file permissions,so it can't be executed
             move_uploaded_file( $file_tmp,"Uploads/".$new_file_name);
             ?>
            <h5><?php echo "Success";?> </h5>
            <?php
          }else{
             print_r($errors);
          }
       
          
       
          
       }
?>
       <form>
       <ul>
             <h5>Sent file: <?php echo  $file_name ?> </h5>
             <h5>File size: <?php echo  $file_size ?></h5>
             <h5>File type: <?php echo  $file_type ?></h5>
          </ul>
      </form>
  
