<?php
session_start();
require_once '../../conexion/ClassConexion.php';
require_once '../../model/ClassModelConsultas.php';
require_once '../../estruct/header.php';
$sidenav = new Estruct();
$get_Sidenav = $sidenav->get_SideNavEst($cedula);

 ?>

<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <title>INICIO - ESTUDIANTE</title>
  </head>
  <body>

    <header>
      <?php echo $get_Sidenav; ?>
      <div class="img">
        <img style="width :100%; height:400px;" src="../../images/img4.jpg" alt="">
      </div>
    </header>

    <main>

      <div class="materias">
        <div class="catedras">
          <a href="./materias.php?cod="><img src="../../images/img1.jpg"</a>
        </div>
        <div class="catedras">
          <a href="./materias.php?cod="><img src="../../images/img2.jpg"</a>
        </div>
        <div class="catedras">
          <a href="./materias.php?cod="><img src="../../images/img3.jpg"</a>
        </div>
      </div>

    </main>



    <style media="screen">
      .materias{
        width: 70%;
      }
      img{
        width: 100%;
      }
      .catedras{
        width: 20%;
        margin-left: 4%;
        display: inline-block;
      }
    </style>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
  </body>
</html>
