<?php session_start(); ?>
<?php require_once 'php/funciones.php'; ?>
<?php requireLogin(); ?>
<?php require 'php/config.php'; ?>
<?php require 'php/conexion.php'; $conexion = conectarDB(); ?>
<?php require 'php/sql.php';?>
<?php

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
  if (isset($_GET['prestados'])) {
    if (isset($_POST['busqueda'])) {
      obtenerLibrosPrestados($_SESSION['filters'],$_POST['busqueda'], $conexion);
    }else{
      $libros = obtenerLibrosPrestados($_SESSION['filters'],"", $conexion);
    }
  }else{
    if (isset($_POST['busqueda'])) {
      $libros = obtenerLibros($_SESSION['filters'],$_POST['busqueda'], $conexion);
    }else{
      $libros = obtenerLibros($_SESSION['filters'],"", $conexion);
    }
  }



  $asignaturas = obtenerAsignaturas($_SESSION['filters'], $conexion);

  $redireccion = isset($_GET['buscando'])? 'prestamo_libro.php' : 'prestamos.php';


?>
<?php require 'views/libros.view.php' ?>
