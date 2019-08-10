<?php
require_once('./global/ClassEstructura.php');
?>
<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="utf-8">
        <title>Samadi - Inicio</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" type="text/css" href="css/styleindex.css">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <header>
            <?php
            $model = new Estructura();
            $estructura = $model->get_NavbarPublic();
            echo($estructura);
            ?>

        </header>
        <main>
            <div id="index-banner" class="parallax-container">
                <div class="section no-pad-bot">
                    <div class="container">
                        <br><br>
                        <h1 class="header center indigo-text text-draken-4">SAMADI ISTG</h1>
                        <div class="row center">
                            <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                        </div>
                        <div class="row center">
                            <a href="login.php" id="download-button" class="btn-large waves-effect waves-light blue darken-4"><i class="material-icons left">person</i>Iniciar Sesion</a>
                        </div>
                        <br><br>
                    </div>
                </div>
                <div class="parallax"><img src="./images/image1.jpg" alt="Unsplashed background img 1"></div>
            </div>
            <div class="container">
                <div class="section">
                    <!--   Icon Section   -->
                    <div class="row">
                        <div class="col s12 m4">
                            <div class="icon-block">
                                <h2 class="center blue-text"><i class="material-icons">flash_on</i></h2>
                                <h5 class="center">Speeds up development</h5>
                                <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
                            </div>
                        </div>
                        <div class="col s12 m4">
                            <div class="icon-block">
                                <h2 class="center blue-text"><i class="material-icons">group</i></h2>
                                <h5 class="center">User Experience Focused</h5>
                                <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
                            </div>
                        </div>
                        <div class="col s12 m4">
                            <div class="icon-block">
                                <h2 class="center blue-text"><i class="material-icons">settings</i></h2>
                                <h5 class="center">Easy to work with</h5>
                                <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="parallax-container valign-wrapper">
                <div class="section no-pad-bot">
                    <div class="container">
                        <div class="row center">
                            <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                        </div>
                    </div>
                </div>
                <div class="parallax"><img src="./images/image2.jpg" alt="Unsplashed background img 2"></div>
            </div>
            <div class="container">
                <div class="section">
                    <div class="row">
                        <div class="col s12 center">
                            <h3><i class="mdi-content-send brown-text"></i></h3>
                            <h4>Contact Us</h4>
                            <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="parallax-container valign-wrapper">
                <div class="section no-pad-bot">
                    <div class="container">
                        <div class="row center">
                            <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                        </div>
                    </div>
                </div>
                <div class="parallax"><img src="./images/image3.jpg" alt="Unsplashed background img 3"></div>
            </div>
        </main>
        <footer class="page-footer teal">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Company Bio</h5>
                        <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Settings</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Link 1</a></li>
                            <li><a class="white-text" href="#!">Link 2</a></li>
                            <li><a class="white-text" href="#!">Link 3</a></li>
                            <li><a class="white-text" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Connect</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Link 1</a></li>
                            <li><a class="white-text" href="#!">Link 2</a></li>
                            <li><a class="white-text" href="#!">Link 3</a></li>
                            <li><a class="white-text" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
                </div>
            </div>
        </footer>
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                M.AutoInit();
                var elems = document.querySelectorAll('.sidenav');
                var instances = M.Sidenav.init(elems);
            });
            var elems = document.querySelectorAll('.parallax');
            var instances = M.Parallax.init(elems);
        </script>

    </body>
</html>
