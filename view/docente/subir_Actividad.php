<?php
session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../../css/estruct.css">
    <meta charset="utf-8">
  </head>
  <body>
    <form class="" action="../../controller/ClassControllerActividades.php" method="post" enctype="multipart/form-data">
      <label for="">nombre</label> <input type="text" name="nombre" value=""><br>
      <label for="">index</label> <input type="file" name="index" value=""><br>
      <label for="">imagenes</label> <input type="file" name="media[]" value="" multiple="multiple"><br>
      <label for="">js</label> <input type="file" name="js[]" value="" multiple="multiple"><br>
      <label for="">css</label> <input type="file" name="css[]" value="" multiple="multiple"><br>
      <input type="submit" name="" value="enviar">
    </form>

    <div class="section container">
    <div class="row card-panel">
   <form class="col s12" action="../../controller/ClassControllerActividades.php" method="post" enctype="multipart/form-data" method="POST">
     <div class="row">
       <div class="input-field col s12">
         <input  type="text" name="nombre" id="nombre" class="validate">
         <label for="nombre">NOMBRE DE LA ACTIVIDAD</label>
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

     <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <script type="text/javascript" src="../../js/init.js"></script>
  </body>
</html>
