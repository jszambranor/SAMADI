<?php

/**
 *
 */
class Conexion
{

  public function __construct()
  {
    return $this->get_Conexion();
  }

  private $host = "35.176.226.143";
  private $db = "SAMADI";
  private $user = "SAMADI";
  private $password = "@ISTG_2_Samadi";

  private function ConexionSamadi()
  {
    try {
      $connect = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->password);
    } catch (PDOException $e) {
      echo "<script>alert('NO SE PUEDE CONECTAR A LA BASE DE DATOS'".$e->getMessage().")</script>";
      die();
    }

    if (!isset($connect)) {
      echo "<script>alert('NO SE PUEDE CONECTAR A LA BASE DE DATOS CONEXION ES NULA')</script>";
      die();
    }else {
      // echo "exito";
      return $connect;
    }

  }

  public function get_Conexion(){
    return $this->ConexionSamadi();
  }
}
