<?php
/**
 *
 */


class ModelCatedras
{

  function __construct()
  {

  }

public function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ%$';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++)$key .= $pattern{mt_rand(0,$max)};
    return $key;
   }

   private function catedras($arg_Cedula){
     try {
       $objConexion = new Conexion();
       $conexion = $objConexion->get_Conexion();
     } catch (PDOException $e) {
       echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().");</script>";
       die();
     }



     try {
       $query = "SELECT ALUMNOS_CATEDRA.COD_CATEDRA,NOMBRE_CATEDRA,ICON FROM SAMADI.CATEDRAS, SAMADI.ALUMNOS_CATEDRA WHERE CEDULA = :_CEDULA AND ALUMNOS_CATEDRA.COD_CATEDRA = CATEDRAS.COD_CATEDRA";
     } catch (PDOException $e) {
       echo "<script>alert('NO SE PUEDE CREAR LA CONSULTA'".$e->getMessage().");</script>";
     }

     try {
       $stmt = $conexion->prepare($query);
     } catch (PDOException $e) {
       echo "<script>alert('NO SE PUEDE PREPARAR LA CONSULTA'".$e->getMessage().");</script>";
     }

     try {
        $stmt->bindParam(':_CEDULA',$arg_Cedula,PDO::PARAM_STR);
     } catch (PDOException $e) {
       echo "<script>alert('NO SE PUEDE ENVIAR PARAMETROS A LA CONSULTA'".$e->getMessage().");</script>";
     }

     try {
       if (isset($stmt)) {
         if ($stmt->execute()) {
           $cadena = '';
           while ($data = $stmt->fetch()) {
             $cadena = $cadena.'
             <div class="catedras">
             <div class="img"><img src="../../images/catedras/'.$data["ICON"].'"></div>
             <div class="nombre"><a href="./catedra.php?cod='.$data["COD_CATEDRA"].'">'.$data["NOMBRE_CATEDRA"].'</a></div>
             </div>';
           }
           return $cadena;
         }else{
           return null;
         }
       }else{
         return null;
       }
     } catch (PDOException $e) {

     }
   }

   private function newCatedra($arg_Cedula,$arg_Codigo){
     try {
       $objConexion = new Conexion();
       $conexion = $objConexion->get_Conexion();
     } catch (PDOException $e) {
       echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().");</script>";
       die();
     }

     try {
       $query = "INSERT INTO SAMADI.ALUMNOS_CATEDRA (CEDULA,COD_CATEDRA) VALUES (:_CEDULA,:_COD_CATEDRA)";
     } catch (PDOException $e) {
       echo "<script>alert('NO SE PUEDE CREAR LA CONSULTA'".$e->getMessage().");</script>";
     }

     try {
       $stmt = $conexion->prepare($query);
     } catch (PDOException $e) {
       echo "<script>alert('NO SE PUEDE PREPARAR LA CONSULTA'".$e->getMessage().");</script>";
     }

     try {
        $stmt->bindParam(':_CEDULA',$arg_Cedula,PDO::PARAM_STR);
     } catch (PDOException $e) {
       echo "<script>alert('NO SE PUEDE ENVIAR PARAMETROS A LA CONSULTA'".$e->getMessage().");</script>";
     }

   try {
      $stmt->bindParam(':_COD_CATEDRA',$arg_Codigo,PDO::PARAM_STR);
   } catch (PDOException $e) {
     echo "<script>alert('NO SE PUEDE ENVIAR PARAMETROS A LA CONSULTA'".$e->getMessage().");</script>";
   }

   try {
     if (isset($stmt)) {
       if ($stmt->execute()) {
         return "FELICIDADES YA TE REGISTRASTE A LA NUEVA CLASE";
       }else {
         return "LO SIENTO NO TE REGISTRASTE A LA NUEVA CLASE";
       }
     }else {
       return "NO TE REGISTRASTE EN LA CLASE";
     }
   } catch (PDOException $e) {
     echo "<script>alert('ERROR NO TE PUEDES REGISTRAR'".$e->getMessage().");</script>";
   }

 }

 public function set_NewClase($cedula,$codigo)
 {
   return $this->newCatedra($cedula,$codigo);
 }

   public function get_Catedras($cedula){
     return $this->catedras($cedula);
   }

}
