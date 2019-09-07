<?php
/**
 *
 */
class Estruct
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

  private function sideNavAdmin($arg_Cedula){
    $query = "SELECT NOMBRES,APELLIDOS,CORREO FORM SAMADI.PERSONAS WHERE CEDULA = :_CEDULA";
    $stmt=$this->conexion->prepare($query);
    $stmt->bindParam(':_CEDULA',$arg_Cedula,PDO::PARAM_STR);
    $stmt->execute();
    $stmt->fetch();
  }
}
