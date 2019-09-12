<?php
/**
 *
 */
class Estruct
{

  function __construct()
  {

  }

  private function sideNavAdmin($arg_Cedula){
    try {
      $objConexion = new Conexion;
      $conexion = $objConexion->get_Conexion();
    } catch (PDOException $e) {
       echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().")</script>";
       die();
     }
    $query = "SELECT NOMBRES,APELLIDOS,CORREO,FOTO FROM SAMADI.PERSONAS WHERE CEDULA = :_CEDULA";
    $stmt=$conexion->prepare($query);
    $stmt->bindParam(':_CEDULA',$arg_Cedula,PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch();
    $sidenav = '
    <div class="navbar-fixed">
      <div class="left1">
          <a id="menu" href="#" data-target="slide-out" class="sidenav-trigger left"><i id="icons" class="material-icons">menu</i></a>
        </div>

        <div class="center1">
          <span id="navbar-center">SAMADI</span>
        </div>

          <div class="right1">
            <a id="navbar-right" href="sass.html"><i id="icons" class="material-icons">account_circle</i></a>
          </div>
        </div>

    <ul id="slide-out" class="sidenav">
      <li><div class="user-view">
        <div class="background">
          <img src="../../images/office.jpg" width="100%" height="100%">
        </div>
        <a href="#user"><img class="circle" src="../../images/'.$data['FOTO'].'"></a>
        <br>
        <br>
        <li><div class="divider"></div></li>
        <br>
      </div></li>
      <li><a id="inicio" href="./"><i class="material-icons">home</i>Inicio</a></li>
      <li><a href="../../conexion/logout.php"><i class="material-icons">logout</i>Cerrar Sesion</a></li>
      <li><div class="divider"></div></li>
      <li><a class="subheader">Opciones</a></li>
      <li><div class="divider"></div></li>
      <li><a class="subheader">Alumnos</a></li>
      <li><a class="waves-effect" href="./nuevoAlumno.php"><i class="material-icons">assignment_ind</i>Nuevo Alumno</a></li>
      <li><a class="waves-effect" href="./nuevoDocente.php"><i class="material-icons">assignment_ind</i>Nuevo Docente</a></li>
      <li><a class="waves-effect" href="./nuevoAdministrador.php"><i class="material-icons">assignment_ind</i>Nuevo Administrador</a></li>
      <li><div class="divider"></div></li>
    <!--  <li><a class="subheader">Docentes</a></li>
      <li><a class="waves-effect" href="#!"><i class="material-icons">assignment_ind</i>Nuevo Docente</a></li>-->
    </ul>';
    return $sidenav;
  }

  private function sideNavEstudent($arg_Cedula){
    try {
      $objConexion = new Conexion;
      $conexion = $objConexion->get_Conexion();
    } catch (PDOException $e) {
       echo "<script>alert('NO SE PUEDE CREAR LA CONEXION A LA BASE DE DATOS'".$e->getMessage().")</script>";
       die();
     }
    $query = "SELECT NOMBRES,APELLIDOS,CORREO,FOTO FROM SAMADI.PERSONAS WHERE CEDULA = :_CEDULA";
    $stmt=$conexion->prepare($query);
    $stmt->bindParam(':_CEDULA',$arg_Cedula,PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch();
    $sidenav = '
    <div class="navbar-fixed">
      <div class="left1">
          <a id="menu" href="#" data-target="slide-out" class="sidenav-trigger left"><i id="icons" class="material-icons">menu</i></a>
        </div>

        <div class="center1">
          <span id="navbar-center">SAMADI</span>
        </div>

          <div class="right1">
            <a id="navbar-right" href="sass.html"><i id="icons" class="material-icons">account_circle</i></a>
          </div>
        </div>

    <ul id="slide-out" class="sidenav">
      <li><div class="user-view">
        <div class="background">
          <img src="../../images/office.jpg" width="100%" height="100%">
        </div>
        <a href="#user"><img class="circle" src="../../images/'.$data['FOTO'].'"></a>
        <br>
        <br>
        <li><div class="divider"></div></li>
        <br>
      </div></li>
      <li><a id="inicio" href="./index.php"><i class="material-icons">home</i>Inicio</a></li>
      <li><a href="../../conexion/logout.php"><i class="material-icons">logout</i>Cerrar Sesion</a></li>
      <li><div class="divider"></div></li>
      <li><a class="subheader">Opciones</a></li>
      <li><div class="divider"></div></li>
      <li><a class="subheader">MATERIAS</a></li>
      <li><a class="waves-effect" href="./nuevoAlumno.php"><i class="material-icons">assignment_ind</i>Ilustrador</a></li>
      <li><a class="waves-effect" href="./nuevoDocente.php"><i class="material-icons">assignment_ind</i>Premiere Pro</a></li>
      <li><a class="waves-effect" href="./nuevoAdministrador.php"><i class="material-icons">assignment_ind</i>Administración</a></li>
      <li><div class="divider"></div></li>
    <!--  <li><a class="subheader">Docentes</a></li>
      <li><a class="waves-effect" href="#!"><i class="material-icons">assignment_ind</i>Nuevo Docente</a></li>-->
    </ul>';
    return $sidenav;
  }

  public function get_SideNavAdmin($arg_Cedula){
    return $this->sideNavAdmin($arg_Cedula);
  }

  public function get_SideNavEst($arg_Cedula){
    return $this->sideNavEStudent($arg_Cedula);
  }
}
