<?php session_start(); ?>
<?php require_once 'php/funciones.php'; ?>
<?php requireLogin(); ?>

<?php require 'php/config.php'; ?>
<?php
    include 'php/conexion.php';
    $conexion = conectarDB();

    $busqueda = false;
    $encontrado=0;
    $isbn = "";


  if(isset($_GET['isbn'])){
    if ($_GET['isbn'] != null) {
      $isbn = $_GET['isbn'];
      $resultado = $conexion -> query("Select titulo, autor, editorial, anio_edicion from libro where isbn='$isbn';");
      $resultado = $resultado -> fetch();
      $busqueda = true;
      if (!empty($resultado)) {
        $encontrado=1;
      }

      //$resultado = array("Nombre" => "Juan", "Edad" => 21);
      //$resultado = "titulo";
    }

    }else{
        $resultado = "sin resultado";
    }

?>
<?php require_once 'views/prestamo_libro.view.php'; ?>
