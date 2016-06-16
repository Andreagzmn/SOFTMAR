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
			$nombre_empresa = strtolower(str_replace('ñ', 'n', $Nombre));
			$nombre_empresa = strtolower(str_replace(' ', '', $nombre_empresa));
			$Telefono		= $_POST["Telefono"];
			$Direccion    	= $_POST["Direccion"];
			$NIT 			= $_POST["NIT"];
			$Correo       	= $_POST["Correo"];
			$Geo_x			= $_POST["Geo_x"];
			$Geo_y			= $_POST["Geo_y"];
			$Informacion	= $_POST["Informacion"];
			$Dias_aten		= implode(",", $_POST["Dias_aten"]);
			$Hor_desde		= $_POST["Hor_desde"];
			$Hor_hasta    	= $_POST["Hor_hasta"]; 
			$Galeria   		= $_POST["galeria"];

 			try{ 
				if($Galeria != ""){ 
					include("Upload_Image.php");
				} 

				if(isset($_FILES['Imagen_Logo']['name'])){
					$Logo = $_POST["Logo"];
					include("Upload_Logo.php");
				}else{
					$Logo = "";
				}				
				 
				
				Gestion_Empresa::Create($Cod_TipEmp,$Nombre,$Telefono,$Direccion,$NIT,$Correo,$Geo_x,$Geo_y,$Informacion,$Dias_aten,$Hor_desde,$Hor_hasta,$Galeria,$Logo);

				$empresa = Gestion_Empresa::ReadbyNIT($NIT);

				$Cod_Emp = $empresa[0];
				$Cod_usu = $_SESSION["Cod_usu"];

				Gestion_Empresa::Createdueno($Cod_Emp, $Cod_usu);
				$_SESSION["Cod_Emp"] = $Cod_Emp;

				$mensaje = "Su registro se creo correctamente";
				$tipomensaje = "success";
				if($_SESSION["cod_rol"] == "101"){ 
					header("Location: ../View/perfilEm.php?m=".$mensaje."&tm=".$tipomensaje);
				}else{
					header("Location: ../View/Gestion_Empresa_admin.php?m=".$mensaje."&tm=".$tipomensaje);
				}
				
			}catch(Exception $e){
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();
				$tipomensaje = "error";
				header("Location: ../View/Registrar_Empresa.php?m=".$mensaje."&tm=".$tipomensaje);
			}
	break;
		case 'buscar':
          	Gestion_Empresa::ReadbyNombre($Nombre);

		case 'r':
			$empresa = Gestion_Empresa::ReadbyID($Cod_Emp);
    		
		break;

		case 'u':
			$Cod_Emp 		= $_POST["Cod_Emp"];
			$Cod_TipEmp 	= $_POST["Cod_TipEmp"];
			$Nombre			= $_POST["Nombre"];
			$nombre_empresa = strtolower(str_replace('ñ', 'n', $Nombre));
			$nombre_empresa = strtolower(str_replace(' ', '', $nombre_empresa));
			$Telefono		= $_POST["Telefono"];
			$Direccion    	= $_POST["Direccion"];
			$NIT 			= $_POST["NIT"];
			$Correo       	= $_POST["Correo"];
			$Informacion	= $_POST["Informacion"];
			$Dias_aten		= implode(",", $_POST["Dias_aten"]);
			$Hor_desde		= $_POST["Hor_desde"];
			$Hor_hasta    	= $_POST["Hor_hasta"]; 
			$Galeria   		= $_POST["galeria"];
			try{ 
				if($Galeria != ""){ 
					include("Upload_Image.php");
				} 

				if(isset($_FILES['Imagen_Logo']['name'])){
					$Logo = $_POST["Logo"];
					include("Upload_Logo.php");
				}else{
					$Logo = "";
				}	

				 Gestion_Empresa::Update($Cod_Emp,$Cod_TipEmp,$Nombre,$Telefono,$Direccion,$NIT,$Correo,$Informacion,$Dias_aten,$Hor_desde,$Hor_hasta,$Galeria,$Logo);
				$mensaje = "Se actualizo correctamente";
				$tipomensaje="success";
				header("Location: ../View/Gestion_Empresa_admin.php?m=".$mensaje."&tm=".$tipomensaje);
			}catch(Exception $e){
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();
				$tipomensaje = "error";
				header("Location: ../View/Actualizar_empresa.php?m=".$mensaje."&tm=".$tipomensaje);
			}
			
			

		break;


		case 'd':
        try {
          	$empresa = Gestion_Empresa::Delete(base64_decode($_REQUEST["ei"]));
          	$mensaje = "Se elimino exitosamente";
          	$tipomensaje = "success";
			header("Location: ../View/Gestion_Empresa_admin.php?m=".$mensaje."&tm=".$tipomensaje);
        } catch (Exception $e) {
			header("Location: ../View/Gestion_Empresa_admin.php?m= ".$mensaje."&tm=".$tipomensaje);
			$tipomensaje = "error";
        }
      break;

		default:
			#hacer cualquier cosa...
		break;



	}


?>

