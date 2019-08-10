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
        <title>Login</title>
    </head>
    <body>
        <header>
            <?php
            $model = new Estructura();
            $estructura = $model->get_NavbarPublic();
            echo ($estructura);
            ?>
        </header>
    <center>
        <main>
            <center>
                <div class="section container" id="seccion">
                    <div class="row card-panel">
                        <img src="./images/LOGO.jpg" width="30%" align="center">
                        <br>
                        <form class="col s12" method="POST" action="./controller/ClassControllerLogin.php" id="formulario">
                            <div class="input-field col s12">
                                <input required="true"  id="usuario" name="usuario" type="text" class="validate" onkeypress="return soloMail(event)" >
                                <label id="select-input" for="usuario">Correo * </label>
                            </div>
                            <div class="input-field col s12">
                                <input required="true"  id="pass" name="pass" type="password" class="validate" onkeypress="return soloMail(event)" >
                                <label id="select-input" for="pass">Contraseña * </label>
                            </div>
                            <button class="btn waves-effect waves-light" type="submit" name="action">Iniciar Sesion
                                <i class="material-icons left">verified_user</i>
                            </button>
                        </form>
                    </div>
                </div>
            </center>
        </main>
    </center>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            M.AutoInit();
        });
    </script>
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
    <script type="text/javascript" src="./js/materialize.min.js"></script>
    <script type="text/javascript" src="./js/login.js"></script>

</body>
</html>