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
  <link rel="stylesheet" href="css/estilos.css">

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
      <div class="wrap-content row" id="form">


          <div class="col-md-12 formulario">
            <h1>Prestamo de un nuevo Libro <br></h1>

              <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">

                  <div class="col-md-8 form-group">
                      <label for="">ISBN del libro:</label>
                      <input type="text" class="form-control" id="" placeholder="" name="isbn" value="<?php if(isset($_GET['isbn']) /*|| $isbn != null*/) echo $isbn ?>">
                  </div>

                   <div class="col-md-8 form-group">

                      <a href="libros.php?buscando=#page"><button type="button" style="margin-right:20px; float: right;" class="col-md-2 summit btn btn-default" name="buscar"> Buscar Libro</button></a>

                      <button href="prestamo_solicitante_libro.view.php" type="submit" style="margin-right:20px; float: right;" class="col-md-2 summit btn btn-primary ">Aplicar</button>

                  </div>

                  <!-- <?php //if(isset($_POST['isbn'])) foreach ($resultado as $post): ?> -->

                  <div class="col-md-8 form-group">
                      <label for="">Titulo:</label>
                      <input type="text" class="form-control" id="" value="<?php if(isset($_GET['isbn']) && $busqueda)  echo $resultado['titulo'];?>" disabled>
                  </div>

                   <div class="col-md-8 form-group">
                      <label for="">Autor:</label>
                      <input type="text" class="form-control" id="" value="<?php if(isset($_GET['isbn']) && $busqueda) echo $resultado['autor'];?>" disabled>
                  </div>

                   <div class="col-md-8 form-group">
                      <label for="">Editorial:</label>
                      <input type="text" class="form-control" id="" value="<?php if(isset($_GET['isbn']) && $busqueda) echo $resultado['editorial'];?>" disabled>
                  </div>

                   <div class="col-md-8 form-group">
                      <label for="">Año:</label>
                      <input type="text" class="form-control" id="" value="<?php if(isset($_GET['isbn']) && $busqueda) echo $resultado['anio_edicion'];?>" disabled>
                  </div>

                  <?php //endforeach; ?>

                   <div class="col-md-8 form-group">
                    <a href="prestamo_solicitante_libro.php?isbn=<?php echo $isbn."#form" ?>"><button type="button" style="margin-right:20px; float: right;" class="col-md-2 summit btn btn-success" <?php if($encontrado==0) echo "disabled"; ?> >Siguiente</button></a>
                  </div>



              </form>

          </div>


      </div> <!--main-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
