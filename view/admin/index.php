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
    <title>Inicio-ADMINISTRADOR</title>
  </head>
  <body>
    <header>
      <?php echo $header; ?>
    </header>

    <main>

      <div class="contenido">
        <center>
      <div class="card">
        <div class="card-image">
          <img src="../../images/icons/personas.png" style="width:95%;">
          <span class="card-title"></span>
          <a class="btn-floating halfway-fab waves-effect waves-light red" href="./personas.php"><i class="material-icons">send</i></a>
        </div>
        <div class="card-content">
          <a href="./personas.php"><p>PERSONAS</p></a>
        </div>
      </div>

      <div class="card">
        <div class="card-image">
          <img src="../../images/icons/catedras.png" style="width:95%; text-align:center;">
          <span class="card-title"></span>
          <a class="btn-floating halfway-fab waves-effect waves-light red" href="./catedras.php"><i class="material-icons">send</i></a>
        </div>
        <div class="card-content">
          <a href="./catedras.php"><p>CATEDRAS</p></a>
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
