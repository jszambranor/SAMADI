<?php
session_start();
require_once '../../conexion/ClassConexion.php';
require_once '../../model/ClassModelConsultas.php';
require_once '../../estruct/header.php';
require_once '../../model/ClassModelCatedras.php';
$cod_catedra = $_GET['cod'];
$objConsultas = new ModelConsultas();
$nombre_catedra = $objConsultas->get_NombreCatedra($cod_catedra);
$objEstruct = new Estruct();
$header = $objEstruct->get_Sidenav($_SESSION['USER']);
$objCatedras = new ModelCatedras();
$codigo = $objCatedras->generarCodigo(6);

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
      <?php echo $navbar; ?>
      <?php echo  $header; ?>
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
          <div id="row-actividades" class="row">
            <div class="section container">
            <div class="row card-panel">
           <form class="col s12" action="../../controller/ClassControllerActividades.php" method="post" enctype="multipart/form-data" method="POST">
             <div class="row">
               <div class="input-field col s12">
                 <input hidden type="text" name="cod_catedra" value="<?php echo $cod_catedra ?>" id="cod_catedra" class="validate">
               </div>
               <div class="input-field col s12">
                 <input hidden type="text" name="cod_actividad" value="<?php echo $codigo ?>" id="cod_actividad" class="validate">
               </div>
             </div>
             <div class="row">
                <div class="input-field col s12">
                  <input  id="first_name" type="text" class="validate" required name="nombre">
                  <label for="first_name">NOMBRE DE LA ACTIVIDAD</label>
                </div>
                     </div>
                <div class="row">
                  <div class="input-field col s12">
                    <textarea id="textarea1" name="descripcion" class="materialize-textarea"></textarea>
                    <label for="textarea1">DESCRIPCION DE LA ACTIVIDAD</label>
                  </div>
                </div>

             <div class="row">
               <div class="file-field input-field col s12">
              <div class="btn">
                <span>ARCHIVO HTML</span>
                <input type="file" name="index" required class="validate">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
             </div>

             <div class="row">
               <div class="file-field input-field col s12">
              <div class="btn">
                <span>IMAGENES</span>
                <input type="file" multiple="multiple" name="media[]" required class="validate">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
             </div>

             <div class="row">
               <div class="file-field input-field col s12">
              <div class="btn">
                <span>ARCHIVOS JS</span>
                <input type="file" multiple="multiple" name="js[]" required class="validate">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
             </div>

             <div class="row">
               <div class="file-field input-field col s12">
              <div class="btn">
                <span>ARCHIVOS CSS</span>
                <input type="file" multiple="multiple" name="css[]" required class="validate">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
             </div>
             <center>
              <button class="btn waves-effect waves-light" type="submit" name="action">PUBLICAR ACTIVIDAD</button>
            </center>
           </form>
         </div>

             </div>
          </div>
        </div>
        <div id="mis_Actividades" class="col s12">

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
    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });
    </script>
  </body>
</html>
