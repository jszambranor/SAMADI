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

  protected $host = "34.238.220.3";
  protected $db = "SAMADI";
  protected $user = "SAMADI";
  protected $password = "@ISTG_593_Samadi#";

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
