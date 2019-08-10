<?php

class Contenido {

    public function set_Contenido($arg_ID_CONTENIDO, $arg_COD_CATEDRA, $arg_NOMBRE_CONTENIDO, $arg_FILE_CONTENIDO, $arg_COD_TIPO, $arg_DESCRIPCION) {

        $model = new Conexion();
        $conexion = $model->get_Conexion();
        $query = "CALL CREATE_CONTENIDO(:ID_CONTENIDO,:COD_CATEDRA,:NOMBRE_CONTENIDO,:FILE_CONTENIDO,:COD_TIPO,:DESCRIPCION)";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':ID_CONTENIDO', $arg_ID_CONTENIDO, PDO::PARAM_STR);
        $stmt->bindParam(':COD_CATEDRA', $arg_COD_CATEDRA, PDO::PARAM_STR);
        $stmt->bindParam(':NOMBRE_CONTENIDO', $arg_NOMBRE_CONTENIDO, PDO::PARAM_STR);
        $stmt->bindParam(':FILE_CONTENIDO', $arg_FILE_CONTENIDO, PDO::PARAM_STR);
        $stmt->bindParam(':COD_TIPO', $arg_COD_TIPO, PDO::PARAM_STR);
        $stmt->bindParam(':DESCRIPCION', $arg_DESCRIPCION, PDO::PARAM_STR);
        if (!$stmt) {
            $stmt = null;
            return "ERROR ALGUNOS DATOS ESTAN VACIOS";
        } else {
            if ($stmt->execute()) {
                $stmt = null;
                return ("CONTENIDO CREADO CON EXITO");
            } else {
                $stmt = null;
                return ("ERROR AL CREAR EL CONTENIDO, INTENTELO NUEVAMENTE");
            }
        }
    }

    public function get_Contenido() {
        $cadena = "";
        $model = new Conexion();
        $conexion = $model->get_Conexion();
        $query = "SELECT * FROM 'SAMADI'.'CONTENIDOS'";
        $stmt = $conexion->prepare($query);
        if (!$stmt) {
            return "ERROR NO SE PUDO OBTENER LOS DATOS";
        } else {
            if ($stmt->execute()) {

                while ($data = $stmt->fetch()) {

                    $cadena = $cadena . '


				<div class="contenido">
    				<div class="card small">
    <div class="card-image waves-effect waves-block waves-light">
      <img id="imagenes" class="activator" src="../../images/tutoriales.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">' . $data["NOMBRE_CONTENIDO"] . '<i class="material-icons right">more_vert</i></span>
      <p id="link"><a href="./contenido.php?$cod="' . $data["ID_CONTENIDO"] . '"">Ver Contemido</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">' . $data["NOMBRE_CONTENIDO"] . '<i class="material-icons right">close</i></span>
      <p>' . $data["DESCRIPCION"] . '</p>
    </div>
  </div>
    			</div>
				';
                }

                return ($cadena);
            } else {
                return ("ERROR AL OBTENER LOS DATOS");
            }
        }
    }

}

?>