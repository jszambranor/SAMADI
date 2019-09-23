<?php
require_once './conexion/ClassConexion.php';
require_once './model/ClassModelConsultas.php';
require_once './model/ClassModelLogin.php';
require_once './controller/ClassControllerLogin.php';
require_once './estruct/header.php';
if (isset($_SESSION['USER'])) {
    if ($_SESSION['TYPE'] != 1) {
        if ($_SESSION['TYPE'] == 2) {
            echo '<meta http-equiv="refresh" content="0; url=../docente/index.php">';
        } elseif ($_SESSION['TYPE'] == 3) {
            echo '<meta http-equiv="refresh" content="0; url=../estudiante/index.php">';
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $usuario = $_POST['user'];
    $password = md5($_POST['password']);
    $objCLogin = new ControllerLogin();
    $estado = $objCLogin->get_cLogin($usuario, $password);
}
 ?>

<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
    <title>Inicio</title>
  </head>
  <body>
    <header>
      <div class="navbar">

          <div class="center">
            <img src="./images/logo.jpg" alt="">
            <span >SAM</span>
          </div>
      </div>
    </header>

    <main>
      <div class="contenido">
            <div class="img">
              <img src="./images/office.jpg" alt="">
            </div>
            <div class="titulo">
              <span>INICIAR SESIÓN</span>
            </div>
            <div class="form">
              <form class="col s12" method="POST" action="./login.php">
                      <div class="inner-addon right-addon">
                        <i class="material-icons">account_circle</i>
                          <input placeholder="     USUARIO" required="true"  id="user" name="user" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)">
                      </div>
                      <div class="inner-addon right-addon">
                          <i class="material-icons">vpn_key</i>
                          <input placeholder="     CONTRASEÑA" required="true" id="password" name="password" type="password" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">

                      </div>

                          <button class="button" type="submit" name="action" id="btn">ENTRAR</button>
                          <br>
                          <a href="#">Olvidé mi Contraseña...</a>
                          <?php if (isset($estado)) {
                          echo "<br><br><div class='estado'>".$estado."</div>";
                          } ?>
                      </div>
              </form>
            </div>
    </main>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>
