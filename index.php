<?php
include("connect.php");
session_start();
include ("head.html");
?>

<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="captcha.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">sign in</a>
    <a href="signup.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">sign up</a>
    <a href="upload.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">order a work to print</a>
    <a href="invetition_status.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">see orderd works</a>
</div>



<?php if  (!isset($_SESSION['login_user'])){?>
  <header class="w3-container w3-red w3-left" style="padding:128px 16px">
  <h1> new user </h1>
  <?php ;}
  else{
    $login_session = $_SESSION['login_user']; ?>
    <header class="w3-container w3-red w3-left" style="padding:128px 16px">
  <h1> <?php print("Welcome " . $login_session . "!");?> </h1>
    <h1><a href = "logout.php">Sign Out</a></h1>
    <?php
  }
  ?>

</div>

<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">IMAGE PRINT</h1>
  <img src="Images/printer.jpg" alt="My test image">
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1>Welcome to IMAGE PRINT!</h1>
      <h5>Here we print:</h5>
      
  <h5>
    <li>pictures</li>
    <li>magazines</li>
    <li>booklets</li>
  </h5>
    </div>

    <div class="w3-third w3-center">
      <i class="fa fa-anchor w3-padding-64 w3-text-red"></i>
    </div>
  </div>
</div>

</body>
</html>
