<?php
  session_start();
  require_once("conn.php");
  require_once("class.usuario.php");

  $correo = $_POST["txt_email"];
  $clave  = $_POST["txt_clave"];

  try {
    $usuario = Gestion_Usuarios::ValidaUsuario($correo, $clave);

    // El metodo count nos sirve para contar el numero de registros que retorno de la consulta
    $usuario_exite = count($usuario[0]);

    if($usuario_exite == 0){
    // Header("Location: destino.php") redireccionar en php
    // Encriptacion a traves de base64_encode, base64_decode

       $msn = base64_encode("Viejo registrese primero o_O!");
       $tipo_msn = base64_encode("advertencia");

       header("Location: index.php?m=".$msn."&tm=".$tipo_msn);
    }else{

      // Creamos variables de SESSION

      $_SESSION["id"]     = $usuario[0];
      $_SESSION["correo"] = $usuario[1];
      $_SESSION["perfil"] = $usuario[3];
      $_SESSION["nombre"] = $usuario[4];

     header("Location: dashboard.php");

    }
  } catch (Exception $e) {

   $msn = base64_encode("A ocurrido un error ".$e->getMessage());
   $tipo_msn = base64_encode("error");

   header("Location: index.php?m=".$msn."&tm=".$tipo_msn);
  }



?>
