<?php
session_start();
require_once('../../global/ClassConexion.php');
require_once ('../../model/ClassModelMiClase.php');
require_once('../../global/ClassEstructura.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>ADMINISTRAR</title>
        <meta charset="utf-8">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" type="text/css" href="../../css/sidenav_docente.css">

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="../../css/navbaradmin.css">
    </head>

    <body>


        <header>


            <?php
            $model = new Estructura();
            $estructura = $model->get_NavBarAdmin();
            echo ($estructura);
            ?>

        </header>
        <main>
            <div>
                <!--		<?php
            $model = new MiClase();
            $cadena = $model->ListarClases($_SESSION['USER']);
            echo $cadena;
            ?>-->
            </div>
        </main>	

        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="../../js/jquery-3.4.1.js"></script>
        <script type="text/javascript" src="../../js/materialize.min.js"></script>

        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                var elems = document.querySelectorAll('.sidenav');
                var instances = M.Sidenav.init(elems);
            });
        </script>


    </body>
</html>