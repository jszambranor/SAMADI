<?php

class Update {

    public function updatePersonas($arg_Cedula, $arg_Apellidos, $arg_Nombres, $arg_Correo, $arg_Tipo) {

        $model = new Conexion();
        $conexion = $model->get_Conexion();
        $query = "SELECT * FROM SAMADI_ISTG.PERSONAS WHERE CEDULA = :_CEDULA";

    }

}
