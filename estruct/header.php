<?php

class Estruct
{
    public function __construct()
    {
    }


    private function sidenav($user)
    {
        try {
            $objConexion = new Conexion();
            $conexion = $objConexion->get_Conexion();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        try {
            $query = "SELECT CEDULA,NOMBRES,APELLIDOS,CORREO FROM SAMADI.PERSONAS WHERE CORREO = :_CORREO";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        try {
            $stmt = $conexion->prepare($query);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        try {
            $stmt->bindParam(':_CORREO', $user, PDO::PARAM_STR);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        try {
            if (isset($stmt)) {
                try {
                    if ($stmt->execute()) {
                        $data=$stmt->fetch();
                        $stmt = null;
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                echo "<script>alert('LA CONSULTA NO ESTA DEFINIDA')</script>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        try {
            $query1 = "SELECT * FROM SAMADI.ALUMNOS_CATEDRA, SAMADI.CATEDRAS WHERE CEDULA = :_CEDULA AND ALUMNOS_CATEDRA.COD_CATEDRA = CATEDRAS.COD_CATEDRA";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        try {
            $stmt = $conexion->prepare($query1);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $cedula = $data['CEDULA'];
        try {
            $stmt->bindParam(':_CEDULA', $cedula, PDO::PARAM_STR);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }


        try {
            if (isset($stmt)) {
                try {
                    if ($stmt->execute()) {
                      $cat = '';
                        while ($catedras = $stmt->fetch()){
                            $cat = $cat . '
              <li class="init" id="select"><a id="catedrasli" class="waves-effect" href="./actividades.php?cod='.$catedras['COD_CATEDRA'].'"><i class="material-icons">layers</i>'.$catedras['NOMBRE_CATEDRA'].'</a></li>
              ';
                        }
                    }else {
                      echo "error";
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                echo "CONSULTA NO DEFINIDA";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }




        $sidenav = '
        <div class="navbar">
          <div id="menu" class="left-items">
            <!--<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>-->
          </div>
          <div id="logo" class="center-items">
            <img src="../../images/logo.jpg" alt="">
            <span>S A M </span>
          </div>
        </div>
      <ul id="slide-out" class="sidenav sidenav-fixed">
      <li><div class="user-view">
      <div class="background">
      <img src="../../images/background.jpeg" width="100%" heigth="100%">
      </div>
      <a href="#user"><img class="circle" src="../../images/background.jpeg"></a>
      <a href="#name"><span class="white-text name">'.$data['NOMBRES'].'</span></a>
      <a href="#name"><span class="white-text name">'.$data['APELLIDOS'].'</span></a>
      <a href="#email"><span class="white-text email">'.$data['CORREO'].'</span></a>
      </div></li>
      <li><a id="catedrasli" href="./index.php"><i class="material-icons">home</i>INICIO</a></li>
      <li id="select"><a id="catedrasli" href="/conexion/logout.php"><i class="material-icons">logout</i>CERRAR SESION</a></li>
      <li><div class="divider"></div></li>
      <li><a class="subheader">Mis Clases</a></li>
      '.$cat.'
      </ul>
    ';

        return $sidenav;
    }


    public function get_Sidenav($correo){
      return $this->sidenav($correo);
    }

}
