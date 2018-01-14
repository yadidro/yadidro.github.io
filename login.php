<?php
session_start();
        If(isset($_SESSION['login_user'])){
?>
    <script type="text/javascript">
        window.location.href = 'index.php';
    </script>
    <?php
     }
  include("connect.php");

  include ("head.html");

   $error="";
   

   if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Submit'])) {
      // username and password sent from the user 
      
      $myusername1 = mysqli_real_escape_string($db,$_POST['username']);
      $myusername = htmlspecialchars($myusername1,ENT_COMPAT);

      $mypassword1 = mysqli_real_escape_string($db,$_POST['password']);
      $mypassword = htmlspecialchars($mypassword1,ENT_COMPAT);
      //encript the password in order to search it in the data base
      $my_md5_password=md5($mypassword) ;
      
      $sql = "SELECT id,firstName FROM users WHERE email = '$myusername' and password = '$my_md5_password'";
      $something = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($something ,MYSQLI_ASSOC);
      $error="";
      $count = mysqli_num_rows($something );

      // If result matched $myusername and $mypassword, table row must be 1 
		
      if($count == 1) {
          echo 'debug2';
       $result = $db->query($sql);
       $row2 = $result->fetch_assoc();
       $_SESSION['id555'] = $row2["id"];
       $_SESSION['login_user'] = $row2["firstName"];
      If(isset($_SESSION['login_user'])){
      echo 'debug3';

     # header('location: index.php');
     ?>
    <script type="text/javascript">
        window.location.href = 'index.php';
    </script>
    <?php
      }
        
      }else {
         $error = "Your Login Name or Password is invalid";
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
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-white">sign in</a>
    <a href="signup.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">sign up</a>
    <a href="upload.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">order a work to print</a>
    <a href="invetition_status.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">see orderd works</a>
</div>

   <div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>email  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" name="Submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>
      
   </body>
</html>
