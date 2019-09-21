<?php
/**
 *
 */
class ControllerLogin
{
    public function __construct()
    {
    }

    private function cLogin($arg_User, $arg_Password)
    {
        $objLogin = new ModelLogin();
        $login = $objLogin->get_Login($arg_User, $arg_Password);
        if ($login == 0) {
            return "NO SE PUEDE INICIAR SESION EN ESTOS MOMENTOS INTENTE MAS TARDE";
        } elseif ($login == 1) {
            session_start();
            if ($_SESSION['TYPE'] == '1') {
                echo '<meta http-equiv="refresh" content="0; url=./view/admin/">';
            } elseif ($_SESSION['TYPE'] == '2') {
                echo '<meta http-equiv="refresh" content="0; url=./view/docente/">';
            } elseif ($_SESSION['TYPE'] == '3') {
                echo '<meta http-equiv="refresh" content="0; url=./view/estudiante/">';
            }
        } elseif ($login == 2) {
            return "CONTRASEÑA INVÁLIDA";
        } elseif ($login == 3) {
            return "NO SE PUEDE COMPROBAR SUS CREDENCIALES EN ESTE MOEMENTO";
        } elseif ($login == 4) {
            return "USUARIO INVÁLIDO";
        }
    }

    public function get_cLogin($arg_User, $arg_Password)
    {
      return $this->cLogin($arg_User, $arg_Password);
    }
}
