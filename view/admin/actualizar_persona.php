<?php
require_once('../../global/ClassEstructura.php');
/* if(!$_SESSION['USER']){
  header('Location:../../index.php');
  }else{
  echo($body);
  } */
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Inicio</title>
        <meta charset="utf-8">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" type="text/css" href="../../css/navbaradmin.css">
        <link rel="stylesheet" type="text/css" href="../../css/sidenav_docente.css">

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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

            <div class="main-div" align="center">


                <div class="contenido">
                    <div class="card small">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img id="imagenes" class="activator" src="../../images/tutoriales.jpg">
                        </div>
                        <div class="card-content">

                            <p id="link"><a href="./actualizar_estudiante.php">Estudiantes</a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
                        </div>
                    </div>
                </div>


                <div class="contenido">
                    <div class="card small">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img id="imagenes" class="activator" src="../../images/tutoriales.jpg">
                        </div>
                        <div class="card-content">

                            <p id="link"><a href="actualizar_gestor-contenido.php">Gestores de Contenido</a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
                        </div>
                    </div>
                </div>

                <div class="contenido">
                    <div class="card small">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img id="imagenes" class="activator" src="../../images/material.jpg">
                        </div>
                        <div class="card-content">

                            <p id="link"><a href="actualizar_administradores.php">Administradores</a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Material Academico<i class="material-icons right">close</i></span>
                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
                        </div>
                    </div>
                </div>
            </div>

        </main>

        <footer>

        </footer>

        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="../../js/materialize.min.js"></script>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                M.AutoInit();
                var elems = document.querySelectorAll('.sidenav');
                var instances = M.Sidenav.init(elems);
            });

        </script>

        <style type="text/css">

            .main-div{
                margin-top:2%;
                position:absolute;
                background:#FCFBFB;
                border: 2px solid #FCFBFB ;
                width:70%;
                height:auto;
                margin-left: 5%;
                margin-right: 5%;
                border-radius: 5px 60px 5px 60px;
                text-align: center;
            }

            body {
                width : 100%;
                margin-left : auto;
                margin-right : auto;
                padding : 0px;
            }

            .contenido{
                margin-top:2%;
                width: 40%;
                height: 40%;
                display: inline-block;
                border-radius: 5px 10px 5px 10px;
                margin-left: 3%;
                margin-right: 3%;
                position: relative;
            }

            #imagenes{
                width: 100%;
                height: 250px;
            }

            #link{
                font: small-caps 200% serif;
            }


        </style>
    </body>
</html>
