<?php

class Registrar {

    public function set_Persona($arg_Cedula, $arg_Apellidos, $arg_Nombres, $arg_Correo) {
        $stmt = "";
        try {
            $model = new Conexion();
            $conexion = $model->get_Conexion();
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL OBTENER CONEXION')</script>";
        }

        try {
            $query = "CALL SAMADI_ISTG.CREATE_PERSONA(:CEDULA,:APELLIDOS,:NOMBRES,:CORREO)";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':CEDULA', $arg_Cedula, PDO::PARAM_STR);
            $stmt->bindParam(':APELLIDOS', $arg_Apellidos, PDO::PARAM_STR);
            $stmt->bindParam(':NOMBRES', $arg_Nombres, PDO::PARAM_STR);
            $stmt->bindParam(':CORREO', $arg_Correo, PDO::PARAM_STR);
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL PREPARA LA CONSULTA SQL')</script>";
        }

        try {
            if ($stmt->execute()) {
                return "REGISTRO CREADO CON EXITO";
                $stmt = null;
                $model = null;
                $conexion = null;
            } else {
                return "ERROR AL CREAR REGISTRO";
                $stmt = null;
                $model = null;
                $conexion = null;
            }
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL EJECUTAR LA CONSULTA')</script>";
        }
    }

    public function set_Usuario($arg_Mail, $arg_Password) {

        $stmt = "";
        try {
            $model = new Conexion();
            $conexion = $model->get_Conexion();
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL OBTENER CONEXION')</script>";
        }

        try {
            $query = "CALL SAMADI_ISTG.CREATE_USUARIOS(:MAIL,:PASSWORD)";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':MAIL', $arg_Mail, PDO::PARAM_STR);
            $stmt->bindParam(':PASSWORD', $arg_Password, PDO::PARAM_STR);
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL PREPARA LA CONSULTA SQL')</script>";
        }

        try {
            if (!$stmt) {
                return "<br>ERROR AL PROCESAR LA SOLICITUD, NO SE REGISTRARON LOS DATOS";
            } else {
                if ($stmt->execute()) {
                    return ('<br> USARIO REGISTRADO CON EXITO');
                    $stmt = null;
                    $model = null;
                    $conexion = null;
                } else {
                    return ('NO SE REGISTRO EL USUARIO INTENTE NUEVAMENTE');
                    $stmt = null;
                    $model = null;
                    $conexion = null;
                }
            }
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL EJECUTAR LA CONSULTA')</script>";
        }
    }

    public function set_Usuario1($arg_Mail, $arg_Password) {
        $stmt = "";

        try {
            $model = new Conexion();
            $conexion = $model->get_Conexion();
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL OBTENER CONEXION')</script>";
        }

        try {
            $query = "CALL SAMADI_ISTG.CREATE_USUARIOS1(:MAIL,:PASSWORD)";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':MAIL', $arg_Mail, PDO::PARAM_STR);
            $stmt->bindParam(':PASSWORD', $arg_Password, PDO::PARAM_STR);
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL PREPARA LA CONSULTA SQL')</script>";
        }

        try {
            if (!$stmt) {
                return "<br>ERROR AL PROCESAR LA SOLICITUD, NO SE REGISTRARON LOS DATOS";
            } else {
                if ($stmt->execute()) {
                    return ('<br> USARIO REGISTRADO CON EXITO');
                    $stmt = null;
                    $model = null;
                    $conexion = null;
                } else {
                    return ('NO SE REGISTRO EL USUARIO INTENTE NUEVAMENTE');
                    $stmt = null;
                    $model = null;
                    $conexion = null;
                }
            }
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL EJECUTAR LA CONSULTA')</script>";
        }
    }

    public function set_Alumno($arg_Cedula, $arg_Correo, $arg_Jornada, $arg_Carrera, $arg_Nivel, $arg_Seccion, $arg_Ciclo) {
        $stmt = "";

        try {
            $model = new Conexion();
            $conexion = $model->get_Conexion();
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL OBTENER CONEXION')</script>";
        }

        try {
            $query = 'CALL SAMADI_ISTG.CREATE_ALUMNO(:CEDULA,:CORREO,:COD_JORNADA,:CARRERA,:NIVEL,:PARALELO,:CICLO)';
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':CEDULA', $arg_Cedula, PDO::PARAM_STR);
            $stmt->bindParam(':CORREO', $arg_Correo, PDO::PARAM_STR);
            $stmt->bindParam(':COD_JORNADA', $arg_Jornada, PDO::PARAM_STR);
            $stmt->bindParam(':CARRERA', $arg_Carrera, PDO::PARAM_STR);
            $stmt->bindParam(':NIVEL', $arg_Nivel, PDO::PARAM_STR);
            $stmt->bindParam(':PARALELO', $arg_Seccion, PDO::PARAM_STR);
            $stmt->bindParam(':CICLO', $arg_Ciclo, PDO::PARAM_STR);
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL PREPARA LA CONSULTA SQL')</script>";
        }


        try {
            if ($stmt->execute()) {
                return "ALUMNO REGISTRADO CON EXITO";
                $stmt = null;
                $model = null;
                $conexion = null;
            } else {
                return "ERROR AL REGISTRAR ALUMNO";
                $stmt = null;
                $model = null;
                $conexion = null;
            }
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL EJECUTAR LA CONSULTA')</script>";
        }
    }

}
