<?php

require_once('../global/ClassConexion.php');
require_once('../model/ClassModelLogin.php');

$usuario = "";
$password = "";
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = test_input($_POST["usuario"]);
        $password = test_input($_POST['pass']);
    }
} catch (PDOExeption $e) {
    echo "ERROR EN EL METODO DE ENVIO Y RECEPCION DE DATOS";
}



$password1 = sha1($password);
try {
    $modelo = new Login();
    $login = $modelo->get_Login($usuario, $password1);
    $tipo = $modelo->get_Tipo($usuario);
} catch (PDOExeption $e) {
    echo "ERROR AL LLAMAR LAS FUNCIONES";
}
echo $login;

try {
    if ($login == 1) {
        session_start();
        $_SESSION['USERLOG'] = $usuario;
        $_SESSION['TIPO_USUARIO'] = $tipo;
        $usuario = null;
        $password1 = null;
        $password = null;
        $login = null;
        $tipo = null;
        $modelo = null;
        if ($_SESSION['TIPO_USUARIO'] == 'EST') {
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/estudiantes/index.php">';
        } elseif ($_SESSION['TIPO_USUARIO'] == 'AMD') {
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/admin/index.php">';
        } elseif ($_SESSION['TIPO_USUARIO'] == 'CONT') {
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/content/index.php">';
        }
    } else {
        echo "ERROR CREDENCIALES INCORRECTAS";
      //  echo '<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../login.php">';
    }
} catch (PDOExeption $e) {
    echo $e;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
