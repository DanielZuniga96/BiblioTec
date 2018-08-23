<?php session_start(); ?>
<?php require_once 'php/funciones.php'; ?>
<?php requireLogin(); ?>
<?php require 'php/config.php'; ?>
<?php include 'php/conexion.php'; $conexion = conectarDB();?>
<?php include 'php/sql.php'; ?>
<?php
  $isbn_set = false;
  $isbn_found = false;

  $adquisicion = "";
  $cantidad = "1";
  $isbn = "";
  $titulo = "";
  $autor = "";
  $editorial = "";
  $anio = "";
  $paginas = "";
  $formato = "";
  $asignatura = "";
  $observaciones = "";

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['btn_buscar'])) {
    $adquisicion = $_POST['selectedAdq'];
    $cantidad = $_POST['libro-cantidad'];
    $isbn = $_POST['libro-isbn'];
    $titulo = $_POST['libro-titulo'];
    $autor = $_POST['libro-autor'];
    $editorial = $_POST['libro-editorial'];
    $anio = $_POST['libro-anio'];
    $paginas = $_POST['libro-paginas'];
    $formato = $_POST['libro-formato'];
    $observaciones = $_POST['libro-observaciones'];
  }

  if (isset($_POST['btn_nueva_asign'])) {
    $isbn_found = false;
    $isbn_set = true;

    $nombreAsig = $_POST['asig-nombre'];
    $descAsig = $_POST['asig-desc'];

    if (!empty($nombreAsig)) {
      if (empty(buscarAsignatura($nombreAsig, $conexion))) {
        insertAsignatura($nombreAsig, $descAsig, $conexion);
      }
      $selected_asignatura = strtoupper($nombreAsig);
    }

  }

  $adquisiciones = getAdquisiciones($conexion);

  if (isset($_POST['selectedAdq']) && isset($_POST['libro-cantidad'])) {
    $selected_adquisicion = $_POST['selectedAdq'];
    $cantidad = $_POST['libro-cantidad'];
  }

  if (isset($_POST['btn_buscar']) && !empty($_POST['libro-isbn'])) {

    $isbn = $_POST['libro-isbn'];

    if(!empty($datos_libro = getbook($isbn, $conexion))){
      $isbn_found = true;
    }

    $isbn_set = true;
  }


  if (isset($_POST['btn-registrar']) && !empty($_POST['libro-isbn'])) {
    $guardado = true;
    $isbn = $_POST['libro-isbn'];
    $adquisicion = $_POST['selectedAdq'];
    $cantidad = $_POST['libro-cantidad'];
    $observaciones = $_POST['libro-observaciones'];

    if(empty(getbook($isbn, $conexion))) {
      $libros[] = array();
      $libro['isbn'] = strtoupper(trim($_POST['libro-isbn']));
      $libro['titulo'] = strtoupper(trim($_POST['libro-titulo']));
      $libro['autor'] = strtoupper(trim($_POST['libro-autor']));
      $libro['editorial'] = strtoupper(trim($_POST['libro-editorial']));
      $libro['anio'] = strtoupper(trim($_POST['libro-anio']));
      $libro['paginas'] = strtoupper(trim($_POST['libro-paginas']));
      $libro['formato'] = strtoupper(trim($_POST['libro-formato']));
      $libro['asignatura'] = strtoupper(trim($_POST['libro-asignatura']));

      if(insertLibro($libro, $conexion)){
        for ($i=0; $i < $cantidad; $i++) {
          $sigcantidad = cantidadLibros($isbn, $conexion);
          $sigcantidad['cantidad']++;
          if(!insertAdqXLibro($adquisicion, $isbn, $sigcantidad['cantidad'], $observaciones, $conexion)){
            $guardado = false;
          }
        }
      }else{
        $guardado = false;
      }
    }else{
      for ($i=0; $i < $cantidad; $i++) {
        $sigcantidad = cantidadLibros($isbn, $conexion);
        $sigcantidad['cantidad']++;
        if(!insertAdqXLibro($adquisicion, $isbn, $sigcantidad['cantidad'], $observaciones, $conexion)){
          $guardado = false;
        }
      }
    }
  }
?>
<?php require 'views/registrar_libro.view.php' ?>
