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
        <div class="tittle-container"><h1>BiblioTec<small>Virtual</small></h1></div>
      </div><!--tittle-->
    </div><!--banner-->
    <div class="wrap-content row" id="page">
      <div class="col-sm-3" id="wrap-filters">
        <article>
          <h3>Filtros</h3>
          <ul id="selected-filters-list">
            <li>No ha seleccionado ningún filtro</li>
            <li class="selected-filters"><a href="<?php echo RUTA ?>libros.php/#page"><span class="glyphicon glyphicon-remove"></span> </a>FILTRO</li>
          </ul><!--selected-filters-list-->
        </article>
        <h3>Categorias</h3>
        <article>
          <ul>
            <a href="<?php echo RUTA ?>libros.php/#page"><li class="categories">FILTRO</li></a>
          </ul>
        </article>
      </div><!--wrap-filters-->
      <div class="col-sm-9 books">
        <form>
          <div class="input-group search">
            <input type="text" class="form-control search-bar" placeholder="Search">
            <div class="input-group-btn search-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div><!--search-btn-->
          </div><!--search-->
        </form>
        <div class="book-list">
          <div class="list-group">
            <a href="#" class="list-group-item"><h2>Libro <small>Autor</small></h2></a>
            <a href="#" class="list-group-item"><h2>Libro <small>Autor</small></h2></a>
            <a href="#" class="list-group-item"><h2>Libro <small>Autor</small></h2></a>
            <a href="#" class="list-group-item"><h2>Libro <small>Autor</small></h2></a>
            <a href="#" class="list-group-item"><h2>Libro <small>Autor</small></h2></a>
            <a href="#" class="list-group-item"><h2>Libro <small>Autor</small></h2></a>
            <a href="#" class="list-group-item"><h2>Libro <small>Autor</small></h2></a>
            <a href="#" class="list-group-item"><h2>Libro <small>Autor</small></h2></a>
            <a href="#" class="list-group-item"><h2>Libro <small>Autor</small></h2></a>
            <a href="#" class="list-group-item"><h2>Libro <small>Autor</small></h2></a>
            <a href="#" class="list-group-item"><h2>Libro <small>Autor</small></h2></a>
          </div>
      </div>
    </div><!--wrap-content-->
  </div> <!--main-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
