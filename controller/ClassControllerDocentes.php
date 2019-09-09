<?php
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
