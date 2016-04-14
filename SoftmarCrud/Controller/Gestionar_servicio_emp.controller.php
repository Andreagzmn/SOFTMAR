<?php

	//incrustar un elemento 1. include: Si no encuentra el elemento nos tira una advertencia 
	//y continua ejecutandoel el codigo. uso include("contenido1.php");
	//2. require: Si no encuentra el elemento nos tira un error y no continua ejecutando el codigo. se usa
	//require("contenido1.php");
	//Ambos(Include y Require) tienen una propiedad llamada once donde nos permite hacer la carga solo una vez
	require_once("../Model/db_conn.php");

	require_once("../Model/Gestionar_servicio_emp.class.php");

	//3. Instanciamos las variables globales y una llamada $accion.
	//La variable accion nos va a indicar que parte del crud vamos hacer.

	$action =@$_REQUEST["action"];
	//$action = isset($_REQUEST['action']) ? $_POST['action']: NULL;


	switch($action){
		case 'c':
			#crear...
			#Inicializar las variables que se envian desde el formulario y las que necesito para almancenar en la tabla.

			$Cod_Emp 		= $_POST["Cod_Emp"];			
			$Nombre		    = $_POST["Nombre"];
			$Descripcion    = $_POST["Descripcion"];
			$Estado	        = $_POST["Estado"];
			$Valor	        = $_POST["Valor"];

			try{
				Gestionar_servicios_empresa::Create($Cod_Emp, $Nombre, $Descripcion, $Estado, $Valor);
				$mensaje = "Su registro se ha guardado correctamente";
			}catch(Exception $e){
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();			 
			}
			header("Location: ../View/Registrar_servicios.php?m= ".$mensaje); 
		break;

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