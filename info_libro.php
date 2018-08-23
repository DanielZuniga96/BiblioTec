<?php require 'php/config.php'; ?>
<?php require 'php/conexion.php'; $conexion = conectarDB()?>
<?php require 'php/sql.php'; ?>
<?php
  $isbn =$_GET['isbn'];

  $datos_libro = getBook($isbn, $conexion);

  $titulo = $datos_libro['titulo'];
  $autor = $datos_libro['autor'];
  $editorial = $datos_libro['editorial'];
  $anio = $datos_libro['anio_edicion'];
  $paginas = $datos_libro['paginas'];
  $formato = $datos_libro['formato'];
  $asignatura = $datos_libro['Asignatura'];

  $cantidadTotal = cantidadLibros($isbn, $conexion);
  $cantidadPrestados = cantidadLibroPrestados($isbn, $conexion);

  $disponibles = (int)$cantidadTotal['cantidad'] - (int)$cantidadPrestados['cantidad'];
  echo $disponibles;
?>
<?php require 'views/info_libro.view.php' ?>
