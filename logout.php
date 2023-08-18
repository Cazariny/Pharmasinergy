<?php
//iniciar sesion
session_start();
//Destruir Baariables de sesion
$_SESSION = array();
//Si se desea destruir la sesion completamente, borre tambien la cookie de la sesion
//ESTO DESTRUIRA LA SESION Y NO LA INFORMACION DE LA SESION
if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();
  setcookie(session_name(), '', time() - 42000,
  $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}
//Finalmente Destroy the Session
session_destroy();
//Redirecciono al login
header("Location:../proyecto/login.php")
?>
