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
    $estado = $objCLogin->get_cLogin($usuario, $password);
}
 ?>

<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">-->
    <link rel="stylesheet" href="./css/admin.css">
    <title>Inicio-ADMINISTRADOR</title>
  </head>
  <body>
    <header>
      <div class="navbar">
        <div class="left">
            <a href="#"><i id="icons" class="material-icons">menu</i></a>
          </div>

          <div class="center">
            <span >SAMADI</span>
          </div>
      </div>
    </header>

    <main>
      <div class="contenido">
            <div class="img">
              <img src="./images/office.jpg" alt="">
            </div>
            <div class="titulo">
              <span>Iniciar Sesión</span>
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
                          <?php echo "<br><br><div class='estado'>".$estado."</div>"; ?>
                      </div>
              </form>
            </div>
    </main>


    <style media="screen">
    body {
      margin:0;
      padding:0;
      width: 100%;
      display: flex;
      justify-content: center;
    }
    main{
      width: 50%;
      display: flex;
      justify-content: center;
      margin-left: 20%;
      margin-right: 30%;
    }
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
    header{
      margin-top: 0%;
      margin-left: 0%;
      margin-right: 0%;
    }
    .navbar{
      background-color: #02265E;
      width: 100%;
      height: 60px;
      position: absolute;
      margin-top: 0%;
      margin-left: 0%;
      margin-right: 0%;
      margin-bottom: 4%;
      display: inline-flex;
      align-items: center
    }
    .contenido{
      margin-top: 15%;
      width: 60%;
      text-align: center;
      padding-left: 0%;
      padding-right: 0%;
      background-color: white;
      border-radius: 7px 7px 7px 7px;
      border-bottom-style: double;
      border-color: #7D7D77;

    }

    @media only screen and (min-width: 332px) and (max-width : 992px) {
      body{
        display: block;
        justify-content: center;
        margin: 0;
        padding: 0;
        background-color: red;
      }
      .contenido{
        width: 100%;
        margin-top: 25%;
        margin-left: 15%;
      }
      .navbar{
        width: 100%;
        margin-left: 0%;
        margin-top: 0%;
        margin-right: 0%;
      }
      header{
        margin-left: 0%;
      }

      main{
        width: 80%;
        margin-left: 3%;
      }
    }
    form{
      display: inline;
    }
    .img{
      width: 100%;
      margin-bottom: 5%;
    }
    img{
      width: 40%;
      height: 150px
    }
    .input-field{
      width: 100%;
      margin-bottom: 5%;
    }
    input{
      width: 80%;
      background-color: #F2F2F2;
      border-radius: 5px 5px 5px 5px;
      border: 0;
      height: 40px;
    }

    .titulo{
      color: #7D7D77;
      margin-bottom: 3%;
      font-size: 20PX;
    }

    .center{
      font-weight: bold;
      color: white;
      font-size: 2rem;
      width: 30%;
      height: 100%;
      margin-top: 0%;
      margin-right: 5%;
      margin-top: 1.5%;
    }

    .left{
      margin-top: 1.5%;
      float: left;
      color: white;
      font-size: 3rem;
      font-weight: bold;
      margin-top: 0%;
      width: 5%;
      margin-right: 5%;
      height: 100%;
    }

    button{
      background-color: #02265E;
      border: 0;
      width: 80%;
      height: 40px;
      border-radius: 5px 5px 5px 5px;
      color: white;
      font-weight: bold;
      font-size: 1rem;
      margin-bottom: 4%;
    }

    a{
      text-decoration: none;
      font-size: 20px;
      color: #7D7D77;
    }

    .inner-addon {
      position: relative;
      margin-bottom: 3%;
    }
    .inner-addon .material-icons {
      position: absolute;
      padding: 10px;
      pointer-events: none;
    }
    .right-addon .material-icons {
      right: 22px;
    }

    .right-addon input {
      padding-right: 20px;
    }

.material-icons{
    color: #02265E;
}
    </style>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>
