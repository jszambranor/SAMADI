<?php
require_once '../conexion/ClassConexion.php';
require_once '../model/ClassModelActividades.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          echo  $codigo_actividad = $_POST['cod_actividad'];echo "<br>";
          echo  $codigo_catedra = $_POST['cod_catedra'];echo "<br>";
          echo  $nombre = $_POST['nombre'];echo "<br>";
          echo  $descripcion = $_POST['descripcion'];echo "<br>";
          echo  $ruta = "actividades/".$nombre."/".$nombre."."."htm";echo "<br>";

        /*    $images_array = array('image/jpg','image/pjpeg','image/bmp','image/jpeg','image/gif','image/png');
            $js_array = array('application/x-javascript', 'application/javascript', 'application/ecmascript','text/javascript','text/ecmascript');
            $css_array = array('application/x-pointplus','text/css');
            $html_array = array('text/html');

            $ruta_html = '../actividades/'.$nombre.'/';
            $ruta_resources = '../actividades/'.$nombre.'/'.$nombre.'_resources';
            $ruta_images = '../actividades/'.$nombre.'/'.$nombre.'_resources/media/';
            $ruta_js = '../actividades/'.$nombre.'/'.$nombre.'_resources/js/';
            $ruta_css = '../actividades/'.$nombre.'/'.$nombre.'_resources/css/';

            mkdir($ruta_html, 0777, true);
            mkdir($ruta_resources,0777,true);
            mkdir($ruta_images, 0777, true);
            mkdir($ruta_js, 0777, true);
            mkdir($ruta_css, 0777, true);

            //UPLOAD ARCHIVO INDEX.HTML DE LA ACTIVIDAD
            if (in_array($_FILES['index']['type'],$html_array)) {
              $index_file = $_FILES['index']['tmp_name'];
              $ruta_final = $ruta_html.'/'.$_FILES['index']['name'];
            if(move_uploaded_file($_FILES['index']['tmp_name'],$ruta_final)){
              echo "exito"."<br>";
            }else{
              echo "error"."<br>";
            }
            }

            for ($i=0;$i<count($_FILES["media"]["name"]);$i++) {
                if (in_array($_FILES['media']['type'][$i],$images_array)) {
                  $media_file = $_FILES['media']['tmp_name'][$i];
                  $ruta_final = $ruta_images.'/'.$_FILES['media']['name'][$i];
                  if(move_uploaded_file($media_file,$ruta_final)){
                    echo "exito media".$_FILES['media']['name'][$i]."<br>";
                }else{
                  echo "error media".$_FILES['media']['name'][$i]."<br>";
              }
            }
          }

              for ($i=0;$i<count($_FILES["js"]["name"]);$i++) {
                  if (in_array($_FILES['js']['type'][$i],$js_array)) {
                    $js_file = $_FILES['js']['tmp_name'][$i];
                    $ruta_final = $ruta_js.'/'.$_FILES['js']['name'][$i];
                    if(move_uploaded_file($js_file,$ruta_final)){
                      echo "exito js".$_FILES['js']['name'][$i]."<br>";
                  }else{
                    echo "error js".$_FILES['media']['name'][$i]."<br>";
                }
              }
            }

                for ($i=0;$i<count($_FILES["css"]["name"]);$i++) {
                    if (in_array($_FILES['css']['type'][$i],$css_array)){
                      $css_file = $_FILES['css']['tmp_name'][$i];
                      $ruta_final = $ruta_css.'/'.$_FILES['css']['name'][$i];
                      if(move_uploaded_file($css_file,$ruta_final)){
                        echo "exito css".$_FILES['css']['name'][$i]."<br>";
                    } else{
                      echo "error css".$_FILES['css']['name'][$i]."<br>";
                  }
                }
              }
              */
                $objModelActividad = new ModelActividades();
                echo $subir_actividad = $objModelActividad->set_Actividad($codigo_actividad, $codigo_catedra, $nombre, $descripcion, $ruta);
            }
