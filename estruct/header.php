<?php
/**
 *
 */
class Estruct
{

  function __construct()
  {

  }

  private function modals($arg_Cedula){
    try {
      $objConexion = new Conexion;
      $conexion = $objConexion->get_Conexion();
    } catch (PDOException $e) {
       echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().")</script>";
       die();
     }
    $query = "SELECT NOMBRES,APELLIDOS FROM SAMADI.PERSONAS WHERE CEDULA = :_CEDULA";
    $stmt=$conexion->prepare($query);
    $stmt->bindParam(':_CEDULA',$arg_Cedula,PDO::PARAM_STR);
    $stmt->execute();
    $nombres = $stmt->fetch();
    $modals = '

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

    <div id="modal1" class="modal">
      <ul class="slide-out">
        <li><a class="li" id="temas" href="./index.php">INICIO</a></li>
        <li><a class="li" id="actividadesli" href="./actividades.php">ACTIVIDADES</a></li>
        <li><a class="li" id="guia" href="./materialapoyo.php">MATERIAL DE APOYO</a></li>
        <li><a class="li" id="bibliografia" href="./bibliografias.php">BIBLIOGRAFÍAS</a></li>
      </ul>

      </div>

      <div id="modal2" class="modal">
        <form class="registro_clase" action="index.php" method="post">
          <label for="codigo_catedra">INGRESA EL CODIGO DE LA CLASE</label>
          <input id="cod_clase"  type="text" name="codigo_catedra" value=""><br>
          <button id="registro" class="btn" type="submit" name="button">REGISTRAR</button>
        </form>
        </div>

        <div id="modal3" class="modal">
          <div class="nombres">
            <span id="nombre">BIENVENIDO</span><br>
            <span id="nombre"><?php echo $nombres["NOMBRES"]; ?></span>
            <span id="nombre"><?php echo $nombres["APELLIDOS"]; ?></span>
          </div>
          <div class="link">
            <a href="../micuenta.php?cedula="><i class="material-icons">account_circle</i> MI CUENTA</a><br>
            <a href="../../conexion/logout.php"><i class="material-icons">logout</i> CERRAR SESIÓN</a>
          </div>
          </div>

    ';
    return $modals;
  }



  public function get_modals($arg_Cedula){
    return $this->modals($arg_Cedula);
  }


}
