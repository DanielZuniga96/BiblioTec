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

  function obtenerLibrosPrestados($filtros, $busqueda, $conexion){
    $query = "SELECT isbn, titulo, autor FROM libro JOIN prestamos ON libro.isbn = prestamos.Libro_ISBN WHERE prestamos.fecha_regreso IS NULL AND (isbn LIKE '%$busqueda%' OR autor LIKE '%$busqueda%'
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
    $query .= " GROUP BY ISBN;";
    // echo $query;
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
    return false;
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

  function buscarAsignatura($nombre, $conexion){
    $resultado = $conexion -> query("SELECT * FROM asignatura WHERE nombre = '$nombre';");
    return $resultado -> fetch();
  }

  function insertAsignatura($nombre, $descripcion, $conexion){
    $nombre = strtoupper($nombre);
    $descripcion = strtoupper($descripcion);
    $resultado = $conexion -> query("INSERT INTO asignatura VALUES('$nombre','$descripcion');");
    return $resultado -> fetch();
  }

  function infoPrestados($isbn, $conexion){
   $query = "SELECT p.folio, p.Libro_ISBN as isbn, s.nombre, s.carrera, p.fecha_prestamo FROM prestamos p JOIN solicitante s ON p.Solicitante_no_control = s.no_control WHERE p.Libro_ISBN = '$isbn' AND fecha_regreso IS NULL;";
   //echo $query;
   $resultado = $conexion -> query($query);
   return $resultado -> fetchAll();
 }

 function devolverPrestamo($isbn, $conexion){
    $query = "UPDATE prestamos SET fecha_regreso = current_date() WHERE Libro_ISBN = '$isbn';";
    $resultado = $conexion -> query($query);
    return $resultado -> fetch();
 }
?>
