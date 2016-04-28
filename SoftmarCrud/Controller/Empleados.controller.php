
<?php

	//incrustar un elemento 1. include: Si no encuentra el elemento nos tira una advertencia 
	//y continua ejecutandoel el codigo. uso include("contenido1.php");
	//2. require: Si no encuentra el elemento nos tira un error y no continua ejecutando el codigo. se usa
	//require("contenido1.php");
	//Ambos(Include y Require) tienen una propiedad llamada once donde nos permite hacer la carga solo una vez
	require_once("../Model/db_conn.php");

	require_once("../Model/Empleados.class.php");

	//3. Instanciamos las variables globales y una llamada $accion.
	//La variable accion nos va a indicar que parte del crud vamos hacer.

	$accion = $_REQUEST["accion"];

	switch($accion){
		case 'c':
			#crear...
			#Inicializar las variables que se envian desde el formulario y las que necesito para almancenar en la tabla.
				         
				$Cod_Emp     	=$_POST["Cod_Emp"];
				$Nombre      	=$_POST["Nombre"];
				$Apellido    	=$_POST["Apellido"];
				$Telefono    	=$_POST["Telefono"];
				$Direccion   	=$_POST["Direccion"];
				$Edad        	=$_POST["Edad"];
				$Correo      	=$_POST["Correo"];
				$Cargo    		=$_POST["Cargo"];
				$Cedula     	=$_POST["Cedula"];

			try{
				Gestion_Empleados::Create($Cod_Emp ,$Nombre,$Apellido,$Telefono,$Direccion,$Edad ,$Correo ,$Cargo,$Cedula);
				$mensaje = "Su registro se creo correctamente";
				$tipomensaje = "success";
				header("Location: ../View/Gestionar_Empleado.php?m=".$mensaje."&tm=".$tipomensaje);
			}catch(Exception $e){
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();			 
				$tipomensaje = "error";
				header("Location: ../View/Registrar_Empleado.php?m= ".$mensaje);
			}

		break;

		case 'r':
			#leer...
		break;

		case 'u':
				$Cod_empl		=$_POST["Cod_empl"];
				$Cod_Emp     	=$_POST["Cod_Emp"];
				$Nombre      	=$_POST["Nombre"];
				$Apellido    	=$_POST["Apellido"];
				$Telefono    	=$_POST["Telefono"];
				$Direccion   	=$_POST["Direccion"];
				$Edad        	=$_POST["Edad"];
				$Correo      	=$_POST["Correo"];
				$Cargo    		=$_POST["Cargo"];
				$Cedula     	=$_POST["Cedula"];

			try{
				Gestion_Empleados::Update($Cod_empl,$Cod_Emp ,$Nombre,$Apellido,$Telefono,$Direccion,$Edad ,$Correo ,$Cargo,$Cedula);
				$mensaje = "Se actualizo correctamente";
				$tipomensaje = "success";
				header("Location: ../View/Gestionar_Empleado.php?m=".$mensaje."&tm=".$tipomensaje);
			}catch(Exception $e){
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();			 
				$tipomensaje = "error";
				header("Location: ../View/actualizar_empleado.php?m= ".$mensaje);
			}
			break;
			
		case 'd':
			try {
          	$empleado = Gestion_Empleados::Delete(base64_decode($_REQUEST["sr"]));
          	$mensaje = "Se elimino exitosamente";
          	$tipomensaje = "success";
			header("Location: ../View/Gestionar_Empleado.php?m=".$mensaje."&tm=".$tipomensaje);
        } catch (Exception $e) {
			header("Location: ../View/Gestionar_Empleado.php?m= ".$mensaje."&tm=".$tipomensaje);
			$tipomensaje = "error";
        }
			break;

		default:
			#hacer cualquier cosa...
		break;
	


	}


?>