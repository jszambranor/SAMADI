<?php
session_start();
/*if (!isset($_SESSION['user'])) {
  header('location: ../../');
}else{
  $_SESSION['user'];
  $_SESSION['type_user'];
}*/
require_once '../../conexion/ClassConexion.php';
require_once '../../model/ClassModelConsultas.php';
 ?>

<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Inicio-ADMINISTRADOR</title>
  </head>
  <body>
    <header>
      <nav> <!-- navbar content here  --> </nav>

      <ul id="slide-out" class="sidenav sidenav-fixed">
        <li><div class="user-view">
          <div class="background">
            <img src="images/office.jpg">
          </div>
          <a href="#user"><img class="circle" src="../images/".$data['FOTO'].""></a>
          <a href="#name"><span class="white-text name">$stmt['NOMBRES']." ".$data['APELLIDOS']</span></a>
          <a href="#email"><span class="white-text email">$stmt['CORREO']</span></a>
        </div></li>
        <li><a href="./"><i class="material-icons">home</i>Inicio</a></li>
        <li><a href="#!"><i class="material-icons">logout</i>Cerrar Sesion</a></li>
        <li><div class="divider"></div></li>
        <li><a class="subheader">Opciones</a></li>
        <li><a class="waves-effect" href="#!"><i class="material-icons">assignment_ind</i>Nuevo Alumno</a></li>
      </ul>
      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </header>

    <main>

    </main>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>
