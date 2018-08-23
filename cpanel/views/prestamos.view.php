<!DOCTYPE html>
<html lang="es-MX">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BiblioTec - Libros</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo RUTA ?>css/master.css">

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
    <div class="wrap-content container-fluid" id="form">
      <div class="row">
        <div class="col-md-2">
          <a href="libros.php#page" class="btn btn-back"><span class="glyphicon glyphicon-arrow-left"></span> Volver</a>
        </div>
        <div class="col-md-9">
          <form class="" name="form-busqueda" action="libros.php<?php if(isset($_GET['buscando'])) echo "?buscando=" ?>#page" method="post">
            <div class="input-group search">
              <input type="text" class="form-control search-bar" placeholder="Buscar libro" onchange="this.form.submit()" name="busqueda"
              value="<?php if(isset($_POST['busqueda'])) echo $_POST['busqueda']; else echo ''; ?>">
              <div class="input-group-btn search-btn">
                <button class="btn btn-default" type="submit">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </div><!--search-btn-->
            </div><!--search-->
          </form>
        </div>
      </div>
      <div class="details">
        <div class="row">
          <p style="margin-bottom: -15px; font-family: roboto; font-size: 16px;">ISBN: <?php echo $isbn ?></p>
          <h1><?php echo $titulo ?> <small>POR: <?php echo $autor ?></small></h1>
          <p class="disponibilidad disponible"><span class="glyphicon glyphicon-book"></span> <?php echo $enBiblioteca." en biblioteca"; ?></p>
          <p class="disponibilidad no-disponible"><span class="glyphicon glyphicon-book"></span> <?php  if($cantidadPrestados['cantidad'] == 0) echo "Ninguno prestado"; elseif($cantidadPrestados['cantidad'] == 1) echo $cantidadPrestados['cantidad']." prestado"; elseif($cantidadPrestados['cantidad'] > 1) echo $cantidadPrestados['cantidad']." prestados"; ?></p>
        </div>
        <div class="prestamos">
          <h1>Prestamos</h1>
          <?php if ($cantidadPrestados['cantidad'] != 0): ?>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Folio</th>
                <th scope="col">Nombre</th>
                <th scope="col">Carrera</th>
                <th scope="col">Fecha prestamos</th>
                <th scope="col">Herramientas</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($prestamos as $prestamo): ?>
                <tr>
                  <th scope="row"><?php echo str_pad($prestamo['folio'], 4, 0, STR_PAD_LEFT)?></th>
                  <td><?php echo $prestamo['nombre'] ?></td>
                  <td><?php echo $prestamo['carrera'] ?></td>
                  <td><?php echo $prestamo['fecha_prestamo'] ?></td>
                  <td><a href="prestamos.php?devolver=&isbn=<?php echo $prestamo['isbn'] ?>#page" class="btn btn-success">Devolver</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <h2>No hay prestamos de este libro actualmente</h2>
        <?php endif; ?>
        </div>
      </div>
    </div><!--wrap-content-->
  </div> <!--main-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
