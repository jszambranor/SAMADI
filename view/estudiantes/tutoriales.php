<?php ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Videos Tutoriales</title>
        <meta charset="utf-8">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

        <header>
            <div class="navbar-fixed">
                <nav class="blue">
                    <div class="nav-wrapper">
                        <a href="#!" class="brand-logo">&nbsp;&nbsp;Logo</a>
                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down">
                            <li><a href="index.php"><i class="material-icons left">home</i>Inicio</a></li>
                            <li><a href="mis_clases.php"><i class="material-icons left">school</i>Mis Clases</a></li>
                            <li><a href="favoritos.php"><i class="material-icons left">star</i>Favoritos</a></li>
                            <li><a href="perfil.php"><i class="material-icons left">person</i>Perfil</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <ul class="sidenav" id="mobile-demo">
                <li><a href="index.php"><i class="material-icons left">home</i>Inicio</a></li>
                <li><a href="mis_clases.php"><i class="material-icons left">school</i>Mis Clases</a></li>
                <li><a href="favoritos.php"><i class="material-icons left">star</i>Favoritos</a></li>
                <li><a href="perfil.php"><i class="material-icons left">person</i>Perfil</a></li>
            </ul>
        </header>



        <main>

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
    </body>
</html>




<div class="row">
    <div class="col s12 m6">
        <div class="card">
            <div class="card-image">
                <img src="images/sample-1.jpg">
                <span class="card-title">Card Title</span>
                <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">tv</i></a>
            </div>
            <div class="card-content">
                <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
            </div>
        </div>
    </div>
</div>