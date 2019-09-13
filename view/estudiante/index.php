<?php
session_start();
require_once '../../conexion/ClassConexion.php';
require_once '../../model/ClassModelConsultas.php';
require_once '../../estruct/header.php';
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
          <img class="circle" src="../../images/estudiantes/mifoto.png" alt="">
        </div>
      </div>
    </header>

    <main>
      <div class="contenido">
        <div class="title">
          <span>MATERIAS</span>
        </div>
        <div class="materias">

        </div>
      </div>

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

    .contenido{
      width: 80%;
    }
    .right-items{
      float: right;
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
    }

    .center-item{
      font-weight: bold;
    }

    #menu i{
      color: #FFFFFF;
      font-size: 3rem;
    }

    #logo{
      display: inline-block;
    }

    .modal{
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


    </style>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
  </body>
</html>
