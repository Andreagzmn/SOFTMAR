<?php

	//incrustar un elemento 1. include: Si no encuentra el elemento nos tira una advertencia 
	//y continua ejecutandoel el codigo. uso include("contenido1.php");
	//2. require: Si no encuentra el elemento nos tira un error y no continua ejecutando el codigo. se usa
	//require("contenido1.php");
	//Ambos(Include y Require) tienen una propiedad llamada once donde nos permite hacer la carga solo una vez
	session_start();
	require_once("../Model/db_conn.php");

	require_once("../Model/empresa.class.php");

	//3. Instanciamos las variables globales y una llamada $accion.
	//La variable accion nos va a indicar que parte del crud vamos hacer.

	$accion = $_REQUEST["accion"];

	switch($accion){
		case 'c':
			#crear...
			#Inicializar las variables que se envian desde el formulario y las que necesito para almancenar en la tabla.
			$Cod_TipEmp 	= $_POST["Cod_TipEmp"];			
			$Nombre			= $_POST["Nombre"];
			$Telefono		= $_POST["Telefono"];
			$Direccion      = $_POST["Direccion"];
			$Ciudad			= $_POST["Ciudad"];
			$NIT 			= $_POST["NIT"];
			$Correo         = $_POST["Correo"];			
			$Geo_x			= $_POST["Geo_x"];
			$Geo_y			= $_POST["Geo_y"];
			$Informacion	= $_POST["Informacion"];
			$Dias_aten		= $_POST["Dias_aten"];
			$Hor_desde		= $_POST["Hor_desde"];
			$Hor_hasta      = $_POST["Hor_hasta"];
			$Foto1			= $_POST["Foto1"];
			$Foto2			= $_POST["Foto2"];
			$Foto3			= $_POST["Foto3"];
			$Foto4			= $_POST["Foto4"];
			$Logo			= $_POST["Logo"];
			try{
				Gestion_Empresa::Create($Cod_TipEmp,$Nombre,$Telefono,$Direccion,$Ciudad,$NIT,$Correo,$Geo_x,$Geo_y,$Informacion,$Dias_aten,$Foto1,$Foto2,$Foto3,$Foto4,$Logo);
				$mensaje = "Su registro se creo correctamente";
			}catch(Exception $e){
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();			 
			}
			header("Location: ../View/formem.php?m= ".$mensaje);
	break;

		break;

		case 'r':
			#leer...
		break;

		case 'u':
			#leer...
		break;

			
		case 'd':
        try {
          $empresa = Gestion_Empresa::Delete(base64_decode($_REQUEST["ei"]));
          $msn = "se elimino correctamente";
        } catch (Exception $e) {
          $msn = "error";
        }
        header("Location: ../View/Gestion_Empresa_admin.php?msn=".$msn);
      break;

		default:
			#hacer cualquier cosa...
		break;
	


	}


?>