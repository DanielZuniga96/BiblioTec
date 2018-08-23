<?php require 'php/config.php'; ?>
<?php require 'php/conexion.php'; $conexion = conectarDB(); ?>
<?php require 'php/sql.php';?>
<?php
  session_start();

  // filtros setup
  if(!isset($_SESSION['filters'])){
    $_SESSION['filters'] = array();
  }

  if (isset($_GET['filter'])) {
    $_SESSION['filters'][$_GET['filter']] = $_GET['filter'];
  }

  //filtros remove
  if (isset($_GET['remove'])) {
    $_SESSION['filters'] = array_diff($_SESSION['filters'], array($_GET['remove']));
  }

  //llenado de lista libros
  if (isset($_POST['busqueda'])) {
    $libros = obtenerLibros($_SESSION['filters'],$_POST['busqueda'], $conexion);
  }else{
    $libros = obtenerLibros($_SESSION['filters'],"", $conexion);
  }



  $asignaturas = obtenerAsignaturas($_SESSION['filters'], $conexion);

  $redireccion = isset($_GET['buscando'])? 'prestamo_libro.php' : 'info_libro.php';


?>
<?php require 'views/libros.view.php' ?>
