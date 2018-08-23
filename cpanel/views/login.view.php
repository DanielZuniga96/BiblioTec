<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>

	<meta name="viewport" content="width=device-width, user-scalable=no,
	initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
	<!--<link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400" rel="stylesheet">-->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/master.css">
	<link rel="stylesheet" href="css/estilos_login.css">
</head>
<body>
	<div class="banner">
		<img class="img img-responsive" src="<?php echo RUTA ?>img/sep_white.png" alt="">
	</div><!--banner-->
	<div class="container">

		<div class="row">
			<div class="credenciales">

				<!-- <div class="col-xs-12 col-sm-8 col-md-8"> -->


				<form  class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="formulario" name="login">

					<div class="form-group input-group" style="height: 45px;">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" style="height: 45px;" placeholder="Usuario" name="usuario">
					</div>

					<div class="form-group input-group" style="height: 45px;">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" style="height: 45px;" placeholder="Contraseña" name="password">
					</div>

					<button  class="btn btn-lg" onclick="login.submit()">Entrar </button>

					<?php if(!empty($errores)) : ?>
						<div class="error" style="margin-top: 20px;">
							<ul>
								<div class="alert alert-danger">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>Intente de nuevo!</strong> <?php echo $errores; ?>
								</div>


							</ul>
						</div>
					<?php endif; ?>

				</form>
				<!-- </div> -->
			</div>
		</div>
	</div>




	<script src="js/jquery.js">  </script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>
