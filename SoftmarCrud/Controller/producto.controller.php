<?php

	//incrustar un elemento 1. include: Si no encuentra el elemento nos tira una advertencia 
	//y continua ejecutandoel el codigo. uso include("contenido1.php");
	//2. require: Si no encuentra el elemento nos tira un error y no continua ejecutando el codigo. se usa
	//require("contenido1.php");
	//Ambos(Include y Require) tienen una propiedad llamada once donde nos permite hacer la carga solo una vez
	session_start();
	require_once("../Model/db_conn.php");

	require_once("../Model/producto.class.php");

	//3. Instanciamos las variables globales y una llamada $accion.
	//La variable accion nos va a indicar que parte del crud vamos hacer.

	$accion = $_REQUEST["accion"];
	//$action = isset($_REQUEST['action']) ? $_POST['action']: NULL;


	switch($accion){
		case 'c':
			#crear...
			#Inicializar las variables que se envian desde el formulario y las que necesito para almancenar en la tabla.
            
			$Cod_Emp 		= $_POST["Cod_Emp"];			
			$Nombre		    = $_POST["Nombre"];
			$Descripcion    = $_POST["Descripcion"];
			$Valor	        = $_POST["Valor"];
			$Cantidad           = $_POST["Cant"];

			try{
				Gestion_producto::Create($Cod_Emp, $Nombre, $Descripcion, $Valor, $Cantidad);
				$mensaje = "El producto se registro correctamente";
				$tipomensaje = "success";
				header("Location: ../View/Gestion_Producto_admin.php?m=".$mensaje."&tm=".$tipomensaje);
			}catch (Exception $e){
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();	
				$tipomensaje = "error";
				header("Location: ../View/Registrar_producto.php?m=".$mensaje."&tm=".$tipomensaje);
			}
			break;

		case 'r':
		    # leer
		break;
		case 'u':	
		    $Cod_prod		= $_POST["Cod_prod"];
			$Nombre		    = $_POST["Nombre"];
			$Descripcion    = $_POST["Descripcion"];
			$Valor	        = $_POST["Valor"];
			$Cantidad       = $_POST["Cant"];


			try{
				Gestion_producto::Update($Cod_prod, $Nombre, $Descripcion, $Valor, $Cantidad);
				$mensaje = "Se actualizo correctamente";
				$tipomensaje = "success";
				header("Location: ../View/Gestion_Producto_admin.php?m=".$mensaje."&tm=".$tipomensaje);
			}catch(Exception $e){
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();			 
				$tipomensaje = "error";
				header("Location: ../View/Actualizar_producto.php?m=".$mensaje."&tm=".$tipomensaje);
			}
			break;
			
		case 'd':
        try {
          $producto = Gestion_producto::Delete(base64_decode($_REQUEST["pr"]));
          $msn = "se elimino correctamente";
          $tipomensaje = "success";
          header("Location: ../View/Gestion_Producto_admin.php?m=".$mensaje."&tm=".$tipomensaje);
        } catch (Exception $e) {
          $msn = "error:".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();
          $tipomensaje = "error";
          header("Location: ../View/Gestion_Producto_admin.php?m=".$mensaje."&tm=".$tipomensaje);
        }
      break;

	}


?>