<?php
session_start();
/*if (isset($_SESSION['USER'])) {
  if ($_SESSION['TYPE'] != 1) {
    if ($_SESSION['TYPE'] == 2) {
      echo '<meta http-equiv="refresh" content="0; url=../docente/index.php">';
    }elseif ($_SESSION['TYPE'] == 3) {
    echo '<meta http-equiv="refresh" content="0; url=../estudiante/index.php">';
    }
  }
}else{
  echo '<meta http-equiv="refresh" content="0; url=http://34.238.220.3/login.php">';
}*/
require_once '../../conexion/ClassConexion.php';
require_once '../../model/ClassModelConsultas.php';
require_once '../../estruct/header.php';
require_once '../../controller/ClassControllerAlumnos.php';
require_once '../../model/ClassModelInsertPersonas.php';

/*if (!isset($_SESSION['user'])) {
  header('location: ../../');
}else{
  $_SESSION['user'];
  $_SESSION['type_user'];
  $sidenav = new Estruct();
  $get_Sidenav = $sidenav->get_SideNavAdmin($_SESSION['user']);
}*/

$sidenav = new Estruct();
$get_Sidenav = $sidenav->get_SideNavAdmin($_SESSION['USER']);
$Consultas = new ModelConsultas();
$jornada = $Consultas->get_Jornadas();
$nivel= $Consultas->get_NIveles();
$paralelo = $Consultas->get_Paralelos();
$carrera =$Consultas->get_Carreras();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Cedula = $_POST['cedula'];
  $Nombres = $_POST['nombres'];
  $Apellidos = $_POST['apellidos'];
  $Correo = $_POST['mail'];
  $CodCarrera = $_POST['carrera'];
  $CodJornada = $_POST['jornada'];
  $CodNivel = $_POST['nivel'];
  $CodParalelo = $_POST['paralelo'];
  $Discapacidad = $_POST['discapacidad'];
  $Porcentaje = $_POST['porcentaje'];
  $objControllerPersona = new ControllerAlumnos();
  $mensaje = $objControllerPersona->insert_Alumno($Cedula,$Apellidos,$Nombres,$Correo,$CodCarrera,$CodNivel,$CodParalelo,$CodJornada,$Discapacidad,$Porcentaje);
  //echo $mensaje;
}else {
  //echo "METODO DE ENVIO NO VALIDO";
  //die();
}
 ?>

<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <title>REGISTRO DE NUEVO ALUMNO</title>
  </head>
  <body>
    <header>
      <?php echo $get_Sidenav;  ?>
    </header>
    <center>
      <?php echo "<br><br><div class='estado'>".$mensaje."</div>"; ?>
    </center>
    <main>


      </div>
        <div class="section container">
            <div class="row">
              <div class="header">
                <div class="tittle">
                  <span>REGISTRO DE NUEVA CATEDRA</span>
                </div>
              </div>
                <form class="col s12" method="POST" action="./nuevoAlumno.php">
                    <div class="row card-panel">
                        <div class="input-field col s12">
                            <input required="true"  id="cedula" name="cedula" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)">
                            <label id="select-input" for="cedula">CEDULA * </label>
                        </div>
                        <div class="input-field col s6">
                            <input required="true" id="apellidos" name="apellidos" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
                            <label id="select-input" for="apellidos">APELLIDOS *</label>
                        </div>
                        <div class="input-field col s6">
                            <input required="true" id="nombres" name="nombres" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
                            <label id="select-input" for="nombres">NOMBRES *</label>
                        </div>
                        <div class="input-field col s12">
                            <input required="true" id="mail" name="mail" type="text" class="validate" onkeypress="return soloMail(event)">
                            <label id="select-input" for="mail">CORREO ELECTRÓNICO *</label>
                        </div>

                        <div class="input-field col s6">
                            <input required="true" id="discapacidad" name="discapacidad" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
                            <label id="select-input" for="discapacidad">TIPO DE DISCAPACIDAD *</label>
                        </div>

                        <div class="input-field col s6">
                            <input required="true" id="porcentaje" name="porcentaje" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
                            <label id="select-input" for="porcentaje">PORCENTAJE DE DISCAPACIDAD *</label>
                        </div>

                        <div class="input-field col s6">
                          <select required="true" class="validate" name="carrera">
                            <option value="" disabled selected>SELECCIONE LA CARRERA</option>
                            <?php echo $carrera;  ?>
                          </select>
                        </div>

                        <div class="input-field col s6">
                          <select required="true" class="validate" name="jornada">
                            <option value="" disabled selected>SELECCIONE LA JORNADA</option>
                            <?php echo $jornada;  ?>
                          </select>
                        </div>

                        <div class="input-field col s6">
                          <select required="true" class="validate" name="nivel">
                            <option value="" disabled selected>SELECCIONE EL NIVEL</option>
                            <?php echo $nivel;  ?>
                          </select>
                        </div>

                        <div class="input-field col s6">
                          <select required="true" class="validate" name="paralelo">
                            <option value="" disabled selected>SELECCIONE EL PARALELO</option>
                            <?php echo $paralelo;  ?>
                          </select>
                        </div>

                      <center>
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light" type="submit" name="action" id="btn">REGISTRAR
                                <i class="material-icons left">send</i>
                            </button>
                        </div>
                      </center>

                    </div>
                </form>
            </div>


    </main>


    <style media="screen">
    #inicio{
      background-color: #D6EAF8;
      border-radius: 0px 50px 50px 0px;
      width: 90%;
    }

    .estado{
      width: 20%;
      color :white;
      font-weight: bold;
      font-size: 1rem;
      background-color: red;
      border-radius: 15px 15px 15px 15px;
      margin-top: 0%;
      text-align: center;
    }

    </style>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
    <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
      });
    </script>
  </body>
</html>
