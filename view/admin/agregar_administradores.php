<?php
require_once('../../global/ClassEstructura.php');

$name = "AGREGAR ADMINISTRADORES";
?>
<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <title>AGREGAR ESTUDIANTE</title>
        <meta charset="utf-8">
        <meta charset="ISO-8859-1 ">
        <link rel="shortcut icon" href="../../images/LOGO.jpg">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="../../css/sidenav_docente.css">
        <link rel="stylesheet" type="text/css" href="../../css/navbaradmin.css">
        <script type="text/javascript" src="../../js/inputs.js"></script>
    </head>

    <body>

        <style type="text/css">
            #titulo2{
                height: 10%;
                margin-bottom: 4%;
                text-align: center;
            }
            #titulo-icon{
                margin-top: 0em;
                color: white;
                font-size: 2rem;
            }
            #titulo-h3{
                font-size: 100%;
                margin-top: 0%;
                text-align: center;
                color: white;
                height: 10%;
            }
        </style>

        <?php
        $model = new Estructura();
        $estructura = $model->get_NavBarAdmin();
        $estructura = $estructura . ' <div class="navbar-fixed"><nav class="navbar-fixed">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center" id="logo">' . $name . '</a>
      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>

  </nav></div>';
        echo($estructura);
        ?>

        <main>

            <div class="section container">
                <div class="row card-panel">
                    <form class="col s12" method="POST" action="../../controller/ClassControllerRegistrarB.php">
                        <div class="row">
                            <div class="input-field col s12">
                                <input required="true"  id="cedula" name="cedula" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)">
                                <label id="select-input" for="cedula">Cedula * </label>
                            </div>
                            <div class="input-field col s6">
                                <input required="true" id="apellidos" name="apellidos" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
                                <label id="select-input" for="apellidos">Apellidos *</label>
                            </div>
                            <div class="input-field col s6">
                                <input required="true" id="nombres" name="nombres" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
                                <label id="select-input" for="nombres">Nombres *</label>
                            </div>
                            <div class="input-field col s12">
                                <input required="true" id="mail" name="mail" type="text" class="validate" onkeypress="return soloMail(event)">
                                <label id="select-input" for="mail">Correo Electrónico *</label>
                            </div>


                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light" type="submit" name="action" id="btn">REGISTRAR
                                    <i class="material-icons left">send</i>
                                </button>
                            </div>

                        </div>
                    </form>
                </div>


        </main>


        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="../../js/jquery-3.4.1.js"></script>
        <script type="text/javascript" src="../../js/materialize.min.js"></script>
        <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function () {
                    var elems = document.querySelectorAll('.sidenav');
                    var instances = M.Sidenav.init(elems);
                    var elems = document.querySelectorAll('select');
                    var instances = M.FormSelect.init(elems);
                });
        </script>
    </body>
</html>
