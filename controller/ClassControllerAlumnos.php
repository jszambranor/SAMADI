<?php
/**
 *
 */
class ControllerAlumnos
{

  public function __construct()
  {

  }


  public function insert_Alumno($arg_Cedula,$arg_Apellidos,$arg_Nombres,$arg_Correo,$arg_CodCarrera,$arg_CodNivel,$arg_CodParalelo,$arg_CodJornada,$arg_Discapacidad,$arg_Porcentaje){
    try {
      $objInsertPerson = new ModelPersonas();
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().")</script>";
      die();
    }
    $insertPerson = $objInsertPerson->set_Alumnos($arg_Cedula,$arg_Apellidos,$arg_Nombres,$arg_Correo,$arg_CodCarrera,$arg_CodNivel,$arg_CodParalelo,$arg_CodJornada,$arg_Discapacidad,$arg_Porcentaje);
    if ($insertPerson == 3) {
      return "NO SE AH DEFINIDO LA CONSULTA INTENTE NUEVAMENTE";
    }elseif ($insertPerson == 2) {
      return "ALUMNO YA EXISTE";
    }elseif ($insertPerson == 1) {
      return "ALUMNO REGISTRADO CON EXITO";
    }elseif ($insertPerson == 0) {
      return "NO SE PUEDE EJECUTAR LA CONSULTA INTENTE NUEVAMENTE";
    }
  }
}
