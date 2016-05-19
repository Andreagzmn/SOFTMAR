<?php

	//incrustar un elemento 1. include: Si no encuentra el elemento nos tira una advertencia
	//y continua ejecutandoel el codigo. uso include("contenido1.php");
	//2. require: Si no encuentra el elemento nos tira un error y no continua ejecutando el codigo. se usa
	//require("contenido1.php");
	//Ambos(Include y Require) tienen una propiedad llamada once donde nos permite hacer la carga solo una vez
	session_start();
	require_once("../Model/db_conn.php");
	require_once("../Model/empresa.class.php");



  $nombre_archivo = $_POST["nom"];

  // INICIALIZAMOS LAS VARIABLES PARA LA SUBIDA DEL ARCHIVO

  // Directorio = Donde quiero guardar mis imagenes
  $directorio  = "uploads/";

  // Capturo el nombre del archivo
  $archivo     = basename($_FILES["Imagen_Upload"]["name"]);
  $uploadOk    = 0;

  $extension_archivo = pathinfo($archivo,PATHINFO_EXTENSION);
  $archivo = $directorio . $nombre_archivo .".". $extension_archivo;
 
  $check = getimagesize($_FILES["Imagen_Upload"]["tmp_name"]);



      if($check !== false) {
          echo "El archivo si es una imagen <br>";
          $uploadOk = 1;
      }else{
          echo "El archivo no es una imagen  <br>";
          $uploadOk = 0;
      }

// COMPROBAMOS QUE EL ARCHIVO NO EXISTA

  if(file_exists($archivo)){
    echo "Lo siento, el archivo ya existe en nuestra aplicación!  <br>";
    $uploadOk = 0;
  }

// ASIGNAMOS UN LIMITE DE PESO A NUESTRO ARCHIVO ASIGNANDO UN VALOR EN BIT

  if($_FILES["Imagen_Upload"]["size"] > 8388608){
    echo "Ooops! tu imagen no puede superar mas de 1MB  <br>";
    $uploadOk = 0;
  }

// VALIDAMOS EL TIPO DE ARCHIVO ES UNA IMAGEN
  if($extension_archivo != "jpg" && $extension_archivo != "png" && $extension_archivo != "jpeg" && $extension_archivo != "gif" ) {
      echo "El archivo no tiene un formato valido de imagen  <br>";
      $uploadOk = 0;
  }

// VALIDAMOS SI $UPLOADOK ESTA EN 1 DE ESA FORMA SE PUEDE SUBIR
  if($uploadOk == 1){
      if (move_uploaded_file($_FILES["Imagen_Upload"]["tmp_name"], $archivo)) {
          echo "El archivo ". basename( $_FILES["Imagen_Upload"]["name"]). " se subio correctamente.  <br>";
      } else {
          echo "Oops! ha ocurrido un error.  <br>".$_FILES["Imagen_Upload"]["error"];
      }
  } else {
    echo "Lo sentimos su archivo no se puede subir porque no cumple con nuestros estandares.  <br>";
  }



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
			$Direccion    	= $_POST["Direccion"];
			$NIT 			= $_POST["NIT"];
			$Correo       	= $_POST["Correo"];
			$Geo_x			= $_POST["Geo_x"];
			$Geo_y			= $_POST["Geo_y"];
			$Informacion	= $_POST["Informacion"];
			$Dias_aten		= $_POST["Dias_aten"];
			$Hor_desde		= $_POST["Hor_desde"];
			$Hor_hasta    	= $_POST["Hor_hasta"];
			$Foto1			= $_POST["Foto1"];
			$Foto2			= $_POST["Foto2"];
			$Foto3			= $_POST["Foto3"];
			$Foto4			= $_POST["Foto4"];
			$Logo			= $_POST["Logo"];

			try{
				Gestion_Empresa::Create($Cod_TipEmp,$Nombre,$Telefono,$Direccion,$NIT,$Correo,$Geo_x,$Geo_y,$Informacion,$Dias_aten,$Hor_desde,$Hor_hasta,$Foto1,$Foto2,$Foto3,$Foto4,$Logo);
				$mensaje = "Su registro se creo correctamente";
				$tipomensaje = "success";
				header("Location: ../View/Gestion_Empresa_admin.php?m=".$mensaje."&tm=".$tipomensaje);
			}catch(Exception $e){
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();
				$tipomensaje = "error";
				header("Location: ../View/Registrar_Empresa.php?m=".$mensaje."&tm=".$tipomensaje);
			}
	break;


		case 'r':
			#leer...
		break;

		case 'u':
			$Cod_Emp 		= $_POST["Cod_Emp"];
			$Cod_TipEmp 	= $_POST["Cod_TipEmp"];
			$Nombre			= $_POST["Nombre"];
			$Telefono		= $_POST["Telefono"];
			$Direccion      = $_POST["Direccion"];
			$NIT 			= $_POST["NIT"];
			$Correo         = $_POST["Correo"];
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

				 Gestion_Empresa::Update($Cod_Emp,$Cod_TipEmp,$Nombre,$Telefono,$Direccion,$NIT,$Correo,$Informacion,$Dias_aten,$Hor_desde,$Hor_hasta,$Foto1,$Foto2,$Foto3,$Foto4,$Logo);
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
<img src="<?php echo $archivo; ?>">
