<?php
session_start();
include("connect.php");
session_start();
include ("head.html");
$id=null;
$error = "error";
?>
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
<?php
if(isset($_SESSION['id555'])){//if someone login
   ?>
  <html>
<body>
<h5> <?php echo "please choose the properties of the work and then,you will have the option to upload, a file";?> </h5>
<?php
  if (isset($_POST['submit'])){//after the costumer chose the prperties for the file that he will upload next
    $id=$_SESSION['id555'];
    $kind = mysqli_real_escape_string($db, $_POST['kind']);
    $binding = mysqli_real_escape_string($db, $_POST['binding']);
    $color = mysqli_real_escape_string($db, $_POST['color']);
    $date =date("y/m/d G.i:s<br>", time());
    $_SESSION['date']=$date;
    $insetQuery = "INSERT INTO work(id, date, kind, binding, color ) VALUES ('$id','$date','$kind','$binding','$color') ";
    if (mysqli_query($db, $insetQuery)){ 
      ?>
      <script type="text/javascript">
      window.location.href = 'file.php';
  </script>
  <?php
    }
    else ?>
    <h5><?php echo "something is wrong"; ?></h5>
    <?php
      }
else{//the customer will chose the properties of his work
?>

                <form method="post" action="" >
                   <label>kind of work</label> <br/>
                   <select name="kind">
                   <option value="1-sided B&W">1-sided B&W</option>
                   <option value="1-sided color">1-sided color</option>
                   <option value="2-sided B&W">2-sided B&W</option>
                   <option value="2-sided color">2-sided color</option>
                   <option value="booklet">booklet</option>

                   </select>
                   <br/>

                    <label>binding</label> <br/>
                    <select name="binding">
                    <option value="metal spiral">none</option>
                   <option value="metal spiral">metal spiral</option>
                   <option value="plastic spiral">plastic spiral</option>
                   <option value="booklet">punch</option>
                   <option value="hot glue">hot glue</option>

                   </select>
                   <br/>

                    <label>color</label> <br/>
                    <select name="color">
                    <option value="yellow">none</option>
                   <option value="yellow">yellow</option>
                   <option value="red" >red</option>
                   <option value="green">green</option>
                   <option value="blue">blue</option>
                   <option value="orange">orange</option>
                   <option value="brown">brown</option>
                   <option value="black">black</option>
                   </select>

                   <br/>
                   <input type="submit" name="submit" value="Continue"/> <br/>
                 
                </form>


                <?php
}
}
else {
?>
<h5><?php echo "you need to log in first!"; ?></h5>

<?php
}
?>