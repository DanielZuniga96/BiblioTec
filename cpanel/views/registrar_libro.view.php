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
  <!-- <link rel="stylesheet" href="css/estilos.css"> -->

  <script type="text/javascript">
    function cargarModal(){

    }
  </script>

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style media="screen">
    .form-group{
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <?php if (isset($guardado)): ?>

  <?php
    $titulomsg = $guardado? "CORRECTO" : "ALGO SALIO MAL";
    $cuerpo = $guardado? "El libro fue registrado correctamente" : "No fue posible registrar el libro. Contacte al admistrador";
  ?>
    <div id="aviso" class="modal fade" role="dialog">
      <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo $titulomsg ?></h4>
          </div>
          <div class="modal-body">
            <p><?php echo $cuerpo ?>.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.href ='registrar_libro.php'">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="location.href ='menu_admin.php'">Volver al menu</button>
          </div>
        </div>

      </div>
    </div><!-- modal -->
    <?php echo "modal" ?>
    <script>
  		window.onload=function() {
  			$('#aviso').modal('show');
  		}
		</script>
  <?php endif; ?>

  <div class="main">
      <div class="banner">
          <img class="img img-responsive" src="<?php echo RUTA ?>img/sep_white.png" alt="">
          <div class="title">
              <div class="tittle-container"><a href="menu_admin.php"><h1>BiblioTec<small>Virtual</small></h1></a></div>
          </div><!--tittle-->
      </div><!--banner-->
      <div class="wrap-content" id="page" style="height:auto">

          <div class="container formulario">
              <h1>Registrar un nuevo Libro <br></h1>

              <form class="form-horizontal" action="registrar_libro.php#page" method="post">
                <div class="form-group row">
                  <div class="col-md-4">
                    <label for="adquisicion">Tipo de adquisición:</label>
                    <select class="form-control" name="selectedAdq" id="adquisicion">
                      <?php foreach ($adquisiciones as $adquisicion): ?>
                      <option value="<?php echo $adquisicion['tipo'] ?>" <?php if(isset($selected_adquisicion) && $selected_adquisicion == $adquisicion['tipo']) echo 'selected' ?>><?php echo strtoupper($adquisicion['nombre']) ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" class="form-control" id="cantidad" placeholder="" name="libro-cantidad" value="<?php echo $cantidad; ?>" min="1">
                  </div>
                </div>

                  <div class="form-group row">
                    <div class="col-md-5">
                      <label for="isbn">ISBN:</label>
                      <input type="text" class="form-control" id="isbn" placeholder="" name="libro-isbn" value="<?php if($isbn_set) echo $isbn ?>">
                    </div>
                    <div class="col-md-2">
                      <label for="" style="visibility: hidden;">lab-aux</label>
                      <button type="submit" name="btn_buscar" class="btn btn-primary form-control">Buscar</button>
                    </div>
                  </div>
                  <?php if(!$isbn_found && $isbn_set): ?>
                  <div class="alert alert-warning col-md-8">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Libro aun no registrado</strong> Ingrese los datos siguientes
                  </div>
                  <?php endif ?>

                  <div class="form-group row">
                    <div class="col-md-8">
                      <label for="titulo">Titulo:</label>
                      <input type="text" class="form-control" id="titulo" placeholder="" name="libro-titulo" value="<?php if($isbn_found) echo $datos_libro['titulo']; else echo $titulo?>" <?php if($isbn_found || !$isbn_set) echo "disabled"; ?> >
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-8">
                      <label for="">Autor</label>
                      <input type="text" class="form-control" id="" placeholder="" name="libro-autor" value="<?php if($isbn_found) echo $datos_libro['autor']; else echo $autor?>" <?php if($isbn_found || !$isbn_set) echo "disabled"; ?> >
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-8">
                        <label for="">Editorial</label>
                        <input type="text" class="form-control" id="" placeholder="" name="libro-editorial" value="<?php if($isbn_found) echo $datos_libro['editorial']; else echo $editorial ?>" <?php if($isbn_found || !$isbn_set) echo "disabled"; ?> >
                    </div>
                  </div>
                  <div class="form-group row">
                  <div class="col-md-3">
                      <label for="">Año de edicion</label>
                      <input type="number" class="form-control" id="" placeholder="" name="libro-anio" min="1700" max="2100" value="<?php if($isbn_found) echo $datos_libro['anio_edicion']; else echo $anio?>" <?php if($isbn_found || !$isbn_set) echo "disabled"; ?> >
                  </div>
                    <div class="col-md-2 ">
                        <label for="">Paginas</label>
                        <input type="number" class="form-control" id="" placeholder="" name="libro-paginas" value="<?php if($isbn_found) echo $datos_libro['paginas']; else echo $paginas?>" <?php if($isbn_found || !$isbn_set) echo "disabled"; ?> >
                    </div>

                    <div class="col-md-3">
                        <label for="">Formato</label>
                        <input type="text" class="form-control" id="" placeholder="" name="libro-formato" value="<?php if($isbn_found) echo $datos_libro['formato']; else echo $formato?>" <?php if($isbn_found || !$isbn_set) echo "disabled"; ?> >
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="">Asignatura</label>
                      <select class="form-control" name="libro-asignatura" <?php if($isbn_found || !$isbn_set) echo "disabled"; ?> >
                        <?php foreach (obtenerAsignaturas(array(), $conexion) as $asignatura):?>
                        <?php $asignatura['nombre'] = strtoupper($asignatura['nombre']) ?>
                          <option value="<?php echo $asignatura['nombre'] ?>" <?php if(($isbn_found && $datos_libro['Asignatura'] == $asignatura['nombre'])) echo 'selected';
                          else if(isset($selected_asignatura) && $selected_asignatura == $asignatura['nombre']) echo 'selected'; ?>><?php echo $asignatura['nombre'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <label for="" style="visibility: hidden;">lab-aux</label>
                      <button data-toggle="collapse" data-target="#nuevaAsig" type="button" class="btn btn-primary form-control" <?php if($isbn_found || !$isbn_set) echo "disabled"; ?>>Nueva Asignatura</button>
                    </div>
                  </div>
                  <div class="collapse col-md-8" id="nuevaAsig" style="background-color: rgb(234, 234, 234)">
                  <h3>Nueva Asignatura</h3>
                  <div class="form-group row" id="">
                    <div class="col-md-8">
                      <label for="">Nombre</label>
                      <input type="text" class="form-control" rows="8" cols="80" name="asig-nombre" <?php if(!$isbn_set) echo "disabled"; ?> >
                    </div>
                    <div class="col-md-8">
                      <label for="">Descripcion (opcional)</label>
                      <textarea class="form-control" rows="3" cols="50" name="asig-desc" <?php if(!$isbn_set) echo "disabled"; ?> ></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-3">
                      <button data-toggle="collapse" data-target="#nuevaAsig" type="submit" name="btn_nueva_asign" class="btn btn-primary form-control" <?php if($isbn_found || !$isbn_set) echo "disabled"; ?>>Agregar Asignatura</button>
                    </div>
                  </div>
                </div>

                  <div class="form-group row">
                    <div class="col-md-8">
                      <label for="">Observaciones</label>
                      <textarea class="form-control" rows="4" cols="80" name="libro-observaciones"<?php if(!$isbn_set) echo "disabled"; ?> ><?php echo $observaciones ?></textarea>
                    </div>
                  </div>

                  <button name="btn-registrar" type="submit" class="col-md-2 btn btn-success summit" <?php if(!$isbn_set) echo "disabled"; ?>>Registrar</button>

              </form>

          </div>


      </div> <!--main-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
