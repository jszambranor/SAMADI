<?php
session_start();
if (isset($_SESSION['USER'])) {
  if ($_SESSION['TYPE'] != 1) {
    if ($_SESSION['TYPE'] == 2) {
      echo '<meta http-equiv="refresh" content="0; url=../docente/index.php">';
    }elseif ($_SESSION['TYPE'] == 3) {
    echo '<meta http-equiv="refresh" content="0; url=../estudiante/index.php">';
    }
  }
}else{
  echo '<meta http-equiv="refresh" content="0; url=http://34.238.220.3/login.php">';
}
/**
 *
 */
class ControllerDocentes
{

  public function __construct()
  {

  }

  public function insert_Docente($arg_Cedula,$arg_Apellidos,$arg_Nombres,$arg_Correo)
  {
    try {
      $objInsertPerson = new ModelPersonas();
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().")</script>";
      die();
    }
    $insertPerson = $objInsertPerson->set_Docentes($arg_Cedula,$arg_Apellidos,$arg_Nombres,$arg_Correo);
    if ($insertPerson == 3) {
      return "NO SE AH DEFINIDO LA CONSULTA INTENTE NUEVAMENTE";
    }elseif ($insertPerson == 2) {
      return "DOCENTE YA EXISTE";
    }elseif ($insertPerson == 1) {
      return "DOCENTE REGISTRADO CON EXITO";
    }elseif ($insertPerson == 0) {
      return "NO SE PUEDE EJECUTAR LA CONSULTA INTENTE NUEVAMENTE";
    }
  }
}
