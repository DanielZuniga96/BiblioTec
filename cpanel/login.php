<?php
include 'php/config.php';
	$usuario_correcto = 'ADMIN';
	$pass_correcto = 'admin';
	session_start();

  if(isset($_SESSION['usuario'])){
    header ('Location: index.php');
  }

  $errores ='';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $usuario = filter_var(strtoupper($_POST['usuario']),FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    //$password = hash('sha512', $password);

    // try{
    //   $conexion = new PDO('mysql:host=localhost;dbname=milibreria;port=3307', 'root','123456');
    //
    // }catch (PDOException $e){
    //   echo "Error:". $e->getMessage();
    // }
    //   echo "$usuario y $password";
    // $statement =$conexion->prepare('SELECT * FROM ingresarusuario WHERE NombreUSU= :usuario AND Password=:password');
    // $statement->execute(array(':usuario'=>$usuario, ':password'=>$password));
    // $resultado = $statement->fetch();


    if($usuario_correcto === $usuario && $pass_correcto === $password){
      $_SESSION['usuario']=$usuario;
      header('Location: index.php');
    }else{
      $errores .='<li> Datos incorrectos. </li>';
    }

  }
  require 'views/login.view.php';

 ?>
