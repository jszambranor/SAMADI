<?php

class Input
{

    public function get_Carreras()
    {
        try {
            $model = new Conexion();
            $conexion = $model->get_Conexion();
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL ESTABLECER LA CONEXION')</script>";
            die();
        }

        try {
            $query = "SELECT * FROM SAMADI_ISTG.CARRERAS";
            $stmt = $conexion->prepare($query);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL PREPARAR Y EJECUTAR LA CONSULTA')</script>";
            die();
        }
        try {
            while ($data = $stmt->fetch()) {
                $cadena = $cadena . '
				<option style="color:#0E47A1;" value="' . $data["COD_CARRERA"] . '">' . $data["NOMBRE_C"] . '</option>
				';
      }
                $query = null;
                $stmt = null;
                $model = null;
                $conexion = null;
                return $cadena;
                $cadena = null;

        } catch (PDOException $e) {
            echo "<script>alert('ERROR AL CREAR LAS CARRERAS')</script>";
            die();
        }
    }

    public function get_Jornadas()
    {
        $cadena = "";
        $model = new Conexion();
        $conexion = $model->get_Conexion();
        $query = "SELECT * FROM SAMADI_ISTG.JORNADAS";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        while ($data = $stmt->fetch()) {
            $cadena = $cadena . '
			<option style="color:#0E47A1;" value="' . $data["COD_JORNADA"] . '">' . $data["NOMBRE_JOR"] . '</option>
			';
        }
        $query = null;
        $stmt = null;
        $model = null;
        $conexion = null;
        return $cadena;
        $cadena = null;
    }

    public function get_Niveles()
    {
        $cadena = "";
        $model = new Conexion();
        $conexion = $model->get_Conexion();
        $query = "SELECT * FROM SAMADI_ISTG.NIVELES";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        while ($data = $stmt->fetch()) {
            $cadena = $cadena . '
			<option style="color:#0E47A1;" value="' . $data["COD_NIVEL"] . '">' . $data["NOMBRE_NIVEL"] . '</option>
			';
        }
        $query = null;
        $stmt = null;
        $model = null;
        $conexion = null;
        return $cadena;
        $cadena = null;
    }

    public function get_Paralelos()
    {
        $cadena = "";
        $model = new Conexion();
        $conexion = $model->get_Conexion();
        $query = "SELECT * FROM SAMADI_ISTG.PARALELOS";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        while ($data = $stmt->fetch()) {
            $cadena = $cadena . '
			<option style="color:#0E47A1;" value="' . $data["COD_PARALELO"] . '">' . $data["COD_PARALELO"] . '</option>
			';
        }
        $query = null;
        $stmt = null;
        $model = null;
        $conexion = null;
        return $cadena;
        $cadena = null;
    }

    public function get_Ciclo()
    {
        $cadena = "";
        $model = new Conexion();
        $conexion = $model->get_Conexion();
        $query = "SELECT * FROM SAMADI_ISTG.CICLOS";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        while ($data = $stmt->fetch()) {
            $cadena = $cadena . '
			<option style="color:#0E47A1;" value="' . $data["COD_CICLO"] . '">' . $data["NAME_CICLO"] . '</option>
			';
        }
        $query = null;
        $stmt = null;
        $model = null;
        $conexion = null;
        return $cadena;
        $cadena = null;
    }

    public function get_CarrerasSelected($arg_User){
      while($data = mysql_fetch_assoc($query))
    {
    	$op= "";
    	if($data2['pro_tipo']==$data['tip_codigo'])
    		$op="selected";

    	$tipos=$tipos."<option value='".
    	           $data['tip_codigo']."'".$op.">".
    	           $data['tip_nombre']."
    	         </option>";
    }
    }
}
