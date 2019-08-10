<?php

class MiClase {

    public function ListarClases($arg_User) {
        $model = new Conexion();
        $conexion = $model->get_Conexion();
        $query = "SELECT * FROM 'samadi'.'CLASES','samadi'.'CATEDRAS' WHERE 'CLASES'.'CEDULA' = :User AND 'CLASES'.'COD_CATEDRA' = 'CATEDRAS'.'COD_CATEDRA'";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':User', $arg_User, PDO::PARAM_STR);
        if (!$stmt) {
            return "ERROR DATOS INCOMPLETOS O NO COMPATIBLES";
        } else {
            $cadena = "";
            $stmt->execute();
            while ($data = $stmt->fetch()) {
                $cadena = $cadena . '
				<div class="card">
				<div class="card-image waves-effect waves-block waves-light">
				<img class="activator" src="../../images/clases.jpg">
				</div>
				<div class="card-content">
				<span class="card-title activator grey-text text-darken-4">' . $data['NOMBRE_CATEDRA'] . '<i class="material-icons right">more_vert</i></span>
				<p><a href="MiClase.php?codigo=' .
                        $data['COD_CLASE'] . '">Gestionar Esta Clase</a></p>
				</div>
				<div class="card-reveal">
      <span class="card-title grey-text text-darken-4">' . $data['NOMBRE_CATEDRA'] . '<i class="material-icons right">close</i></span>
      <p>Accede a esta clase para obtener informacion de sus participantes y el contenido que has proporcionado</p>
    </div>
				</div>

				';
            }
            return $cadena;
        }
    }

    public function get_Clase($arg_CodClase, $arg_User) {
        
    }

}
