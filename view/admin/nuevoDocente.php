<?php
session_start();
require_once '../../conexion/ClassConexion.php';
require_once '../../model/ClassModelConsultas.php';
require_once '../../estruct/header.php';
require_once '../../controller/ClassControllerDocentes.php';
require_once '../../model/ClassModelInsertPersonas.php';
$cedula = '0992181293';
$sidenav = new Estruct();
$get_Sidenav = $sidenav->get_SideNavAdmin($cedula);
$Consultas = new ModelConsultas();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Cedula = $_POST['cedula'];
  $Nombres = $_POST['nombres'];
  $Apellidos = $_POST['apellidos'];
  $Correo = $_POST['mail'];
  $objControllerPersona = new ControllerDocentes();
  $mensaje = $objControllerPersona->insert_Docente($Cedula,$Apellidos,$Nombres,$Correo);
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
    <title>REGISTRO DE NUEVO DOCENTE</title>
  </head>
  <body>
    <header>
      <?php echo $get_Sidenav;  ?>
    </header>
    <center>
      <?php echo "<br><br><div class='estado'>".$mensaje."</div>"; ?>
    </center>

    <main>
        <div class="section container">
            <div class="row">
              <div class="header">
                <div class="tittle">
                  <span>REGISTRO DE NUEVO DOCENTE</span>
                </div>
              </div>
                <form class="col s12" method="POST" action="./nuevoDocente.php">
                    <div class="row card-panel">
                        <div class="input-field col s12">
                            <input required="true" minlength="10"  maxlength="13"  id="cedula" name="cedula" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)">
                            <label id="select-input" for="cedula">CEDULA * </label>
                        </div>
                        <div class="input-field col s6">
                            <input required="true" minlength="10"  maxlength="50" id="apellidos" name="apellidos" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
                            <label id="select-input" for="apellidos">APELLIDOS *</label>
                        </div>
                        <div class="input-field col s6">
                            <input required="true" minlength="10"  maxlength="50" id="nombres" name="nombres" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
                            <label id="select-input" for="nombres">NOMBRES *</label>
                        </div>
                        <div class="input-field col s12">
                            <input required="true" minlength="10"  maxlength="50" id="mail" name="mail" type="text" class="validate" onkeyup="Minus(this);" onkeypress="return soloMail(event)">
                            <label id="select-input" for="mail">CORREO ELECTRÓNICO *</label>
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
    <script type="text/javascript" src="../../js/inputs.js"></script>
    <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
      });
    </script>
  </body>
</html>
