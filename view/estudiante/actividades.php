<?php
session_start();
require_once '../../conexion/ClassConexion.php';
require_once '../../model/ClassModelConsultas.php';
require_once '../../estruct/header.php';
require_once '../../model/ClassModelCatedras.php';
require_once '../../model/ClassModelActividades.php';
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

$objConsultas = new ModelConsultas();
$cedula = $objConsultas->get_DatosCorreo(/*$_SESSION['USER']*/'jszambrano@est.itsgg.edu.ec');
$objCatedras = new ModelCatedras();
$catedras = $objCatedras->get_Catedras($cedula['CEDULA']);
$nombres = $objConsultas->get_Datos($cedula['CEDULA']);
$objEstruct = new Estruct();
$header = $objEstruct->get_Sidenav($_SESSION['USER']);
$objActividades = new ModelActividades();
$exists_Actividades = $objActividades->get_ExistsActividades($_GET['cod']);

 ?>

<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../../css/estruct.css">
    <title>ACTIVIDADES</title>
  </head>
  <body>
    <?php
    $id = $_GET['cod'];
    echo $style = '<style media="screen">#'.$id.'{
      background-color: #AED6F1;
      border-radius: 0px 50px 50px 0px;
      width: 80%;
    }</style>';
     ?>
    <header>
      <?php echo $header; ?>
    </header>

    <main>
      <div class="row">
        <div class="col s12">
          <ul class="tabs tabs-fixed-width">
            <li class="tab col s4"><a class="active" id="indicator" href="#actividades">ACTIVIDADES</a></li>
            <li class="tab col s4"><a id="indicator" href="#guiasvisuales">MATERIAL DE APOYO</a></li>
            <li class="tab col s4"><a id="indicator" href="#bibliografias">BIBLIOGRAFIAS</a></li>
          </ul>
        </div>
        <div id="actividades" class="col s12">
          <div class="title">
            <span>ACTIVIDADES</span>
          </div>
          <div id="row-actividades" class="row">
            <center>
            <div class="contenedor">
                <?php echo $exists_Actividades; ?>
            </div>
          </center>

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

      <style media="screen">
        .contenedor{
          width: 90%;

        }
        .card{
          width: 30%;
          display: inline-block;
          margin-left: 2%;
          float: left;
        }

        #catedrasli{
          font-weight: bold;
        }

        li a:hover{
          background-color: #fff;
        }
        #catedrasli:hover{
           background-color: #F0B27A;
           border-radius: 0px 50px 50px 0px;
         }

      </style>



    </main>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
  </body>
</html>
