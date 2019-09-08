<?php
require_once '../conexion/ClassConexion.php';
require_once '../model/ClassModelConsultas.php';
require_once '../model/ClassModelInsertPersonas.php';
/**
 *
 */
class ControllerPersonas
{

  function __construct()
  {

  }


  public function insert_Alumno($arg_Cedula,$arg_Nombres,$arg_Apellidos,$arg_Correo,$arg_CodCarrera,$arg_CodJornada,$arg_CodNivel,$arg_CodParalelo,$arg_Discapacidad,$arg_Porcentaje){
    try {
      $objInsertPerson = new ModelPersonas();
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().")</script>";
      die();
    }
    $insertPerson = $objInsertPerson->set_Alumnos($arg_Cedula,$arg_Nombres,$arg_Apellidos,$arg_Correo,$arg_CodCarrera,$arg_CodJornada,$arg_CodNivel,$arg_CodParalelo,$arg_Discapacidad,$arg_Porcentaje);
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


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Cedula = $_POST['cedula'];
    $Nombres = $_POST['nombres'];
    $Apellidos = $_POST['apellidos'];
    $Correo = $_POST['mail'];
    $CodCarrera = $_POST['carrera'];
    $CodJornada = $_POST['jornada'];
    $CodNivel = $_POST['nivel'];
    $CodParalelo = $_POST['paralelo'];
    $Discapacidad = $_POST['discapacidad'];
    $Porcentaje = $_POST['porcentaje'];
    $objControllerPersona = new ControllerPersonas();
    $mensaje = $objControllerPersona->insert_Alumno($Cedula,$Nombres,$Apellidos,$Correo,$CodCarrera,$CodJornada,$CodNivel,$CodParalelo,$Discapacidad,$Porcentaje);
    echo $mensaje;
  }else {
    echo "METODO DE ENVIO NO VALIDO";
    die();
  }
