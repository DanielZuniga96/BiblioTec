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
        <div class="tittle-container"><a href="index.php"><h1>BiblioTec<small>Virtual</small></h1></a></div>
      </div><!--tittle-->
    </div><!--banner-->
    <div class="wrap-content row" id="page">
      <div class="col-sm-3 hidden-xs" id="wrap-filters">
        <!-- <div class="boton" align="center"> -->
            <!-- <a class="btn btn-default" href="registrar_libro.php" role="button">Enlace</a> -->
            <!-- <button type="button" class="btn btn-primary"><a href="registrar_libro.php">Agregar Libro</a></button> -->
        <!-- </div> -->
        <article>
          <h3>Filtros</h3>
          <ul id="selected-filters-list">
            <?php if (!isset($_SESSION['filters']) || empty($_SESSION['filters'])):?>
            <li>No ha seleccionado ningún filtro</li>
            <?php else: ?>
            <?php foreach ($_SESSION['filters'] as $filtro): ?>
            <li class="selected-filters"><a href="<?php echo RUTA ?>libros.php?remove=<?php echo $filtro ?>#page"><span class="glyphicon glyphicon-remove"></span> </a><?php echo strtoupper($filtro) ?></li>
            <?php endforeach ?>
            <?php endif ?>
          </ul><!--selected-filters-list-->
        </article>
        <h3>Asignaturas</h3>
        <article>
          <ul>
            <?php if(empty($asignaturas)): ?>
              <li style="list-style: none; margin-left: -15px;">No hay asignaturas disponibles para seleccionar</li>
            <?php endif; ?>
            <?php foreach ($asignaturas as $asignatura): ?>
              <a href="<?php echo RUTA ?>libros.php?filter=<?php echo $asignatura['nombre'] ?>#page"><li class="categories"><?php echo strtoupper($asignatura['nombre']) ?></li></a>
            <?php endforeach; ?>
          </ul>
        </article>
      </div><!--wrap-filters-->
      <div class="col-sm-9 books">
        <form name="form-busqueda" action="libros.php#page" method="post">
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
        <div class="book-list">
          <div class="list-group">
            <?php if (empty($libros)): ?>
            <h2 align="center">Sin Resultados</h2>
            <?php endif; ?>
            <?php foreach ($libros as $libro): ?>
            <a href="<?php echo RUTA.$redireccion.'?isbn='.$libro['isbn'] ?>" class="list-group-item"><h2><?php echo $libro['titulo'] ?> <small><?php echo $libro['autor'] ?></small></h2></a>
            <?php endforeach; ?>
          </div>
      </div>
    </div><!--wrap-content-->
  </div> <!--main-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
