<!DOCTYPE html>
<html lang="es-MX">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BiblioTec - Libros</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/estilos_menu.css">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <div class="main">
      <div class="banner">
          <img class="img img-responsive" src="<?php echo RUTA ?>img/sep_white.png" alt="">
          <div class="title">
              <div class="tittle-container"><a href="menu_admin.php"><h1>BiblioTec<small>Virtual</small></h1></a></div>
          </div><!--tittle-->
      </div><!--banner-->

      <div class="wrap-content row" id="">

          <a class="boton_personalizado btn1" href="libros.php#page"> <p>Inventario<br>de<br>libros</p></a>

          <a class="boton_personalizado btn1" href="registrar_libro.php"> <p>Registrar<br>nuevo libro</p> </a>

          <a class="boton_personalizado btn2" href="prestamo_libro.php"> <p>Realizar<br>Prestamo</p> </a>

          <a class="boton_personalizado btn3" href="libros.php?prestados="> <p>Prestamos</p></a>

          <a class="boton_personalizado btnSalir" href="logout.php"> <p>Salir</p></a>

      </div> <!--main-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
