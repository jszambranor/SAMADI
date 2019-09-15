<?php
/**
 *
 */
class ModelConsultas
{
    public function __construct()
    {
    }

    private function exists_personas($arg_Cedula)
    {
        try {
            $objConexion = new Conexion;
            $conexion = $objConexion->get_Conexion();
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().");</script>";
            die();
        }
        try {
            $query = "SELECT CEDULA FROM SAMADI.ALUMNOS WHERE CEDULA = :_CEDULA";
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE CREAR LA CONSULTA (CLASSMODELCONSULTAS)".$e->getMesagge()."');</script>";
        }
        try {
            $stmt = $conexion->prepare($query);
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE PREPARAR LA CONSULTA (CLASSMODELCONSULTAS)".$e->getMesagge()."');</script>";
        }
        try {
            $stmt->bindParam(':_CEDULA', $arg_Cedula, PDO::PARAM_STR);
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE ENVIAR LA CEDULA COMO PARAMETRO (CLASSMODELCONSULTAS)".$e->getMesagge()."');</script>";
        }

        if (!isset($stmt)) {
            return 3;
        } else {
            if ($stmt->execute()) {
                $data = $stmt->fetch();
                if ($data['CEDULA'] == $arg_Cedula) {
                    return 1;
                } else {
                    return 2;
                }
            } else {
                return 0;
            }
        }
    }

    private function niveles()
    {
        try {
            $objConexion = new Conexion;
            $conexion = $objConexion->get_Conexion();
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().");</script>";
            die();
        }
        $query = "SELECT * FROM SAMADI.NIVELES";
        $stmt=$conexion->prepare($query);
        $stmt->execute();
        $cadena = null;
        while ($data=$stmt->fetch()) {
            $cadena = $cadena.'<option value="' . $data["COD_NIVEL"] . '">' . $data["NOMBRE_NIVEL"] . '</option>';
        }
        return $cadena;
    }

    private function carreras()
    {
        try {
            $objConexion = new Conexion;
            $conexion = $objConexion->get_Conexion();
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().");</script>";
            die();
        }
        $query = "SELECT * FROM SAMADI.CARRERAS";
        $stmt=$conexion->prepare($query);
        $stmt->execute();
        $cadena = null;
        while ($data=$stmt->fetch()) {
            $cadena = $cadena.'<option value="' . $data["COD_CARRERA"] . '">' . $data["NOMBRE_CARRERA"] . '</option>';
        }
        return $cadena;
    }

    private function paralelos()
    {
        try {
            $objConexion = new Conexion;
            $conexion = $objConexion->get_Conexion();
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().");</script>";
            die();
        }
        $query = "SELECT * FROM SAMADI.PARALELOS";
        $stmt=$conexion->prepare($query);
        $stmt->execute();
        $cadena = null;
        while ($data=$stmt->fetch()) {
            $cadena = $cadena.'<option value="' . $data["COD_PARALELO"] . '">' . $data["COD_PARALELO"] . '</option>';
        }
        return $cadena;
    }

    private function jornadas()
    {
        try {
            $objConexion = new Conexion;
            $conexion = $objConexion->get_Conexion();
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().");</script>";
            die();
        }
        $query = "SELECT * FROM SAMADI.JORNADAS";
        $stmt=$conexion->prepare($query);
        $stmt->execute();
        $cadena = null;
        while ($data=$stmt->fetch()) {
            $cadena = $cadena.'<option  value="' . $data["COD_JORNADA"] . '">' . $data["NOMBRE_JORNADA"] . '</option>';
        }
        return $cadena;
    }

    private function datos($arg_Cedula)
    {
        try {
            $objConexion = new Conexion();
            $conexion = $objConexion->get_Conexion();
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().");</script>";
            die();
        }

        try {
            $query = "SELECT * FROM SAMADI.PERSONAS WHERE CEDULA = :_CEDULA";
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
                    $data = $stmt->fetch();
                    return $data;
                } else {
                    return null;
                }
            } else {
                echo "<script>alert('CONSULTA VACIA'".$e->getMessage().");</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE EJECUTAR LA CONSULTA'".$e->getMessage().");</script>";
        }
    }

    private function datosCorreo($arg_User)
    {
        try {
            $objConexion = new Conexion();
            $conexion = $objConexion->get_Conexion();
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().");</script>";
            die();
        }

        try {
            $query = "SELECT CEDULA FROM SAMADI.PERSONAS WHERE CORREO = :_USUARIO";
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE CREAR LA CONSULTA'".$e->getMessage().");</script>";
        }

        try {
            $stmt = $conexion->prepare($query);
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE PREPARAR LA CONSULTA'".$e->getMessage().");</script>";
        }

        try {
            $stmt->bindParam(':_USUARIO', $arg_User, PDO::PARAM_STR);
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE ENVIAR PARAMETROS A LA CONSULTA'".$e->getMessage().");</script>";
        }

        try {
            if (isset($stmt)) {
                if ($stmt->execute()) {
                    $data = $stmt->fetch();
                    return $data;
                } else {
                    return null;
                }
            } else {
                echo "<script>alert('CONSULTA VACIA'".$e->getMessage().");</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE EJECUTAR LA CONSULTA'".$e->getMessage().");</script>";
        }
    }

    public function get_Datos($arg_Cedula)
    {
        return $this->datos($arg_Cedula);
    }

    public function get_DatosCorreo($arg_Cedula)
    {
        return $this->datosCorreo($arg_Cedula);
    }

    public function get_Jornadas()
    {
        return $this->jornadas();
    }

    public function get_Paralelos()
    {
        return $this->paralelos();
    }

    public function get_Carreras()
    {
        return $this->carreras();
    }

    public function get_Niveles()
    {
        return $this->niveles();
    }

    public function get_Exists_Personas($arg_Cedula)
    {
        return $this->exists_personas($arg_Cedula);
    }
}
