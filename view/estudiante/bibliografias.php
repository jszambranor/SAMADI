<?php
session_start();
require_once '../../conexion/ClassConexion.php';
require_once '../../model/ClassModelConsultas.php';
require_once '../../estruct/header.php';
require_once '../../model/ClassModelCatedras.php';
/*if (isset($_SESSION['USER'])) {
  if ($_SESSION['TYPE'] != 3) {
    if ($_SESSION['TYPE'] == 1) {
      echo '<meta http-equiv="refresh" content="0; url=../admin/index.php">';
    }elseif ($_SESSION['TYPE'] == 2) {
    echo '<meta http-equiv="refresh" content="0; url=../docente/index.php">';
    }
  }
}else{
  echo '<meta http-equiv="refresh" content="0; url=../../login.php">';
}*/
 ?>

<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../../css/estruct.css">
    <title>ACTIVIDADES</title>
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
          <a class="waves-effect modal-trigger" href="#modal2"><i class="material-icons">add</i></a>
          <a href="#modal3" class="waves-effect modal-trigger"><img class="circle" src="../../images/estudiantes/mifoto.png" alt=""></a>
        </div>
      </div>
    </header>

    <main>
      <div class="row">
        <div class="col s12">
          <ul class="tabs tabs-fixed-width">
            <li class="tab col s4"><a  id="indicator" href="#actividades">ACTIVIDADES</a></li>
            <li class="tab col s4"><a  id="indicator" href="#guiasvisuales">MATERIAL DE APOYO</a></li>
            <li class="tab col s4"><a class="active" id="indicator" href="#bibliografias">BIBLIOGRAFIAS</a></li>
          </ul>
        </div>
        <div id="actividades" class="col s12">
          <div class="title">
            <span>ACTIVIDADES</span>
          </div>
          <div id="row-actividades" class="row">
            <ul class="collapsible">
              <li>
                <div class="collapsible-header"><i class="material-icons">extension</i>ACTIVIDAD 1<i class="right material-icons">keyboard_arrow_down</i></div>
                <div class="collapsible-body">
                  <span>NOMBRE DE LA ACTIVIDAD</span><br><br>
                  <span>DESCRIPCION DE LA ACTIVIDAD</span><br>
                  <a href="#">VER ACTIVIDAD</a>
                </div>
              </li>
              <li>
                <div class="collapsible-header"><i class="material-icons">layers</i>ACTIVIDAD 2<i class="right material-icons">keyboard_arrow_down</i></div>
                <div class="collapsible-body">
                  <span>NOMBRE DE LA ACTIVIDAD</span><br><br>
                  <span>DESCRIPCION DE LA ACTIVIDAD</span><br>
                  <a href="#">VER ACTIVIDAD</a>
                </div>
              </li>
              <li>
                <div class="collapsible-header"><i class="material-icons">whatshot</i>ACTIVIDAD 3<i class="right material-icons">keyboard_arrow_down</i></div>
                <div class="collapsible-body">
                  <span>NOMBRE DE LA ACTIVIDAD</span><br><br>
                  <span>DESCRIPCION DE LA ACTIVIDAD</span><br>
                  <a href="#">VER ACTIVIDAD</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div id="guiasvisuales" class="col s12">
          <div class="title">
            <span>MATERIAL DE APOYO</span>
          </div>

          <div id="row-actividades" class="row">
            <ul id="guiasvt" class="collapsible popout">
              <li>
                <div id="header-tittle"  class="collapsible-header"><i class="material-icons">extension</i>GUIAS VISUALES<i class="right material-icons">keyboard_arrow_down</i></div>
                <div class="collapsible-body">
                  <span>NOMBRE DE LA ACTIVIDAD</span><br><br>
                  <span>DESCRIPCION DE LA ACTIVIDAD</span><br>
                  <a href="#">VER ACTIVIDAD</a>
                </div>
              </li>
            </ul>
          </div>


          <div id="row-actividades" class="row">
            <ul id="guiasvt" class="collapsible popout">
              <li>
                <div id="header-tittle" class="collapsible-header"><i class="material-icons">extension</i>VIDEOS TUTORIALES<i class="right material-icons">keyboard_arrow_down</i></div>
                <div class="collapsible-body">
                  <span>NOMBRE DE LA ACTIVIDAD</span><br><br>
                  <span>DESCRIPCION DE LA ACTIVIDAD</span><br>
                  <a href="#">VER ACTIVIDAD</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div id="bibliografias" class="col s12">
          <div class="title">
            <span>BIBLIOGRAFIAS</span>
          </div>
        </div>
      </div>


    </main>

  
    <div id="modal1" class="modal">
      <ul class="slide-out">
        <li><a class="li" id="temas" href="./index.php">INICIO</a></li>
        <li><a class="li" id="actividadesli" href="./actividades.php">ACTIVIDADES</a></li>
        <li><a class="li" id="guia" href="#">GUÍAS VISUALES</a></li>
        <li><a class="li" id="video" href="#">VIDEOS TUTORIALES</a></li>
        <li><a class="li" id="bibliografia" href="#">BIBLIOGRAFÍAS</a></li>
      </ul>

      </div>

      <div id="modal2" class="modal">
        <form class="registro_clase" action="index.php" method="post">
          <label for="codigo_catedra">INGRESA EL CODIGO DE LA CLASE</label>
          <input id="cod_clase"  type="text" name="codigo_catedra" value=""><br>
          <button id="registro" class="btn" type="submit" name="button">REGISTRAR</button>
        </form>
        </div>

        <div id="modal3" class="modal">
          <div class="nombres">
            <span id="nombre">BIENVENIDO</span><br>
            <span id="nombre"><?php echo $nombres['NOMBRES']; ?></span>
            <span id="nombre"><?php echo $nombres['APELLIDOS']; ?></span>
          </div>
          <div class="link">
            <a href="./micuenta.php?cedula="><i class="material-icons">account_circle</i> MI CUENTA</a><br>
            <a href="../../conexion/logout.php"><i class="material-icons">logout</i> CERRAR SESIÓN</a>
          </div>

          </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
  </body>
</html>
