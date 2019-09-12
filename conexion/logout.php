<?php
session_start();
$_SESSION  = array();
unset($_SESSION);
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();
echo '<meta http-equiv="refresh" content="0; url=http://34.238.220.3/login.php">';
 ?>