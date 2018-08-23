<?php
  function conectarDB()
  {
    $host = "localhost";
    $dbname = "biblotec";
    $user = "root";
    $pass = "123456";

    try {
      $conexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
      $conexion -> query("USE $dbname;");

      return $conexion;
    } catch (PDOException $e) {
      echo "Error: $e";

      return false;
    }
  }
?>
