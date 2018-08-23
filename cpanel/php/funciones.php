<?php
  function requireLogin(){
    if (!isset($_SESSION['usuario'])) {
      header('Location: login.php');
    }
  }
?>
