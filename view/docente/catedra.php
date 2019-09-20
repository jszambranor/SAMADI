<?php
session_start();
require_once '../../conexion/ClassConexion.php';
require_once '../../model/ClassModelConsultas.php';
require_once '../../estruct/header.php';
$cod_catedra = $_GET['cod'];
$objConsultas = new ModelConsultas();
$nombre_catedra = $objConsultas->get_NombreCatedra($cod_catedra);
$objEstruct = new Estruct();
$header = $objEstruct->get_modals($cedula['CEDULA']);

 ?>
<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../../css/estruct.css">
    <meta charset="utf-8">
    <title><?php echo $nombre_catedra; ?></title>
  </head>
  <body>
    <header>
      <?php echo $header; ?>
    </header>
    <main>
      <div class="row">
        <div class="col s12">
          <ul class="tabs tabs-fixed-width">
            <li class="tab col s4"><a class="active" id="indicator" href="#subir_actividades">SUBIR ACTIVIDADES</a></li>
            <li class="tab col s4"><a id="indicator" href="#mis_Actividades">MIS ACTIVIDADES</a></li>
            <li class="tab col s4"><a id="indicator" href="#bibliografias">BIBLIOGRAFIAS</a></li>
          </ul>
        </div>
        <div id="subir_actividades" class="col s12">
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
        <div id="mis_Actividades" class="col s12">
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


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
  </body>
</html>
