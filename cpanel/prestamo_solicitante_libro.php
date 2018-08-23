<?php session_start(); ?>
<?php require_once 'php/funciones.php'; ?>
<?php requireLogin(); ?>
<?php require 'php/config.php'; ?>
<?php

  include 'php/conexion.php';
  $conexion = conectarDB();

  $escrito=0;
  $enc=0;
  $control="";
  $isbn=$_GET['isbn'];


  if (isset($_POST['buscar']) && !empty($_POST['Ncontrol'])) {
      $control=$_POST['Ncontrol'];
      $resultado = $conexion -> query("Select * from solicitante where no_control='$control';");
      $resultado = $resultado -> fetch();
      if (!empty($resultado)) {
          $enc=1;
      }
      $escrito=1;
  }

  if (isset($_POST['nom']) && isset($_POST['carr'])) {
      if (($_POST['nom'] != null)&&($_POST['carr'] != null)) {
          $control=$_POST['Ncontrol'];
          $nombre=$_POST['nom'];
          $carrera=$_POST['carr'];
          $conexion -> query("insert into solicitante values('$control','$nombre','$carrera');");
      }
  }

  if(isset($_POST['sig'])){

      $control=$_GET['cont'];

      $conexion -> query("insert into prestamos(folio,Libro_ISBN,Solicitante_no_control,fecha_prestamo)
                            values(null,'$isbn','$control',null);");

      header("Location: menu_admin.php");
  }


  /*if(isset($_POST['Ncontrol'])){
    if ($_POST['Ncontrol'] != null) {
        $control=$_POST['Ncontrol'];
        $resultado = $conexion -> query("Select * from solicitante where no_control=$control;");
        $resultado = $resultado -> fetch();
        $ban=1;
        // if ($control==12) {
        //     // $resultado = $conexion -> query("Select * from solicitante where no_control=$control;");
        //     $resultado = $resultado -> fetch();
        //     $ban=1;
        // }
    }
  }*/

 ?>
<?php require 'views/prestamo_solicitante_libro.view.php' ?>
