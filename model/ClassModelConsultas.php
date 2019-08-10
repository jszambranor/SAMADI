<?php

class Consultas
{
    public function getAllPersonas()
    {
        try {
            $model = new Conexion();
            $conexion = $model->get_Conexion();
        } catch (PDOExeption $e) {
            echo"<script>alert('ERROR NO SE PUEDE ESTABLECER LA CONEXION CLASE NO EXISTE')</script>";
        }

        try {
            $query = "SELECT * FROM SAMADI_ISTG.PERSONAS";
            $stmt = $conexion->prepare($query);
        } catch (PDOExeption $e) {
            echo "<script>alert('ERROR NO SE PUDO RECUPERAR LOS DATOS')</script>";
        }
        try {
            if ($stmt->execute()) {
                $data = $stmt->fetch();
                $stmt = null;
                $query = null;
                $model = null;
                $conexion = null;
                return ($data);
            } else {
                return '0';
            }
        } catch (PDOExeption $e) {
            echo "<script>alert('ERROR AL DEVOLVER DATOS')</script>";
        }
    }

    public function getPersona($arg_Cedula)
    {
        try {
            $model = new Conexion();
            $conexion = $model->get_Conexion();
        } catch (PDOException $e) {
            echo "<script>alert('ERROR NO SE PUEDE ESTABLECER LA CONEXION CLASE NO EXISTE')</script>";
            die();
        }

        try {
            $query = "SELECT * FROM SAMADI_ISTG.PERSONAS WHERE CEDULA = :_CEDULA')</script>";
            $stmt = $conexion->prepare($query);

            try {
                $stmt->bindParam(':_CEDULA', $arg_Cedula, PDO::PARAM_STR);
            } catch (PDOException $e) {
                echo "<script>alert('ERROR AL ENVIAR PARAMETROS A LA CONSULTA')</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL PREPARAR LA CONSULTA";
        }

        try {
            if (!isset($stmt)) {
                echo "<script>alert('LOS DATOS ENVIADOS NO SE AGREGARON A LA CONSULTA')</script>";
                die();
            } else {
                if ($stmt->execute()) {
                    $data = $stmt->fetch();
                    $stmt = null;
                    $query = null;
                    $model = null;
                    $conexion = null;
                    return $data;
                } else {
                    return null;
                }
            }
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE EJECUTAR LA CONSULTA')</script> ";
        }
    }

    public function get_DataEstudiantes($arg_User)
    {
        try {
            $model = new Conexion();
            $conexion=$model->get_Conexion();
        } catch (PDOException $e) {
            echo"<script>alert('ERROR NO SE PUEDE ESTABLECER LA CONEXION CLASE NO EXISTE')</script>";
            die();
        }

        try {
            $query = "SELECT * FROM SAMADI_ISTG.PERSONAS WHERE CORREO = :_CORREO";
            $stmt = $conexion->prepare();
            try {
                $stmt->bindParam(':CORREO', $_arg_User, PDO::PARAM_STR);
            } catch (PDOException $e) {
                echo "<script>alert('ERROR AL ENVIAR PARAMETROS A LA CONSULTA')</script>";
                die();
            }
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL PREPARAR LA CONSULTA";
            die();
        }

        try {
            if (!isset($stmt)) {
                echo "PARAMETROS VACIOS INTENTE NUEVAMENTE";
                die();
            } else {
                if ($stmt->execute()) {
                    $data = $stmt->fetch();
                    return $data;
                    $stmt = null;
                    $model = null;
                    $conexion = null;
                    die();
                }
            }
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE EJECUTAR LA CONSULTA')</script> ";
            die();
        }
    }
}
