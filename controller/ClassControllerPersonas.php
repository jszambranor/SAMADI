<?php
/**
 *
 */
class ControllerPersonas
{

  function __construct()
  {
    global $$objInsertPerson = null;
    global $$insertPerson = null;

    try {
      $$objInsertPerson = new ModelPersonas();
      $$insertPerson = $this->objInsertPerson->set_Alumnos();
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().")</script>";
      die();
    }
  }




  public function insert_Alumno($arg_Cedula,$arg_Nombres,$arg_Apellidos,$arg_Correo,$arg_CodCarrera,$arg_CodJornada,$arg_CodNivel,$arg_CodParalelo,$arg_Discapacidad,$arg_Porcentaje){
    $this->insertPerson = $this->objInsertPerson->set_Alumnos($arg_Cedula,$arg_Nombres,$arg_Apellidos,$arg_Correo,$arg_CodCarrera,$arg_CodJornada,$arg_CodNivel,$arg_CodParalelo,$arg_Discapacidad,$arg_Porcentaje);
    if ($this->insertPerson == 3) {
      return "NO SE AH DEFINIDO LA CONSULTA INTENTE NUEVAMENTE";
    }elseif ($this->insertPerson == 2) {
      return "ALUMNO YA EXISTE";
    }elseif ($this->insertPerson == 1) {
      return "ALUMNO REGISTRADO CON EXITO";
    }elseif ($this->insertPerson == 0) {
      return "NO SE PUEDE EJECUTAR LA CONSULTA INTENTE NUEVAMENTE";
    }
  }
}


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Cedula = $_POST['cedula'];
    $Nombres = $_POST['nombres'];
    $Apellidos = $_POST['apellidos'];
    $Correo = $_POST['correo'];
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
