
<?php

	//incrustar un elemento 1. include: Si no encuentra el elemento nos tira una advertencia 
	//y continua ejecutandoel el codigo. uso include("contenido1.php");
	//2. require: Si no encuentra el elemento nos tira un error y no continua ejecutando el codigo. se usa
	//require("contenido1.php");
	//Ambos(Include y Require) tienen una propiedad llamada once donde nos permite hacer la carga solo una vez
	session_start();
	require_once("../Model/db_conn.php");

	require_once("../Model/contactos.class.php");

	//3. Instanciamos las variables globales y una llamada $accion.
	//La variable accion nos va a indicar que parte del crud vamos hacer.

	$accion = $_REQUEST["accion"];

	switch($accion){
		case 'c':
			#crear...
			#Inicializar las variables que se envian desde el formulario y las que necesito para almancenar en la tabla.
			$cod_rol 		= $_POST["cod_rol"];			
			$Nombre			= $_POST["nombre"];
			$Apellido		= $_POST["apellido"];
			$Direccion      = $_POST["direccion"];			
			$Edad	    	= $_POST["edad"];
			$Clave          = $_POST["clave"];
			$Correo         = $_POST["correo"];			
			$Cedula			= $_POST["cedula"];

			try{
				Gestion_Contacto::Create($cod_rol,$Nombre,$Apellido,$Direccion,$Edad,$Clave,$Correo,$Cedula);
				$mensaje = "Su registro se creo correctamente";
			}catch(Exception $e){
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();			 
			}
			header("Location: ../View/Registrar_usuario.php?m= ".$mensaje);
	break;

		break;

		case 'r':
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

			     header("Location: ../View/login.php?m=".$msn."&tm=".$tipo_msn);
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

			header("Location: ../View/login.php?m=".$msn."&tm=".$tipo_msn);
			}
						
				
		break;

		case 'u':
			$cod_rol 		= $_POST["cod_rol"];			
			$Nombre			= $_POST["nombre"];
			$Apellido		= $_POST["apellido"];
			$Direccion      = $_POST["direccion"];			
			$Edad	    	= $_POST["edad"];
			$Clave          = $_POST["clave"];
			$Correo         = $_POST["correo"];			
			$Cedula			= $_POST["cedula"];

			try{
				Gestion_Contacto::Update($cod_rol,$Nombre,$Apellido,$Direccion,$Edad,$Clave,$Correo,$Cedula);
				$mensaje = "Se actualizo correctamente";
			}catch(Exception $e){
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();			 
			}
			header("Location: ../View/editar.usuario.php?m= ".$mensaje);
			break;
			
		case 'd':
        try {
          $usuario = Gestion_Contacto::Delete(base64_decode($_REQUEST["ui"]));
          $msn = "se elimino correctamente";
        } catch (Exception $e) {
          $msn = "error";
        }
        header("Location: ../View/Gestion_Usuario_admin.php?msn=".$msn);
      break;

		default:
			#hacer cualquier cosa...
		break;
	


	}


?>