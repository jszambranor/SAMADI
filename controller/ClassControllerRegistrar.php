<?php

require_once('../global/ClassConexion.php');
require_once('../model/ClassModelRegistrar.php');

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = test_input($_POST["mail"]);
        $password = test_input($_POST['cedula']);
        $cedula = test_input($_POST['cedula']);
        $apellidos = test_input($_POST['apellidos']);
        $nombres = test_input($_POST['nombres']);
        $mail = test_input($_POST['mail']);
        $carrera = test_input($_POST['carreras']);
        $jornada = test_input($_POST['jornadas']);
        $seccion = test_input($_POST['seccion']);
        $nivel = test_input($_POST['niveles']);
        $ciclo = test_input($_POST['ciclo']);
        $password1 = sha1($password);
    }
} catch (PDOException $e) {
    echo "ERROR AL OBTENER EL METODO DE ENVIO Y RECEPCION DE DATOS";
}

try {
    if ($cedula == "" || $apellidos == "" || $nombres == "" || $mail == "" || $carrera == "" || $jornada == "" || $seccion == "" || $nivel == "" || $ciclo == "") {
        echo("DATOS FALTANTES... REVISE E INTENTE DE NUEVO.");
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../views/admin/agregar_estudiante.php">';
    } else {
        $model = new Registrar();
        $mensaje = $model->set_Persona($cedula, $apellidos, $nombres, $mail);
        echo $mensaje;
        echo '<br>';
        $mensaje = $model->set_Usuario($usuario, $password1);
        echo $mensaje;
        echo '<br>';
        $mensaje = $model->set_Alumno($cedula, $mail, $jornada, $carrera, $nivel, $seccion, $ciclo);
        echo $mensaje;
        echo '<br>';

        $usuario = null;
        $password = null;
        $cedula = null;
        $apellidos = null;
        $nombres = null;
        $mail = null;
        $carrera = null;
        $jornada = null;
        $seccion = null;
        $nivel = null;
        $ciclo = null;
        $password1 = null;


        echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=../views/admin/agregar_estudiante.php">';
    }
} catch (PDOException $e) {
    echo "ERROR AL PROCESAR LA SOLICITUD DE REGISTRO";
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
