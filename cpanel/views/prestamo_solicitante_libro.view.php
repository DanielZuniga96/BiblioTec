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
            <h1>Datos de alumno <br></h1>

              <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']."?isbn=".$isbn."&cont=".$control."#form"; ?>" method="post">

                <?php if ($escrito==1 && $enc==0) {?>
                    <div class="col-md-7 alert alert-warning ale">
                        <strong>El alumno aun no ha sido registrado.</strong> Por favor ingrese los datos del alumno.
                    </div>
                <?php } ?>

                  <div class="col-md-8 form-group">
                      <label for="">Numero de control del alumno:</label>
                      <input type="text" class="form-control" name="Ncontrol" value="<?php echo $control ?>">
                  </div>

                   <div class="col-md-8 form-group">

                      <button type="submit" style="margin-right:20px; float: right;" name="buscar" class="col-md-2 summit btn btn-primary">Buscar</button>

                  </div>

                  <!-- <div class="alert alert-warning alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>¡Cuidado!</strong> Es muy importante que leas este mensaje de alerta.
                  </div> -->




                  <?php if ($escrito==1 && $enc==0) {?>

                      <div class="col-md-8 form-group">
                         <label for="">Nombre:</label>
                         <input type="text" class="form-control" name="nom" id="" placeholder="">
                      </div>

                      <div class="col-md-8 form-group">
                         <label for="">Carrera:</label>
                         <input type="text" class="form-control" name="carr" placeholder="">
                      </div>

                  <?php }else{ ?>
                    <div class="col-md-8 form-group">
                       <label for="">Nombre:</label>
                       <input type="text" class="form-control" value="<?php if(isset($_POST['Ncontrol']) && $escrito==1)  echo $resultado['nombre'];?>" disabled>
                   </div>

                    <div class="col-md-8 form-group">
                       <label for="">Carrera:</label>
                       <input type="text" class="form-control" value="<?php if(isset($_POST['Ncontrol']) && $escrito==1)  echo $resultado['carrera'];?>" disabled>
                   </div>
                  <?php } ?>



                   <!-- <div class="col-md-8 form-group">
                      <label for="">Nombre:</label>
                      <input type="text" class="form-control" id="" placeholder="">
                  </div>

                   <div class="col-md-8 form-group">
                      <label for="">Carrera:</label>
                      <input type="text" class="form-control" id="" placeholder="">
                  </div> -->


                   <div class="col-md-8 form-group">
                    <button type="submit" name="sig" style="margin-right:20px; float: right;" class="col-md-2 summit btn btn-success" <?php if($escrito==0 && $enc==0) echo "disabled" ?> >Finalizar</button>
                  </div>



              </form>

          </div>


      </div> <!--main-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
