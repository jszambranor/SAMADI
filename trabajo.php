<?php
require_once('./global/ClassEstructura.php');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="./css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="css/styleindex.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <!--Let browser know website is optimized for mobile-->
        <title>Trabajo Alumnos</title>
    </head>
    <body>
        <header>
            <?php
            $model = new Estructura();
            $estructura = $model->get_NavbarPublic();
            echo ($estructura);
            ?>
        </header>
        <main>

        </main>


        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                M.AutoInit();
            });
        </script>

        <script type="text/javascript" src="./js/materialize.min.js"></script>

    </body>
</html>