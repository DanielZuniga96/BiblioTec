<!DOCTYPE html>
<html lang="es-MX">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BiblioTec - InfoLibros</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/master.css">

</head>
<body>
  <div class="main">
    <div class="banner">
      <img class="img img-responsive" src="<?php echo RUTA ?>img/sep_white.png" alt="">
      <div class="title">
        <div class="tittle-container"><a href="libros.php"><h1>BiblioTec<small>Virtual</small></h1></a></div>
      </div><!--tittle-->
    </div><!--banner-->
    <div class="wrap-content container-fluid" id="page">
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
          <p class="disponibilidad <?php if($disponibles != 0) echo "disponible"; else echo "no-disponible"; ?>"><span class="glyphicon glyphicon-book"></span> <?php if($disponibles == 1) echo $disponibles." Disponible"; elseif($disponibles > 1) echo $disponibles." Disponibles"; else echo "Ninguno Disponible"; ?></p>
        </div>
        <div class="info">
          <div class="form-group row">
            <div class="col-md-8">
                <label for="">Editorial</label>
                <input type="text" class="form-control" id="" placeholder="" name="libro-editorial" value="<?php echo $editorial ?>" readonly >
            </div>
          </div>
          <div class="form-group row">
          <div class="col-md-3">
              <label for="">Año de edicion</label>
              <input type="number" class="form-control" id="" placeholder="" name="libro-anio" min="1700" max="2100" value="<?php echo $anio ?>" readonly  >
          </div>
            <div class="col-md-2 ">
                <label for="">Paginas</label>
                <input type="number" class="form-control" id="" placeholder="" name="libro-paginas" value="<?php echo $paginas?>" readonly  >
            </div>

            <div class="col-md-3">
                <label for="">Formato</label>
                <input type="text" class="form-control" id="" placeholder="" name="libro-formato" value="<?php echo $formato?>" readonly  >
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-8">
                <label for="">Asignatura</label>
                <input type="text" class="form-control" id="" placeholder="" name="libro-editorial" value="<?php echo $asignatura ?>" readonly >
            </div>
          </div>
        </div>
      </div>
    </div><!--wrap-content-->
  </div> <!--main-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
