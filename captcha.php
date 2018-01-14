<?php
include ("head.html");
?>


<html>
    <!-- Navbar -->
    <div class="w3-top">
    <div class="w3-bar w3-red w3-card w3-left-align w3-large">
      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
      <a href="#" class="w3-bar-item w3-button w3-padding-large w3-white">sign in</a>
      <a href="signup.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">sign up</a>
      <a href="upload.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">order a work to print</a>
      <a href="invetition_status.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">see orderd works</a>
  </div>
   <head>
   <div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">    

<body>
<form method="post" action="login.php" onsubmit="return checkform(this);"> 
<!-- START CAPTCHA -->
<br>
<div class="capbox">

<div id="CaptchaDiv"></div>

<div class="capbox-inner">
Type the above number:<br>

<input type="hidden" id="txtCaptcha">
<input type="text" name="CaptchaInput" id="CaptchaInput" size="15"><br>

</div>
</div>
<br><br>
<input type="submit" name="submit" value="Send"/> <br/>
<!-- END CAPTCHA -->
</form>
<script language="JavaScript" type="text/javascript" src="Scripts/captcha.js"></script>

</body>
</html>