<?php 	
	session_start();
	require_once("../Model/db_conn.php");
	require_once("../Model/contactos.class.php");

			$Correo = $_POST["correo"];
			$Clave  = $_POST["clave"];

			try {
			  $usuario = Gestion_Contacto::ValidaUsuario($Correo, $Clave);

			    // El metodo count nos sirve para contar el numero de registros que retorno de la consulta
			  $usuario_existe = count($usuario[0]);

			  if($usuario_existe == 0){
			    // Header("Location: destino.php") redireccionar en php
			    // Encriptacion a traves de base64_encode, base64_decode

			     $msn = base64_encode("Debes tener una cuenta para poder iniciar sesión");
			     $tipo_msn = base64_encode("advertencia");

			     header("Location: ../View/Index.php?m=".$msn."&tm=".$tipo_msn);
			  }else{

			      // Creamos variables de SESSION

			    $_SESSION["Cod_usu"]     = $usuario[0];
			    $_SESSION["cod_rol"]     = $usuario[1];			    ;
			    $_SESSION["Nombre"] 	 = $usuario[2];
			    $_SESSION["Apellido"] 	 = $usuario[3];
			    $_SESSION["Direccion"] 	 = $usuario[4];
			    $_SESSION["Edad"] 	 	 = $usuario[5];
			    $_SESSION["Correo"] 	 = $usuario[7];
			    $_SESSION["Cedula"] 	 = $usuario[9];

			   header("Location: ../View/dashboard.php");
			 }

			}catch (Exception $e) {

			 $msn = base64_encode("A ocurrido un error ".$e->getMessage());
			 $tipo_msn = base64_encode("error");

			 header("Location: ../View/Index.php?m=".$msn."&tm=".$tipo_msn);
			}
 ?>