<?php
  function selectAsignaturas($conexion){
    $resultado = $conexion -> query("SELECT nombre FROM asignatura;");
    return $resultado -> fetchAll();
  }
?>
