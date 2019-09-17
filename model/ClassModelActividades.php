<?php

class ModelActividades
{
    public function __construct()
    {
    }

    private function newActividades($arg_Codigo, $arg_CodCatedra, $arg_Nombre, $arg_Descrip, $arg_Ruta)
    {
        try {
            $objConexion = new Conexion();
            $conexion = $objConexion->get_Conexion();
        } catch (PDOException $e) {
          echo "<script>alert('".$e->getMessage."')";
        }

        try {
            $query = "CALL SAMADI.CREATE_ACTIVIDADES(:_CODIGO_A,CODIGO_C,:_NOMBRE,:_DESCRIPCION,:_RUTA)";
        } catch (PDOException $e) {
          echo "<script>alert('".$e->getMessage."')";
        }

        try {
            $stmt = $conexion->prepare($query);
        } catch (PDOException $e) {
          echo "<script>alert('".$e->getMessage."')";
        }

        try {
            $stmt->bindParam(':_CODIGO_A', $arg_Codigo, PDO::PARAM_STR);
        } catch (PDOException $e) {
          echo "<script>alert('".$e->getMessage."')";
        }

        try {
            $stmt->bindParam(':_CODIGO_C', $arg_CodCatedra, PDO::PARAM_STR);
        } catch (PDOException $e) {
          echo "<script>alert('".$e->getMessage."')";
        }

        try {
            $stmt->bindParam(':_NOMBRE', $arg_Nombre, PDO::PARAM_STR);
        } catch (PDOException $e) {
          echo "<script>alert('".$e->getMessage."')";
        }


        try {
            $stmt->bindParam(':_DESCRIPCION', $arg_Descrip, PDO::PARAM_STR);
        } catch (PDOException $e) {
          echo "<script>alert('".$e->getMessage."')";
        }


        try {
            $stmt->bindParam(':_RUTA', $arg_Ruta, PDO::PARAM_STR);
        } catch (PDOException $e) {
          echo "<script>alert('".$e->getMessage."')";
        }

        try {
          if (isset($stmt)) {
              if ($stmt->execute()) {
                  return 1;
              } else {
                  return 2;
              }
          } else {
              return 3;
          }
        } catch (PDOException $e) {
          echo "<script>alert('".$e->getMessage."')";
        }
    }


    
}
