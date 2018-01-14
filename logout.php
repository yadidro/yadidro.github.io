<?php
   session_start();
   unset($_SESSION['login_user']);
   unset($_SESSION["id555"]);
   unset($_SESSION['date']);
   
   header('Refresh: 1; URL = index.php');
?>