<?php
require_once '../conexion/ClassConexion.php';
require_once '../model/ClassModelCatedras.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = $_POST['codigo_catedra'];echo "<br>";
    $nombre = $_POST['nombre_catedra'];echo "<br>";
    $codigo_carrera = $_POST['carrera'];echo "<br>";
    $codigo_nivel = $_POST['nivel'];echo "<br>";
    $icon = $_POST['icon'];echo "<br>";

      try {
        // CARGA DE FOTO AL SERVIDOR
        $formatos = array('image/jpg','image/pjpeg','image/bmp','image/jpeg','image/gif','image/png');
        if (in_array($_FILES["icon"]["type"], $formatos)) {
          $icon = $codigo.".".str_replace("image/", "", $_FILES['icon']["type"]);
          $x_ruta = "../images/catedras/".$icon;
          move_uploaded_file($_FILES['icon']['tmp_name'], $x_ruta);
          echo $icon;
        }
        echo $icon;
      } catch (PDOException $e) {
        echo "<script> alert('ERROR AL SUBIR LAS FOTOS -> '".$e->getMessage().");</script>";
        die();
      }

      $objCatedras = new ModelCatedras();
      $set_Catedra = $objCatedras->set_NewCatedra($codigo,$nombre,$codigo_carrera,$codigo_nivel,$icon);
      if ($set_Catedra == 1) {
        echo "SE REGISTRO CON EXITO";
        echo '<meta http-equiv="refresh" content="5; url=../view/admin/catedras.php#agregar">';
      }elseif ($set_Catedra == 2) {
        echo "ALGO SALIO MAL INTENTA NUEVAMENTE";
        echo '<meta http-equiv="refresh" content="5; url=../view/admin/catedras.php#agregar">';
      }elseif ($set_Catedra == 0) {
        echo "NO SE REGISTRO LA CATEDRA";
        echo '<meta http-equiv="refresh" content="5; url=../view/admin/catedras.php#agregar">';
      }
    }


 ?>
