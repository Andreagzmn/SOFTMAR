<?php

	//incrustar un elemento 1. include: Si no encuentra el elemento nos tira una advertencia 
	//y continua ejecutandoel el codigo. uso include("contenido1.php");
	//2. require: Si no encuentra el elemento nos tira un error y no continua ejecutando el codigo. se usa
	//require("contenido1.php");
	//Ambos(Include y Require) tienen una propiedad llamada once donde nos permite hacer la carga solo una vez
	session_start();
	require_once("../Model/db_conn.php");

	require_once("../Model/Gestionar_servicio_emp.class.php");

	//3. Instanciamos las variables globales y una llamada $accion.
	//La variable accion nos va a indicar que parte del crud vamos hacer.

	$accion =@$_REQUEST["accion"];
	//$action = isset($_REQUEST['action']) ? $_POST['action']: NULL;


	switch($accion){
		case 'c':
			#crear...
			#Inicializar las variables que se envian desde el formulario y las que necesito para almancenar en la tabla.

			$Cod_Emp 		= $_POST["Cod_Emp"];			
			$Nombre		    = $_POST["Nombre"];
			$Descripcion    = $_POST["Descripcion"];
			$Estado	        = $_POST["Estado"];
			$Valor	        = $_POST["Valor"];

			try{
				Gestionar_servicio_emp::Create($Cod_Emp,$Nombre,$Descripcion,$Estado,$Valor);
				$mensaje = "El servicio se registro correctamente";
			}catch(Exception $e){
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();	
			header("Location: ../View/Registrar_servicio.php?m= ".$mensaje); 
		}
		break;

		case 'r':
		    # leer
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

			    $_SESSION["Cod_Emp"]     = $usuario[1];
			    $_SESSION["Nombre"]     = $usuario[2];			    ;
			    $_SESSION["Descripcion"] 	 = $usuario[3];
			    $_SESSION["Estado"] 	 = $usuario[4];
			    $_SESSION["Valor"] 	 = $usuario[5];

			  header("Location: ../View/dashboard.php");
			 }

			}catch (Exception $e) {

			 $msn = base64_encode("A ocurrido un error ".$e->getMessage());
			 $tipo_msn = base64_encode("error");

			header("Location: ../View/login.php?m=".$msn."&tm=".$tipo_msn);
			} 
		case 'u':
			# actualizar...
			break;
			
		case 'd':
			# eliminar...
			break;

		default:
			#hacer cualquier cosa...
		break;

	}


?>