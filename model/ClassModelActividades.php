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
            $query = "CALL SAMADI.CREATE_ACTIVIDADES(:_CODIGO_A,:_CODIGO_C,:_NOMBRE,:_DESCRIPCION,:_RUTA)";
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


    private function exists_Actividades($arg_Cod_Catedra){
      try {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_Conexion();
      } catch (PDOException $e) {
        echo "<script>alert(".$e->getMesagge().");</script>";
      }

      try {
        $query = "SELECT * FROM SAMADI.ACTIVIDADES WHERE COD_CATEDRA = :_CATEDRA";
      } catch (PDOException $e) {
        echo "<script>alert(".$e->getMesagge().");</script>";
      }

      try {
        $stmt = $conexion->prepare($query);
      } catch (PDOException $e) {
        echo "<script>alert(".$e->getMesagge().");</script>";
      }

      try {
        $stmt->bindParam(':_CATEDRA',$arg_Cod_Catedra,PDO::PARAM_STR);
      } catch (PDOException $e) {
        echo "<script>alert(".$e->getMesagge().");</script>";
      }



      try {
        if (isset($stmt)) {
          if ($stmt->execute()) {
            $actividades = " ";

            while ($data = $stmt->fetch()) {
              $actividades = $actividades. '
              <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="images/office.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">'.$data["NOMBRE_ACTIVIDAD"].'<i class="material-icons right">more_vert</i></span>
      <p><a target="_blank" href="../../'.$data["RUTA"].'">ABRIR ACTIVIDAD</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">'.$data["NOMBRE_ACTIVIDAD"].'<i class="material-icons right">close</i></span>
      <p>'.$data["DESCRIPCION"].'</p>
    </div>
  </div>';

            }
            return ($actividades);
          }else {
            echo "<script>alert('NO SE PUEDE LISTAR LAS ACTIVIDADES');</script>";
            echo "error";
          }
        }else {
          echo "<script>alert('LA CONSULTA NO ESTA DEFINIDA');</script>";
        }
      } catch (PDOException $e) {
        echo "<script>alert(".$e->getMesagge().");</script>";
      }
    }

    public function get_ExistsActividades($arg_CodCatedra)
    {
      return $this->exists_Actividades($arg_CodCatedra);
    }

    public function set_Actividad($arg_Codigo, $arg_CodCatedra, $arg_Nombre, $arg_Descrip, $arg_Ruta){
      return $this->newActividades($arg_Codigo, $arg_CodCatedra, $arg_Nombre, $arg_Descrip, $arg_Ruta);
    }

}
