<?php

class Conexion {

    public function get_Conexion() {
        $host = "18.216.149.136";
        $bd = "SAMADI_ISTG";
        $user = "josue-zambrano";
        $pass = "Jszr1096@samadi";

        try {
            $con = new PDO("mysql:host=$host;dbname=$bd", $user, $pass);
        } catch (PDOExeption $e) {
            echo "ERROR DE CONEXION";
        }

        try {
            if (!$con) {
                echo "ERROR DE CONEXION";
            } else {
                return $con;
            }
        } catch (PDOExeption $e) {
            echo "ERROR AL DEVOLVER CONEXION";
        }
    }

}
