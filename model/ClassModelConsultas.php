<?php
/**
 *
 */
class ModelConsultas
{

  function __construct()
  {

  }

  private $objConexion;
  private $conexion;
  try {
    $objConexion = new Conexion;
    $conexion = $this->objConexion->get_Conexion();
  } catch (PDOException $e) {
    echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().")</script>";
    die();
  }


  private function exists_alumno($arg_Cedula){
    try {
      $query = "SELECT CEDULA FROM SAMADI.ALUMNOS WHERE CEDULA = :_CEDULA";
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE CREAR LA CONSULTA (CLASSMODELCONSULTAS)".$e->getMesagge()"')</script>";
    }
    try {
      $stmt = $this->conexion->prepare($query);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE PREPARAR LA CONSULTA (CLASSMODELCONSULTAS)".$e->getMesagge()"')</script>";
    }
    try {
      $stmt->bindParam(':_CEDULA',$arg_Cedula,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE ENVIAR LA CEDULA COMO PARAMETRO (CLASSMODELCONSULTAS)".$e->getMesagge()"')</script>";
    }

    if (!isset($stmt)) {
      return 3;
    }else {
      if($stmt->execute()){
        $data = $stmt->fetch();
        if ($data['CEDULA'] == $arg_Cedula) {
          return 1;
        }else{
          return 2;
        }
      }else{
        return 0;
      }
    }
  }


}
