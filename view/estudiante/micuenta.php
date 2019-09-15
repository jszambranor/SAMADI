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
$cedula = $objConsultas->get_DatosCorreo(/*$_SESSION['USER']*/'jszambrano@est.itsgg.edu.ec');
$objCatedras = new ModelCatedras();
$catedras = $objCatedras->get_Catedras($cedula['CEDULA']);
$nombres = $objConsultas->get_Datos($cedula['CEDULA']);
$objEstruct = new Estruct();
$header = $objEstruct->get_modals($cedula['CEDULA']);
 ?>

 <!DOCTYPE html>
 <html lang="es-ES" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <link rel="stylesheet" href="../../css/estruct.css">
     <title>MI CUENTA</title>
   </head>
   <body>

     <header>
       <?php echo $header; ?>
     </header>

     <main>
       <div class="row card-panel">
         <div class="title">
           <span>MIS DATOS PERSONALES</span>
         </div>
         <center>
         <form class="col s12" action="index.html" method="post">
           <div id="section.input" class="row">
             <div class="input-field col s6">
               <input id="cedula" name="cedula" type="text" readonly>
               <label for="cedula">CEDULA</label>
             </div>
             <div class="file-field input-field col s6">
               <div class="btn">
                 <span>FOTO</span>
                 <input type="file" multiple>
               </div>
               <div class="file-path-wrapper">
                 <input class="file-path validate" type="text" placeholder="Upload one or more files">
               </div>
             </div>
             <div class="input-field col s6">
               <input id="apellidos" name="apellidos" type="text" required class="validate">
               <label for="apellidos">APELLIDOS</label>
             </div>
             <div class="input-field col s6">
               <input id="nombres" name="nombres" type="text" required class="validate">
               <label for="nombres">NOMBRES</label>
             </div>
             <div class="input-field col s12">
               <input id="correo" name="correo" type="email" readonly>
               <label for="correo">CORREO</label>
             </div>
           </div>
           <button class="btn waves-effect waves-light" type="submit" name="action">ACTUALIDAR DATOS</button>
         </form>
       </center>
       </div>
     </main>

     <style media="screen">
       .input-field input[type=text]{
         border-top: 1px;
         border-color: #02265E;
       }
       .input-field input[type=email]{
         border-top: 1px;
         border-color: #02265E;
       }
       .row{
         width: 80%;
       }
       #section.input{
         max-width: 60%;
       }

     </style>
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <script type="text/javascript" src="../../js/init.js"></script>
   </body>
 </html>
