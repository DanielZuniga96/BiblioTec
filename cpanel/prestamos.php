<?php session_start(); ?>
<?php require_once 'php/funciones.php'; ?>
<?php requireLogin(); ?>
<?php require 'php/config.php'; ?>
<?php require 'php/conexion.php'; $conexion = conectarDB(); ?>
<?php require 'php/sql.php';?>

<?php
    $isbn=$_GET['isbn'];

    if (isset($_GET['devolver'])) {
      devolverPrestamo($isbn, $conexion);
    }

    $libro = getBook($isbn, $conexion);
    $prestamos = infoPrestados($isbn, $conexion);

    $titulo = $libro['titulo'];
    $autor = $libro['autor'];
    $cantidadTotal = cantidadLibros($isbn, $conexion);
    $cantidadPrestados = cantidadLibroPrestados($isbn, $conexion);

    $enBiblioteca = (int)$cantidadTotal['cantidad'] - (int)$cantidadPrestados['cantidad'];

?>
<?php require 'views/prestamos.view.php' ?>
