<?php
/**
 *
 */
class ModelLogin
{
    public function __construct()
    {
    }

    private function login($arg_User, $arg_Password)
    {
        try {
            $objConexion = new Conexion();
            $conexion = $objConexion->get_Conexion();
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().")</script>";
            die();
        }

        try {
            $query="SELECT * FROM SAMADI.USUARIOS WHERE USER = :_USER";
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE CREAR LA CONSULTA'".$e->getMessage().")</script>";
        }

        try {
            $stmt = $conexion->prepare($query);
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE PREPARAR LA CONSULTA'".$e->getMessage().")</script>";
        }

        try {
            $stmt->bindParam(':_USER', $arg_User, PDO::PARAM_STR);
        } catch (PDOException $e) {
            echo "<script>alert('NO SE PUEDE ENVIAR PARAMETROS A LA CONSULTA'".$e->getMessage().")</script>";
        }

        try {
            if (!isset($stmt)) {
                return 3;
            } elseif (isset($stmt)) {
                if ($stmt->execute()) {
                    $data = $stmt->fetch();
                    if ($data['USER'] === $arg_User) {
                        if ($data['PASSWORD'] === $arg_Password) {
                          session_start();
                          $_SESSION['USER'] = $data['USER'];
                          $_SESSION['TYPE'] = $data['TYPE'];
                            return 1;
                        } else {
                            return 2;
                        }
                    } else {
                        return 4;
                    }
                } else {
                    return 0;
                }
            }
        } catch (PDOException $e) {
          echo "<script>alert('NO SE PUEDE EJECUTAR A LA CONSULTA'".$e->getMessage().")</script>";
        }
    }

    public function get_Login($arg_User,$arg_Password)
    {
      return $this->login($arg_User,$arg_Password);
    }
}
