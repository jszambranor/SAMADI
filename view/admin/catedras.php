<?php
session_start();
if (isset($_SESSION['USER'])) {
    if ($_SESSION['TYPE'] != 1) {
        if ($_SESSION['TYPE'] == 2) {
            echo '<meta http-equiv="refresh" content="0; url=../docente/index.php">';
        } elseif ($_SESSION['TYPE'] == 3) {
            echo '<meta http-equiv="refresh" content="0; url=../estudiante/index.php">';
        }
    }
} else {
    echo '<meta http-equiv="refresh" content="0; url=../../login.php">';
}
require_once '../../conexion/ClassConexion.php';
require_once '../../model/ClassModelConsultas.php';
require_once '../../estruct/header.php';
require_once '../../model/ClassModelCatedras.php';
$Consultas = new ModelConsultas();
$nivel= $Consultas->get_NIveles();
$carrera =$Consultas->get_Carreras();
$objCatedras = new ModelCatedras();
$codigo_catedra = $objCatedras->generarCodigo(8);
 ?>

<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../../css/estruct.css">
    <title>Inicio-ADMINISTRADOR</title>
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
          <a href="#modal3" class="waves-effect modal-trigger"><img class="circle" src="../../images/estudiantes/mifoto.png" alt=""></a>
        </div>

      </div>
    </header>

    <main>

      <div class="row">
        <div class="col s12">
          <ul class="tabs tabs-fixed-width">
            <li class="tab col s4"><a class="active" id="indicator" href="#agregar">AGREGAR</a></li>
            <li class="tab col s4"><a id="indicator" href="#actualizar">ACTUALIZAR</a></li>
            <li class="tab col s4"><a id="indicator" href="#listar">LISTAR</a></li>
          </ul>
        </div>
        <div id="agregar" class="col s12">
          <div class="title">
            <span>CATEDRAS</span>
          </div>
        <center>
          <div class="section container">
            <div class="row card-panel">
                <form id="nuevoAlumno" class="col s12" enctype="multipart/form-data" method="POST" action="../../controller/ClassControllerCatedra.php">
                  <div class="row">
                    <div class="input-field col s6">
                    <input readonly  id="codigo_catedra" name="codigo_catedra" type="text" value="<?php echo $codigo_catedra; ?>">
                    <label for="codigo_catedra">CODIGO DE CATEDRA</label>
                  </div>
                    <div class="file-field input-field col s6">
                      <div class="btn">
                        <span>ICONO</span>
                        <input type="file" name="icon" id="icon">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>
                  <div class="input-field col s12">
                    <input id="nombre_catedra" name="nombre_catedra" type="text" class="validate">
                    <label for="nombre_catedra">NOMBRE DE CATEDRA</label>
                  </div>

                  <div class="input-field col s6">
                    <select required="true" class="validate" name="carrera" id="carrera">
                      <option value="" disabled selected>SELECCIONE LA CARRERA</option>
                      <?php echo $carrera;  ?>
                    </select>
                  </div>

                  <div class="input-field col s6">
                    <select required="true" class="validate" name="nivel" id="nivel">
                      <option value="" disabled selected>SELECCIONE EL NIVEL</option>
                      <?php echo $nivel;  ?>
                    </select>
                  </div>

                </div>
                  <button id="Registrar" class="btn" type="submit" name="action">REGISTRAR
                  </button>

                  <div id="result">

                  </div>
              </form>
            </div>
          </div>
          <center>
          </div>

        <div id="actualizar" class="col s12">
          <div class="title">
            <span>CATEDRAS</span>
          </div>
          <center>

        </center>

            </div>

        <div id="listar" class="col s12">
          <div class="title">
            <span>CATEDRAS</span>
          </div>

          <center>

      </center>

    </main>


    <style media="screen">
    #inicio{
      background-color: #D6EAF8;
      border-radius: 0px 50px 50px 0px;
      width: 90%;
    }
    .contenido{
      margin-top: 2%;
      background-color: red;
    }
    .card{
      width: 25%;
      margin-left: 2%;
      display: inline-block;
      float: left;
    }

    .card-content p{
      color:#02265E;
      font-weight: bold;
      width: 100%;
    }

    .center-items{
      margin-top: 1%;
      float: left;
    }

    .btn{
      background-color: #02265E;
      font-weight: bold;
    }
    .btn:hover{
      background-color: #02265E;
    }

    #submit{
      width: 25%;
    }


    </style>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>


  </body>
</html>
