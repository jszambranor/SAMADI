<?php

class Login {

    public function get_Login($arg_Correo, $arg_Password) {
        try {
            $model = new Conexion();
            $conexion = $model->get_Conexion();
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL OBTENER CONEXION')</script>";
            die();
        }

        try {
            $query = "SELECT * FROM SAMADI_ISTG.USUARIOS WHERE CORREO = :_MAIL AND PASSWORD = :_CLAVE";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':_MAIL', $arg_Correo, PDO::PARAM_STR);
            $stmt->bindParam(':_CLAVE', $arg_Password, PDO::PARAM_STR);
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL PREPARA LA CONSULTA SQL')</script>";
            die();
        }

        try {
            if (!isset($stmt)) {
                return 0;
                die();
            } else {
                $stmt->execute();
                $data = $stmt->fetch();
                if ($data['CORREO'] == $arg_Correo && $data['PASSWORD'] == $arg_Password) {
                    $model = null;
                    $conexion = null;
                    $stmt = null;
                    return 1;
                    die();
                } else {
                    return 0;
                    die();
                }
            }
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL EJECUTAR LA CONSULTA')</script>";
            die();
        }
    }

    public function get_Tipo($arg_Correo) {
        try {
            $model = new Conexion();
            $conexion = $model->get_Conexion();
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL OBTENER CONEXION')</script>";
            die();
        }

        try {
            $query = "SELECT * FROM SAMADI_ISTG.USUARIOS WHERE CORREO = :_MAIL";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':_MAIL', $arg_Correo, PDO::PARAM_STR);
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL PREPARA LA CONSULTA SQL')</script>";
            die();
        }

        try {
            if ($stmt->execute()) {
                $data = $stmt->fetch();
                $model = null;
                $conexion = null;
                $stmt = null;
                return ($data['COD_USER']);
            } else {
                return null;
                die();
            }
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL EJECUTAR LA CONSULTA')</script>";
            die();
        }
    }

}
