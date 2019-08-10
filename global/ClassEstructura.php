<?php

class Estructura {

    public function get_NavbarEstudiante() {
        $navbarE = '
		<div class="navbar-fixed">
    			<nav class="blue">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">&nbsp;&nbsp;Logo</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php"><i class="material-icons left">home</i>Inicio</a></li>
        <li><a href="mis_clases.php"><i class="material-icons left">school</i>Mis Clases</a></li>
        <li><a href="favoritos.php"><i class="material-icons left">star</i>Favoritos</a></li>
        <li><a href="perfil.php"><i class="material-icons left">person</i>Perfil</a></li>
      </ul>
    </div>
  </nav>
</div>
  <ul class="sidenav" id="mobile-demo">
    <li><a href="index.php"><i class="material-icons left">home</i>Inicio</a></li>
        <li><a href="mis_clases.php"><i class="material-icons left">school</i>Mis Clases</a></li>
        <li><a href="favoritos.php"><i class="material-icons left">star</i>Favoritos</a></li>
        <li><a href="perfil.php"><i class="material-icons left">person</i>Perfil</a></li>
  </ul>
    		';
        return ($navbarE);
    }

    public function get_NavbarPublic() {
        $navbarp = '
		 		<div class="navbar-fixed">
    			
    			<nav class="">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">SAMADI</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php"><i class="material-icons left">home</i>Inicio</a></li>
        <li><a href="quienes_somos.php"><i class="material-icons left">account_balance</i>Que es Samadi</a></li>
        <li><a href="trabajo.php"><i class="material-icons left">school</i>Trabajo con los Alumnos</a></li>
        <li><a href="login.php"><i class="material-icons left">person</i>Iniciar Sesion</a></li>
      </ul>
    </div>
  </nav>
    		</div>
    		

  <ul class="sidenav" id="mobile-demo">
        <li><a href="index.php"><i class="material-icons left">home</i>Inicio</a></li>
        <li><a href="quienes_somos.php"><i class="material-icons left">account_balance</i>Que es Samadi</a></li>
        <li><a href="trabajo.php"><i class="material-icons left">school</i>Trabajo con los Alumnos</a></li>
        <li><a href="login.php"><i class="material-icons left">person</i>Iniciar Sesion</a></li>
  </ul>';
        return ($navbarp);
    }

    public function get_NavBarAdmin() {

        $navbar = '
    <ul id="slide-out" class="sidenav sidenav-fixed">
    <li><div class="user-view">
      <div id="titulo" class="background">
       SAMADI
      </div>
      <!--<a href="#user"><img class="circle" src="images/yuna.jpg"></a>-->
      <a href="#name"><span class="white-text name"></span></a>
      <a href="#email"><span class="white-text email"></span></a>
    </div></li>
    <li><a id="font" href="./index.php"><i id="texto-icono" class="material-icons">home</i>Inicio</a></li>
    <li><a id="font" href="../../global/Logout.php"><i id="texto-icono" class="material-icons">logout</i>Cerrar Sesion</a></li>
    <li><div class="divider"></div></li>
    <li><a id="font" class="subheader">CATEDRAS</a></li>
    <li><a id="font" class="waves-effect" href="crear_clase.php"><i id="texto-icono" class="material-icons">add</i>Agregar Catedra</a></li>
    <li><a id="font" class="waves-effect" href="actualizar_clase.php"><i id="texto-icono" class="material-icons">update</i>Actualizar Catedra</a></li>
    <li><a id="font" class="waves-effect" href="eliminar_clase.php"><i id="texto-icono" class="material-icons">delete</i>Eliminar Catedra</a></li>
    <li><div class="divider"></div></li>
    <li><a id="font" class="subheader">PERSONAS</a></li>
    <li><a id="font" class="waves-effect" href="agregar_personas.php"><i id="texto-icono" class="material-icons">person_add</i>Agregar Personas</a></li>
    <li><a id="font" class="waves-effect" href="actualizar_persona.php"><i id="texto-icono" class="material-icons">update</i>Actualizar Personas</a></li>
    <li><a id="font" class="waves-effect" href="eliminar_personas.php"><i id="texto-icono" class="material-icons">delete</i>Eliminar Personas</a></li>
    <li><div class="divider"></div></li>
    <li><a id="font" class="subheader">SECCIONES</a></li>
    <li><a id="font" class="waves-effect" href="crear_seccion.php"><i id="texto-icono" class="material-icons">create</i>Crear Seccion</a></li>
    <li><a id="font" class="waves-effect" href="actualizar_seccion.php"><i id="texto-icono" class="material-icons">update</i>Actualizar Seccion</a></li>
    <li><a id="font" class="waves-effect" href="eliminar_seccion.php"><i id="texto-icono" class="material-icons">delete</i>Eliminar Seccion</a></li>
    <li><a id="font" class="waves-effect" href="agregar_alumnos.php"><i id="texto-icono" class="material-icons">person_add</i>Agregar Alumnos</a></li>
    <li><div class="divider"></div></li>
    <li><a id="font" class="subheader">MATERIAL PEDAGOGICO</a></li>
    <li><a id="font" class="waves-effect" href="agregar_contenido.php"><i id="texto-icono" class="material-icons">note_add</i>Agregar Contenido</a></li>
    <li><a id="font" class="waves-effect" href="actualizar_contenido.php"><i  id="texto-icono"class="material-icons">update</i>Actualizar Contenido</a></li>
    <li><a id="font" class="waves-effect" href="eliminar_contenido.php"><i id="texto-icono" class="material-icons">delete</i>Eliminar Contenido</a></li>
    <li><a id="font" class="waves-effect" href="ver_contenido.php"><i id="texto-icono" class="material-icons">visibility</i>Ver Contenido</a></li>
  </ul>
';

        return $navbar;
    }

}
