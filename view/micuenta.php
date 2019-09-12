<?php
session_start();
if (!isset($_SESSION['USER'])) {
  echo "NO HAS INICIADO SESION";
}
require_once '../conexion/ClassConexion.php';
require_once '../model/ClassModelConsultas.php';
require_once '../estruct/header.php';
$objConsulta = new ModelConsultas();
$consulta = $objConsulta->get_Datos($_SESSION['USER']);
$sidenav = new Estruct();
$get_Sidenav = $sidenav->get_SideNavEst($_SESSION['USER']);
 ?>

 <!DOCTYPE html>
 <html lang="es-ES" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <link rel="stylesheet" href="../css/admin.css">
     <title>MI CUENTA</title>
   </head>
   <body>

     <header>
       <div class="navbar-fixed">
         <div class="left1">
             <a id="menu" href="#" data-target="slide-out" class="sidenav-trigger left"><i id="icons" class="material-icons">menu</i></a>
           </div>

           <div class="center1">
             <span id="navbar-center">SAM</span>
           </div>

             <div class="right1">
               <a id="navbar-right" href="sass.html"><i id="icons" class="material-icons">account_circle</i></a>
             </div>
           </div>

       <ul id="slide-out" class="sidenav">
         <li><div class="user-view">
           <div class="background">
             <img src="../images/office.jpg" width="100%" height="100%">
           </div>
           <a href="#user"><img class="circle" src="../../images/'.$data['FOTO'].'"></a>
           <br>
           <br>
           <li><div class="divider"></div></li>
           <br>
         </div></li>
         <li><a id="inicio" href="./index.php"><i class="material-icons">home</i>Inicio</a></li>
         <li><a href="../conexion/logout.php"><i class="material-icons">logout</i>Cerrar Sesion</a></li>
         <li><div class="divider"></div></li>
         <li><a class="subheader">Opciones</a></li>
         <li><div class="divider"></div></li>
         <li><a class="subheader">MATERIAS</a></li>
         <li><a class="waves-effect" href="./estudiante/catedra.php"><i class="material-icons">school</i>Ilustrador</a></li>
         <li><a class="waves-effect" href="./estudiante/catedra.php"><i class="material-icons">school</i>Premiere Pro</a></li>
         <li><a class="waves-effect" href="./estudiante/catedra.php"><i class="material-icons">school</i>Administración</a></li>
         <li><div class="divider"></div></li>
       <!--  <li><a class="subheader">Docentes</a></li>
         <li><a class="waves-effect" href="#!"><i class="material-icons">assignment_ind</i>Nuevo Docente</a></li>-->
       </ul>

       <div class="titulo">
         <span>MI CUENTA</span>
       </div>
     </header>

     <main>

     </main>




     <style media="screen">
       .material-icons{
         color : #02265E;
       }
     </style>
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <script type="text/javascript" src="../js/init.js"></script>
   </body>
 </html>
