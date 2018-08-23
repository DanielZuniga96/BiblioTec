<?php
  function obtenerLibros($filtros, $busqueda, $conexion){
    $query = "SELECT isbn, titulo, autor FROM libro WHERE (isbn LIKE '%$busqueda%' OR autor LIKE '%$busqueda%'
    OR titulo LIKE '%$busqueda%' OR asignatura LIKE '%$busqueda%' OR editorial LIKE '%$busqueda%')";


    if(!empty($filtros)){
      $auxFiltros = array_keys($filtros); //to index array

      $query .= " AND (";

      for ($i=0; $i < sizeof($auxFiltros); $i++) {
        if ($i != 0) {
          $query .= " OR ";
        }
        $query .= "asignatura = '".$auxFiltros[$i]."'";
      }

      $query .= ")";
    }

    $resultado = $conexion -> query($query);


    return $resultado = $resultado -> fetchAll();
  }

  function obtenerAsignaturas($filtros, $conexion){
    $query = "SELECT nombre FROM asignatura";

    if(!empty($filtros)){
      $auxFiltros = array_keys($filtros); //to index array

      $query .= " WHERE (";

      for ($i=0; $i < sizeof($auxFiltros); $i++) {
        if ($i != 0) {
          $query .= " AND ";
        }
        $query .= "nombre <> '".$auxFiltros[$i]."'";
      }

      $query .= ")";
    }

    $resultado = $conexion -> query($query);

    return $resultado = $resultado -> fetchAll();
  }

  function getAdquisiciones($conexion){
    $resultado = $conexion -> query("SELECT * FROM adquisicion;");
    return $resultado -> fetchAll();
  }

  function getBook($isbn, $conexion){
    $resultado = $conexion -> query("SELECT * FROM libro WHERE isbn = '$isbn';");
    return $resultado -> fetch();
  }

  function insertLibro($libro, $conexion){
    $query = "INSERT INTO libro(ISBN, titulo, autor, editorial, anio_edicion, paginas, formato, Asignatura) ";
    $query .= "VALUES ('".$libro['isbn']."', '".$libro['titulo']."', '".$libro['autor']."','".$libro['editorial']."',";
    $query .= "'".$libro['anio']."', '".$libro['paginas']."', '".$libro['formato']."', '".$libro['asignatura']."')";

    $resultado = $conexion -> query($query);
    return $resultado;
  }

  function insertAdqXLibro($adqTipo, $isbn, $noAdq, $observaciones, $conexion){
    $query = "INSERT INTO adquisicion_por_libro(Adquisicion_tipo, Libro_ISBN, no_adquisicion, observaciones) ";
    $query .= "VALUES ('".$adqTipo."', '".$isbn."', '".$noAdq."','".$observaciones."')";

    $resultado = $conexion -> query($query);
    return $resultado;
  }

  function cantidadLibros($isbn, $conexion){
    $resultado = $conexion -> query("SELECT count(Libro_ISBN) AS cantidad FROM adquisicion_por_libro WHERE Libro_ISBN = '$isbn';");
    return $resultado -> fetch();
  }

  function cantidadLibroPrestados($isbn, $conexion){
    $resultado = $conexion -> query("SELECT count(Libro_ISBN) AS cantidad FROM prestamos WHERE Libro_ISBN = '$isbn' AND fecha_regreso IS NULL;");
    return $resultado -> fetch();
  }

?>
