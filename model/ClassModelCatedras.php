<?php
/**
 *
 */


class ModelCatedras
{
    public function __construct()
    {
    }

    public function generarCodigo($longitud)
    {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ%$';
        $max = strlen($pattern)-1;
        for ($i=0;$i < $longitud;$i++) {
            $key .= $pattern{mt_rand(0, $max)};
        }
        return $key;
    }

    private function catedras($arg_Cedula)
    {
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
            $stmt->bindParam(':_CEDULA', $arg_Cedula, PDO::PARAM_STR);
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
                } else {
                    return null;
                }
            } else {
                return null;
            }
        } catch (PDOException $e) {
        }
    }

    private function new_Catedra($arg_Codigo, $arg_Nombre, $arg_CodCarrera, $arg_CodNivel, $icon)
    {
        try {
            $objConexion = new Conexion();
            $conexion = $objConexion->get_Conexion();
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().");</script>";
            die();
        }

        try {
            $query = "CALL SAMADI.SET_CATEDRAS(:_COD_CATEDRA,:_NOMBRE,:_COD_CARRERA,:_COD_NIVEL,:_ICON)";
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE CREAR LA CONSULTA'".$e->getMessage().");</script>";
        }

        try {
            $stmt = $conexion->prepare($query);
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE CREAR PREPARAR LA CONSULTA'".$e->getMessage().");</script>";
        }

        try {
            $stmt->bindParam(':_COD_CATEDRA', $arg_Codigo, PDO::PARAM_STR);
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE ENVIAR PARAMETROS A LA CONSULTA'".$e->getMessage().");</script>";
        }

        try {
            $stmt->bindParam(':_NOMBRE', $arg_Nombre, PDO::PARAM_STR);
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE ENVIAR PARAMETROS A LA CONSULTA'".$e->getMessage().");</script>";
        }

        try {
            $stmt->bindParam(':_COD_CARRERA', $arg_CodCarrera, PDO::PARAM_STR);
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE ENVIAR PARAMETROS A LA CONSULTA'".$e->getMessage().");</script>";
        }

        try {
            $stmt->bindParam(':_COD_NIVEL', $arg_CodNivel, PDO::PARAM_STR);
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE ENVIAR PARAMETROS A LA CONSULTA'".$e->getMessage().");</script>";
        }

        try {
            $stmt->bindParam(':_ICON', $icon, PDO::PARAM_STR);
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE ENVIAR PARAMETROS A LA CONSULTA'".$e->getMessage().");</script>";
        }

        if (isset($stmt)) {
            $sql = "SELECT * FROM SAMADI.CATEDRAS WHERE COD_CATEDRA = :_CODIGO";
            $stmt1 = $conexion->prepare($sql);
            $stmt1->bindParam(':_CODIGO', $arg_Codigo, PDO::PARAM_STR);
            if ($stmt1->execute()) {
                $data1=$stmt1->fetch();
                if ($data1['COD_CATEDRA'] === $arg_Codigo) {
                    echo "<script>alert('EL CODIGO DE LA CATEDRA YA SE ENCUENTRA REGISTRADO');</script>";
                } else {
                    if ($data1['NOMBRE_CATEDRA'] === $arg_Nombre) {
                        echo "<script>alert('EL NOMBRE DE LA CATEDRA YA SE ENCUENTRA REGISTRADO');</script>";
                    } else {
                        if ($stmt->execute()) {
                            $sql1 = "SELECT * FROM SAMADI.CATEDRAS WHERE COD_CATEDRA = :_CODIGO";
                            $stmt2 = $conexion->prepare($sql1);
                            $stmt2->bindParam(':_CODIGO', $arg_Codigo, PDO::PARAM_STR);
                            if ($stmt2->execute()) {
                                $data2 = $stmt2->fetch();
                                if ($data2['COD_CATEDRA'] === $arg_Codigo) {
                                    return 1;
                                } else {
                                    return 2;
                                }
                            }
                        }else {
                            return 0;
                        }
                    }
                }
            } else {
                echo "<script>alert('LA CONSULTA NO ESTA DEFINIDA');</script>";
            }
        }
    }




    public function set_NewCatedra($_Codigo, $_Nombre, $_CodCarrera, $_CodNivel, $_icon)
    {
        return $this->new_Catedra($_Codigo, $_Nombre, $_CodCarrera, $_CodNivel, $_icon);
    }

    public function get_Catedras($cedula)
    {
        return $this->catedras($cedula);
    }
}
