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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $codigo_clase = $_POST['codigo_catedra'];
  $newClase = $objCatedras->set_NewClase($cedula['CEDULA'],$codigo_clase);
}
 ?>

<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>INICIO - ESTUDIANTE</title>
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
          <img class="circle" src="../../images/estudiantes/mifoto.png" alt="">
        </div>
      </div>
    </header>

    <main>
      <center>
      <div class="contenido">
        <div class="title">
          <span>MATERIAS</span>
        </div>
        <div class="mensaje">
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          echo $newClase;
          echo '<meta http-equiv="refresh" content="2; url=./index.php">';
        }  ?>
        </div>
        <div class="materias">
          <?php echo $catedras; ?>
        </div>
      </div>
    </center>

    </main>

    <div id="modal1" class="modal">
      <ul class="slide-out">
        <li><a class="li" id="temas" href="#">TEMAS</a></li>
        <li><a class="li" id="actividades" href="#">ACTIVIDADES</a></li>
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

    <style media="screen">
    .navbar {
      background-color: #02265E;
      width: 100%;
      height: 70px;
      margin-top: 0%;
      color: #FFFFFF;
      font-size: 2rem;
      text-align: center;
    }

    main{
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .title{
      width: 100%;
      background-color: #02265E;
      font-weight: bold;
      font-size: 2rem;
      text-align: center;
      color: #FFFFFF;
    }

    .contenido{
      width: 80%;
      margin-top: 5%;

    }
    .catedras{
      width: 20%;
      display: inline-block;
      background-color: #FFFFFF;
      text-align: center;
      font-weight: bold;
      font-size: 1rem;
      border-top: 2px solid #02265E;
      border-right: 2px solid #02265E;
      border-bottom: 2px solid #02265E;
      border-left: 2px solid #02265E;
      margin-top: 2%;
      margin-bottom: 1%;
      margin-left: 2%;
    }
    .nombre,.nombre a{
      background-color: #02265E;
      color: #FFFFFF;
    }

    .img{
      width: 100%;
      text-align: center;
    }

    .contenido .catedras .img img{
      max-width: 90%;
      text-align: center;
      margin-left: 2%;
    }
    .right-items{
      float: right;
      margin-top: 1%;
    }

    .right-items i{
      color: #FFFFFF;
      font-size: 3rem;
    }

    #avatar img{
      border-top: 1px solid white;
      border-right: 1px solid white;
      border-bottom: 1px solid white;
      border-left: 1px solid white;
      max-width: 50px;
    }

    .left-items{
      float: left;
      margin-top: 1%;
    }

    .center-item{
      font-weight: bold;
      margin-top: 2%;
    }

    #menu i{
      color: #FFFFFF;
      font-size: 3rem;
    }

    #logo{
      display: inline-block;
      color: #FFF;
      font-weight: bold;
    }

    #modal1{
      width: 15%;
      padding: 0;
      margin: 0;
      text-align: left;
      border-top: 4px solid #02265E;
      border-right: 4px solid #02265E;
      border-bottom: 4px solid #02265E;
      border-left: 4px solid #02265E;
      border-radius: 5%;
      height: 190px;
      margin-left: 1%;
    }

    #modal2{
      width: 40%;
      text-align: left;
      border-top: 4px solid #02265E;
      border-right: 4px solid #02265E;
      border-bottom: 4px solid #02265E;
      border-left: 4px solid #02265E;
      height: 190px;
    }

    .registro_clase{
      text-align: center;
      margin-top: 5%;
      font-weight: bold;
    }

    #cod_clase {
      width: 70%;
    }

    #registro{
      background-color: #02265E;
    }


    .modal .slide-out li{
      border:1px;
      width: 100%;
      margin-top: 4%;
      padding-top: 0%;
      border-bottom: 1px solid #B2BABB;
    }

     .modal .slide-out li a {
      padding-left: 6%;
      color: #02265E;
      font-weight: bold;
    }

    .mensaje{
      background-color: red;
      max-width: 40%;
      color: #FFFFFF;
      font-weight: bold;
      margin-top: 3%;
      text-align: center;
    }


    </style>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
  </body>
</html>
