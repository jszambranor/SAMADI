<?php
session_start();
require_once '../../conexion/ClassConexion.php';
require_once '../../model/ClassModelConsultas.php';
require_once '../../estruct/header.php';
/*if (!isset($_SESSION['user'])) {
  header('location: ../../');
}else{
  $_SESSION['user'];
  $_SESSION['type_user'];
  $sidenav = new Estruct();
  $get_Sidenav = $sidenav->get_SideNavAdmin($_SESSION['user']);
}*/
$cedula = '0992181293';
$sidenav = new Estruct();
$get_Sidenav = $sidenav->get_SideNavAdmin($cedula);
 ?>

<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <title>Inicio-ADMINISTRADOR</title>
  </head>
  <body>
    <header>
      <?php echo $get_Sidenav;  ?>
    </header>

    <main>

      <div class="contenido">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../../images/icons/agregar-usuario.png" height="150px">
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4"><a id="link" href="./nuevoAlumno.php">AGREGAR NUEVO ALUMNO</a><i class="material-icons right">more_vert</i></span>
            <p></p>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">AGREGAR NUEVO ALUMNO<i class="material-icons right">close</i></span>
            <p>ESTA OPCION TE PERMITE AGREGAR UN NUEVO ALUMNO A SAMADI</p>
          </div>
        </div>

        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../../images/icons/agregar-usuario.png" height="150px">
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4"><a id="link" href="./nuevoAlumno.php">AGREGAR NUEVO ALUMNO</a><i class="material-icons right">more_vert</i></span>
            <p></p>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">AGREGAR NUEVO ALUMNO<i class="material-icons right">close</i></span>
            <p>ESTA OPCION TE PERMITE AGREGAR UN NUEVO ALUMNO A SAMADI</p>
          </div>
        </div>

        </div>

    </main>


    <style media="screen">
    #inicio{
      background-color: #D6EAF8;
      border-radius: 0px 50px 50px 0px;
      width: 90%;
    }

    </style>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
  </body>
</html>
