<?php
require_once("conn.php");
require_once("class.usuario.php");

$accion = $_REQUEST["acc"];

switch ($accion) {
  case 'c':
    # code...
    break;
    case 'u':
      # code...
      break;
      case 'd':
        try {
          $usuario = Gestion_Usuarios::Delete(base64_decode($_REQUEST["ui"]));
          $msn = "se elimino correctamente";
        } catch (Exception $e) {
          $msn = "error";
        }
      break;

header("Location: gestion_usuarios.php?msn=".$msn);
}
?>
