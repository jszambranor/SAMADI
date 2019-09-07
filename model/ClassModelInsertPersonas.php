<?php
/**
 *
 */
class ModelPersonas
{

  function __construct()
  {
    global  $$objConexion;
    global  $$conexion;
    try {
      $$objConexion = new Conexion;
      $$conexion = $this->objConexion->get_Conexion();
    } catch (PDOException $e) {
       echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().")</script>";
       die();
     }
  }
  


  private function set_Alumnos($arg_Cedula,$arg_Nombres,$arg_Apellidos,$arg_Correo,$arg_CodCarrera,$arg_CodJornada,$arg_CodNivel,$arg_CodParalelo,$arg_Discapacidad,$arg_Porcentaje)
  {
    try {
      $query = "CALL SAMADI.set_Alumnos(:_CEDULA,:_NOMBRES,:_APELLIDOS,:_CORREO,:_CARRERA,:_JORNADA,:_NIVEL,:_PARALELO,:_DISCAPACIDAD,:_PORCENTAJE)";
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE CREAR LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt=$this->conexion->prepare($query);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE PREPARAR LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt->bindParam(':_CEDULA',$arg_Cedula,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR LA CEDULA COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt->bindParam(':_NOMBRES',$arg_NOMBRES,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL NOMBRE COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt->bindParam(':_APELLIDOS',$arg_Apellidos,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL APELLIDO COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt->bindParam(':_CORREO',$arg_Correo,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL CORREO COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt->bindParam(':_CARRERA',$arg_CodCarrera,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL CODIGO DE LA CARRERA COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt->bindParam(':_JORNADA',$arg_CodJornada,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL CODIGO DE LA JORNADA COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt->bindParam(':_NIVEL',$arg_CodNivel,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL CODIGO DEL NIVEL COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt->bindParam(':_PARALELO',$arg_CodParalelo,PARAM::STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL CODIGO DEL PARALELO COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
        $stmt->bindParam(':_DISCAPACIDAD',$arg_Discapacidad,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR LA DISCAPACIDAD COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt->bindParam(':_PORCENTAJE',$arg_Porcentaje,PDO::PARAM_INT);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL PORCENTAJE DE DISCAPACIDAD COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }

    if (!isset($stmt)) {
      return 3;
    }else {
      $objConsulta = new ModelConsultas();
      $consultas = $objConsulta->exists_Alumno($arg_Cedula);
      if ($consultas == 1) {
        return 2;
      }elseif ($cosnultas == 2) {
        if ($stmt->execute()) {
          return 1;
        }else {
          return 0;
        }
      }
    }
  }



}
