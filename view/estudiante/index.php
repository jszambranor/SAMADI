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
$objConsultas = new ModelConsultas();
$cedula = $objConsultas->get_DatosCorreo($_SESSION['USER']);
$objCatedras = new ModelCatedras();
$catedras = $objCatedras->get_Catedras($cedula['CEDULA']);
$nombres = $objConsultas->get_Datos($cedula['CEDULA']);
$objEstruct = new Estruct();
$header = $objEstruct->get_Sidenav($_SESSION['USER']);
 ?>

<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../../css/estruct.css">
    <title>INICIO - ESTUDIANTE</title>
  </head>
  <body>

    <header>
      <?php echo $header; ?>
    </header>

    <main>
      <center>
      <div class="contenido">

        <div class="materias">
          <?php echo $catedras; ?>
        </div>
      </div>
    </center>

    </main>

    <style media="screen">
      .contenido{
        width: 100%;
      }

      #inicio{
        background-color: #AED6F1;
        border-radius: 0px 50px 50px 0px;
        width: 80%;
      }

      #select:hover{
        background-color: #C0392B;
        border-radius: 0px 50px 50px 0px;
        width: 80%;
      }
    </style>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
  </body>
</html>
