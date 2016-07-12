
<?php

	//incrustar un elemento 1. include: Si no encuentra el elemento nos tira una advertencia 
	//y continua ejecutandoel el codigo. uso include("contenido1.php");
	//2. require: Si no encuentra el elemento nos tira un error y no continua ejecutando el codigo. se usa
	//require("contenido1.php");
	//Ambos(Include y Require) tienen una propiedad llamada once donde nos permite hacer la carga solo una vez
	session_start();
	require_once("../Model/db_conn.php");

	require_once("../Model/oferta.class.php");

	//3. Instanciamos las variables globales y una llamada $accion.
	//La variable accion nos va a indicar que parte del crud vamos hacer.

	$accion = $_REQUEST["accion"];

	switch($accion){
		case 'c':
			#crear...
			#Inicializar las variables que se envian desde el formulario y las que necesito para almancenar en la tabla.
            
			$Cod_Emp 		= $_POST["Cod_Emp"];			
			$Nombre		    = $_POST["Nombre"];
			$Descripcion    = $_POST["Descripcion"];
			$Estado	        = $_POST["Estado"];
			$Categoria      = $_POST["Categoria"];
			$Oferta         = $_POST["Oferta"];
 			try{ 

				if(isset($_FILES['Imagen_Oferta']['name'])){
					$Foto = $_POST["Imoferta"];
					include("Upload_Oferta.php");
				}else{
					$Foto = "";
				}
				if ($_SESSION["cod_rol"] == "101") {
					Gestion_oferta::create($Cod_Emp, $Nombre, $Descripcion, $Estado, $Foto, $Categoria, $Oferta);
					$mensaje = "La oferta se registro correctamente";
					$tipomensaje = "success";
					header("Location: ../View/dashboard.php?m=".$mensaje."&tm=".$tipomensaje);				
				}else{
					Gestion_oferta::create($Cod_Emp, $Nombre, $Descripcion, $Estado, $Foto, $Categoria, $Oferta);
					$mensaje = "La oferta se registro correctamente";
					$tipomensaje = "success";
					header("Location: ../View/Gestion_Oferta_admin.php?m=".$mensaje."&tm=".$tipomensaje);
				}			
				 
			}catch (Exception $e){
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();	
				$tipomensaje = "error";
				header("Location: ../View/Registrar_Oferta.php?m=".$mensaje."&tm=".$tipomensaje);
			}
		break;

		case 'u':
			#modificar...
			#Inicializar las variables que se envian desde el formulario y las que necesito para almancenar en la tabla.
            
            $Cod_ofer       = $_POST["Cod_ofer"];
			$Cod_Emp 		= $_POST["Cod_Emp"];			
			$Nombre		    = $_POST["Nombre"];
			$Descripcion    = $_POST["Descripcion"];
			$Estado	        = $_POST["Estado"];
			$Foto           = $_POST["Foto"];
			$Categoria      = $_POST["Categoria"];
			$Oferta         = $_POST["Oferta"];

			try{
				Gestion_oferta::Update($Cod_ofer, $Cod_Emp, $Nombre, $Descripcion, $Estado, $Foto, $Categoria, $Oferta);
				$mensaje = "La oferta se actualizo correctamente";
				$tipomensaje = "success";
				header("Location: ../View/Gestion_Oferta_admin.php?m=".$mensaje."&tm=".$tipomensaje);
			}catch (Exception $e){
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();	
				$tipomensaje = "error";
				header("Location: ../View/Registrar_Oferta.php?m=".$mensaje."&tm=".$tipomensaje);
			}
		break;	

		case 'd':
        try {
          $oferta = Gestion_oferta::Delete(base64_decode($_REQUEST["of"]));
          $mensaje = "se elimino correctamente";
          $tipomensaje = "success";
          header("Location: ../View/Gestion_Oferta_admin.php?m=".$mensaje."&tm=".$tipomensaje);
        } catch (Exception $e) {
          $msn = "error:".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();
          $tipomensaje = "error";
          header("Location: ../View/Gestion_Oferta_admin.php?m=".$mensaje."&tm=".$tipomensaje);
        }
      break;
	}
		
?>