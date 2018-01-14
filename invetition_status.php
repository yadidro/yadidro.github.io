<?php
include("connect.php");
session_start();
include ("head.html");
$error = "";
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
    <a href="upload.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">order a work to print</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-white">see orderd works</a>
</div>
   <head>
   <div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
    
    <?php
if(isset($_SESSION['id555'])){//if a customer login
$id=$_SESSION['id555'];
   $sql = "SELECT * FROM work WHERE id = '$id'";//take all the work information about this customer
   $result = $db->query($sql);
   
   if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
           ?>
          <h5><?php echo "<br> order number: ". $row["order_num"]. " - date: ". $row["date"]. " -kind:" . $row["kind"]. "<br>". " -binding:" . $row["binding"] . " -color:" . $row["color"]  . " -invitation status:" . $row["inv_stu"]. "<br>"; ?></h5>
          <?php
       }
   } else {
       echo "0 results";
   }

}
else {
?>
<h5><?php echo "you need to log in first!"; ?></h5>
<?php }?>