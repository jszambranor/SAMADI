<?php

try {
    session_start();
    $_SESSION['USERLOG'] = null;
    $_SESSION['TIPO_USER'] = null;
    session_destroy();
} catch (PDOException $e) {
    echo "ERROR AL CERRAR LA SESION";
    echo "SE REINTENTARA EN 3 SEGUNDOS";
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=./Logout.php">';
}
