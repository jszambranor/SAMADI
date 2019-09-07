<?php
/**
 *
 */
class ModelConsultas
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

  private function exists_alumno($arg_Cedula){
    try {
      $query = "SELECT CEDULA FROM SAMADI.ALUMNOS WHERE CEDULA = :_CEDULA";
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE CREAR LA CONSULTA (CLASSMODELCONSULTAS)".$e->getMesagge()."')</script>";
    }
    try {
      $stmt = $this->conexion->prepare($query);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE PREPARAR LA CONSULTA (CLASSMODELCONSULTAS)".$e->getMesagge()."')</script>";
    }
    try {
      $stmt->bindParam(':_CEDULA',$arg_Cedula,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE ENVIAR LA CEDULA COMO PARAMETRO (CLASSMODELCONSULTAS)".$e->getMesagge()."')</script>";
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

  private function niveles(){
    $query = "SELECT * FROM SAMADI.CURSOS";
    $stmt=$this->conexion->prepare($query);
    $stmt->execute();
    $cadena = null;
    while($data=$stmt->fetch()){
      $cadena = $cadena.'<option style="color:#0E47A1;" value="' . $data["COD_NIVEL"] . '">' . $data["NOMBRE_NIVEL"] . '</option>';
    }
    return $cadena;
  }

  private function carreras(){
    $query = "SELECT * FROM SAMADI.CARRERAS";
    $stmt=$this->conexion->prepare($query);
    $stmt->execute();
    $cadena = null;
    while($data=$stmt->fetch()){
      $cadena = $cadena.'<option style="color:#0E47A1;" value="' . $data["COD_CARRERA"] . '">' . $data["NOMBRE_C"] . '</option>';
    }
    return $cadena;
  }

  private function paralelos(){
    $query = "SELECT * FROM SAMADI.PARALELOS";
    $stmt=$this->conexion->prepare($query);
    $stmt->execute();
    $cadena = null;
    while($data=$stmt->fetch()){
      $cadena = $cadena.'<option style="color:#0E47A1;" value="' . $data["COD_PARALELO"] . '">' . $data["COD_PARALELO"] . '</option>';
    }
    return $cadena;
  }

  private function jornadas(){
    $query = "SELECT * FROM SAMADI.JORNADAS";
    $stmt=$this->conexion->prepare($query);
    $stmt->execute();
    $cadena = null;
    while($data=$stmt->fetch()){
      $cadena = $cadena.'<option style="color:#0E47A1;" value="' . $data["COD_JORNADA"] . '">' . $data["NOMBRE_JOR"] . '</option>';
    }
    return $cadena;
  }

  public function get_Jornadas(){
    $this->jornadas();
  }

  public function get_Paralelos(){
    $this->paralelos();
  }

  public function get_Carreras(){
    $this->carreras();
  }

  public function get_Niveles(){
    $this->niveles();
  }

  public function get_Exists_Alumno($arg_Cedula){
    $this->exists_alumno($arg_Cedula);
  }
}
