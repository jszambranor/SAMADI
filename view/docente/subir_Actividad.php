<?php
session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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

  </body>
</html>
