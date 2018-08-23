<?php session_start();

  if(isset($_SESSION['usuario'])){
    header('Location: menu_admin.php');
  }else {
    header('Location: login.php');
  }

 ?>
