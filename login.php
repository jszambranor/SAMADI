<?php
require_once './conexion/ClassConexion.php';
require_once './model/ClassModelConsultas.php';
require_once './model/ClassModelLogin.php';
require_once './controller/ClassControllerLogin.php';
require_once './estruct/header.php';
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
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $usuario = $_POST['user'];
  $password = md5($_POST['password']);
  $objCLogin = new ControllerLogin();
  $estado = $objCLogin->get_cLogin($usuario,$password);
}
 ?>

<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="./css/admin.css">
    <title>Inicio-ADMINISTRADOR</title>
  </head>
  <body>
    <header>
      <?php echo $get_Sidenav;  ?>
    </header>

    <main>
      <center>
      <div class="section container">
          <div id="row1" class="row">
            <div class="header">
              <div class="tittle-login">
                <span>INICIO DE SESION</span>
              </div>
            </div>
              <form class="col s12" method="POST" action="./login.php">
                  <div class="row card-panel">
                      <div class="input-field col s12">
                          <input required="true"  id="user" name="user" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)">
                          <label id="select-input" for="user">USUARIO * </label>
                      </div>
                      <div class="input-field col s12">
                          <input required="true" id="password" name="password" type="password" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
                          <label id="select-input" for="password">CONTRASEÑA *</label>
                      </div>

                    <center>
                      <div class="input-field col s12">
                          <button class="btn waves-effect waves-light" type="submit" name="action" id="btn">INICIAR SESION
                              <i class="material-icons left">send</i>
                          </button>
                          <br>
                          <?php echo "<br><br><div class='estado'>".$estado."</div>"; ?>
                      </div>
                    </center>
                  </div>
              </form>
          </div>
        </div>
      </center>
    </main>


    <style media="screen">
    #inicio{
      background-color: #D6EAF8;
      border-radius: 0px 50px 50px 0px;
      width: 90%;
    }
    .estado{
      width: 100%;
      color :white;
      font-weight: bold;
      font-size: 1rem;
      background-color: red;
      border-radius: 15px 15px 15px 15px;
      margin-top: 5%;
    }
    </style>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>
