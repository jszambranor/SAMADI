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
class ModelPersonas
{

  function __construct()
  {

  }

  private function Alumnos($arg_Cedula,$arg_Apellidos,$arg_Nombres,$arg_Correo,$arg_CodCarrera,$arg_CodNivel,$arg_CodParalelo,$arg_CodJornada,$arg_Discapacidad,$arg_Porcentaje)
  {
    try {
      $objConexion = new Conexion;
      $conexion = $objConexion->get_Conexion();
    } catch (PDOException $e) {
       echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().")</script>";
       die();
     }
    try {
      $query = "CALL SAMADI.SET_ALUMNOS(:_CEDULA,:_APELLIDOS,:_NOMBRES,:_CORREO,:_CARRERA,:_NIVEL,:_PARALELO,:_JORNADA,:_DISCAPACIDAD,:_PORCENTAJE)";
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE CREAR LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt=$conexion->prepare($query);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE PREPARAR LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt->bindParam(':_CEDULA',$arg_Cedula,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR LA CEDULA COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt->bindParam(':_APELLIDOS',$arg_Apellidos,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL APELLIDO COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt->bindParam(':_NOMBRES',$arg_Nombres,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL NOMBRE COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
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
      $stmt->bindParam(':_NIVEL',$arg_CodNivel,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL CODIGO DEL NIVEL COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt->bindParam(':_PARALELO',$arg_CodParalelo,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL CODIGO DEL PARALELO COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt->bindParam(':_JORNADA',$arg_CodJornada,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL CODIGO DE LA JORNADA COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
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
      $consultas = $objConsulta->get_Exists_Personas($arg_Cedula);
      if ($consultas == 1) {
        return 2;
      }elseif ($consultas == 2) {
        if ($stmt->execute()) {
          return 1;
        }else {
          return 0;
        }
      }
    }
  }

  private function Docentes($arg_Cedula,$arg_Apellidos,$arg_Nombres,$arg_Correo){
    try {
      $objConexion = new Conexion();
      $conexion = $objConexion->get_Conexion();
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().")</script>";
      die();
    }

    try {
      $query = "CALL SAMADI.SET_DOCENTES(:_CEDULA,:_APELLIDOS,:_NOMBRES,:_CORREO)";
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE CREAR LA CONSULTA'".$e->getMessage().")</script>";
    }

    try {
      $stmt=$conexion->prepare($query);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE PREPARAR LA CONSULTA'".$e->getMessage().")</script>";
    }

    try {
      $stmt->bindParam(':_CEDULA',$arg_Cedula,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR LA CEDULA COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt->bindParam(':_APELLIDOS',$arg_Apellidos,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL APELLIDO COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt->bindParam(':_NOMBRES',$arg_Nombres,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL NOMBRE COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }

    try {
      $stmt->bindParam(':_CORREO',$arg_Correo,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL CORREO COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }

    if (!isset($stmt)) {
      return 3;
    }else {
      $objConsulta = new ModelConsultas();
      $consultas = $objConsulta->get_Exists_Personas($arg_Cedula);
      if ($consultas == 1) {
        return 2;
      }elseif ($consultas == 2) {
        if ($stmt->execute()) {
          return 1;
        }else {
          return 0;
        }
      }
    }
  }

  private function Administrador($arg_Cedula,$arg_Apellidos,$arg_Nombres,$arg_Correo){
    try {
      $objConexion = new Conexion();
      $conexion = $objConexion->get_Conexion();
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().")</script>";
      die();
    }

    try {
      $query = "CALL SAMADI.SET_ADMINISTRADOR(:_CEDULA,:_APELLIDOS,:_NOMBRES,:_CORREO)";
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE CREAR LA CONSULTA'".$e->getMessage().")</script>";
    }

    try {
      $stmt=$conexion->prepare($query);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE PREPARAR LA CONSULTA'".$e->getMessage().")</script>";
    }

    try {
      $stmt->bindParam(':_CEDULA',$arg_Cedula,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR LA CEDULA COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt->bindParam(':_APELLIDOS',$arg_Apellidos,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL APELLIDO COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }
    try {
      $stmt->bindParam(':_NOMBRES',$arg_Nombres,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL NOMBRE COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }

    try {
      $stmt->bindParam(':_CORREO',$arg_Correo,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDO ENVIAR EL CORREO COMO PARAMETRO A LA CONSULTA'".$e->getMessage().")</script>";
    }

    if (!isset($stmt)) {
      return 3;
    }else {
      $objConsulta = new ModelConsultas();
      $consultas = $objConsulta->get_Exists_Personas($arg_Cedula);
      if ($consultas == 1) {
        return 2;
      }elseif ($consultas == 2) {
        if ($stmt->execute()) {
          return 1;
        }else {
          return 0;
        }
      }
    }
  }

  public function set_Alumnos($arg_Cedula,$arg_Apellidos,$arg_Nombres,$arg_Correo,$arg_CodCarrera,$arg_CodNivel,$arg_CodParalelo,$arg_CodJornada,$arg_Discapacidad,$arg_Porcentaje){
    return $this->Alumnos($arg_Cedula,$arg_Apellidos,$arg_Nombres,$arg_Correo,$arg_CodCarrera,$arg_CodNivel,$arg_CodParalelo,$arg_CodJornada,$arg_Discapacidad,$arg_Porcentaje);
  }

  public function set_Docentes($arg_Cedula,$arg_Apellidos,$arg_Nombres,$arg_Correo){
    return $this->Docentes($arg_Cedula,$arg_Apellidos,$arg_Nombres,$arg_Correo);
  }

  public function set_Administrador($arg_Cedula,$arg_Apellidos,$arg_Nombres,$arg_Correo){
    return $this->Administrador($arg_Cedula,$arg_Apellidos,$arg_Nombres,$arg_Correo);
  }
}
