<?php
session_start();
if (isset($_SESSION['USER'])) {
  if ($_SESSION['TYPE'] != 1) {
    if ($_SESSION['TYPE'] == 2) {
      echo '<meta http-equiv="refresh" content="0; url=../docente/index.php">';
    }elseif ($_SESSION['TYPE'] == 3) {
    echo '<meta http-equiv="refresh" content="0; url=../estudiante/index.php">';
    }
  }
}else{
  echo '<meta http-equiv="refresh" content="0; url=../../login.php">';
}
require_once '../../conexion/ClassConexion.php';
require_once '../../model/ClassModelConsultas.php';
require_once '../../estruct/header.php';
$cedula = '0992181293';
$sidenav = new Estruct();
 ?>

<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../../css/estruct.css">
    <title>Inicio-ADMINISTRADOR</title>
  </head>
  <body>
    <header>
      <div class="navbar">
        <div id="menu" class="left-items">
          <a class="waves-effect modal-trigger" href="#modal1" ><i class="material-icons">menu</i></a>
        </div>
        <div id="logo" class="center-items">
          <img src="../../images/logo.jpg" alt="">
          <span>S A M </span>
        </div>
        <div id="avatar" class="right-items">
          <a href="#modal3" class="waves-effect modal-trigger"><img class="circle" src="../../images/estudiantes/mifoto.png" alt=""></a>
        </div>

      </div>
    </header>

    <main>

      <div class="row">
        <div class="col s12">
          <ul class="tabs tabs-fixed-width">
            <li class="tab col s4"><a class="active" id="indicator" href="#estudiantes">ESTUDIANTES</a></li>
            <li class="tab col s4"><a id="indicator" href="#docentes">DOCENTES</a></li>
            <li class="tab col s4"><a id="indicator" href="#administradores">ADMINISTRADORES</a></li>
          </ul>
        </div>
        <div id="estudiantes" class="col s12">
          <div class="title">
            <span>ESTUDIANTES</span>
          </div>
        <center>
          <div class="contenido">
            <div class="card">
              <div class="card-image">
                <img src="../../images/icons/estudiante.png">
                <span class="card-title"></span>
                <a class="btn-floating halfway-fab waves-effect waves-light red" href="./nuevoAlumno.php"><i class="material-icons">add</i></a>
              </div>
              <div class="card-content">
                <p>AGREGAR ESTUDIANTE</p>
              </div>
            </div>

          <div class="card">
            <div class="card-image">
              <img src="../../images/icons/estudiante.png">
              <span class="card-title"></span>
              <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">update</i></a>
            </div>
            <div class="card-content">
              <p>ACTUALIZAR ESTUDIANTE</p>
            </div>
          </div>
          </div>
          <center>
          </div>

        <div id="docentes" class="col s12">
          <div class="title">
            <span>DOCENTES</span>
          </div>
          <center>
          <div class="contenido">
            <div class="card">
              <div class="card-image">
                <img src="../../images/icons/profesores.png">
                <span class="card-title"></span>
                <a class="btn-floating halfway-fab waves-effect waves-light red" href="./nuevoDocente.php"><i class="material-icons">add</i></a>
              </div>
              <div class="card-content">
                <p>AGREGAR DOCENTE</p>
              </div>
            </div>

          <div class="card">
            <div class="card-image">
              <img src="../../images/icons/profesores.png">
              <span class="card-title"></span>
              <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">update</i></a>
            </div>
            <div class="card-content">
              <p>ACTUALIZAR DOCENTE</p>
            </div>
          </div>
          </div>
        </center>

            </div>

        <div id="administradores" class="col s12">
          <div class="title">
            <span>ADMINISTRADORES</span>
          </div>

          <center>
          <div class="contenido">
            <div class="card">
              <div class="card-image">
                <img src="../../images/icons/administradores.png">
                <span class="card-title"></span>
                <a class="btn-floating halfway-fab waves-effect waves-light red" href="./nuevoAdministrador.php"><i class="material-icons">add</i></a>
              </div>
              <div class="card-content">
                <p>AGREGAR ADMINISTRADOR</p>
              </div>
            </div>

          <div class="card">
            <div class="card-image">
              <img src="../../images/icons/administradores.png">
              <span class="card-title"></span>
              <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">update</i></a>
            </div>
            <div class="card-content">
              <p>ACTUALIZAR ADMINISTRADOR</p>
            </div>
          </div>
          </div>
        </div>
      </center>

    </main>


    <style media="screen">
    #inicio{
      background-color: #D6EAF8;
      border-radius: 0px 50px 50px 0px;
      width: 90%;
    }
    .contenido{
      margin-top: 2%;
      background-color: red;
    }
    .card{
      width: 25%;
      margin-left: 2%;
      display: inline-block;
      float: left
    }

    .card-content p{
      color:#02265E;
      font-weight: bold;
      width: 100%;
    }

    .center-items{
      margin-top: 1%;
      float: left;
    }

    </style>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
  </body>
</html>
