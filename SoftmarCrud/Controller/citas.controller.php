<?php 
 session_start();

include_once("../Model/conexion.php");
include_once("../Model/Citas.class.php");


	$accion=$_REQUEST["acc"];
	switch ($accion) {

	case 'R':

	$fecha=$_POST["Fecha"];
	$hora=$_POST["Hora"];
	$servicio=$_POST["Servicio"];
	$barbero=$_POST["Barbero"];
	$id_usuario=$_POST["Id_usuario"];

	try{

		Gestionar_citas::Create($fecha,$hora,$servicio,$barbero,$id_usuario);
		$mensaje="Su cita fue reservada con exito";
		$tipomensaje = "success";
		header("Location: ../View/Reservar_Citas.php?m=".$mensaje."&tm=".$tipomensaje);
	}catch(Exception $e){
		$mensaje="ha ocurrido un error, el error fue:".$e->getMessage()."en el archivo:".$e->getFile()."en la linea:".$e->getLine();
		$tipomensaje="error";
		header("Location: ../View/Reservar_Citas.php?m=".$mensaje."&tm=".$tipomensaje);		

	}
	
	break;

	case 'U':

	$Cod_cita=$_POST["Cod_cita"];
	$fecha=$_POST["Fecha"];
	$hora=$_POST["Hora"];
	$servicio=$_POST["Servicio"];
	$barbero=$_POST["Barbero"];
	$id_usuario=$_POST["Id_usuario"];

	try{
		Gestionar_citas::Update($Cod_cita,$fecha,$hora,$servicio,$barbero,$id_usuario);
		$mensaje="la cita se modifico correctamente";
		$tipomensaje="success";
		if ($_SESSION["Perfil"] =="Administrador") {
		
		header("Location: ../View/Gestion_Citas.php?m=".$mensaje."&tm=".$tipomensaje);	
		}
		elseif ($_SESSION["Perfil"] =="Usuario") {
			
			header("Location: ../View/Mi_Cita.php?m=".$mensaje."&tm=".$tipomensaje);
		}


		
		
		}catch(Exception $e){
			$mensaje="ha ocurrido un error, el error fue:".$e->getMessage()."en el archivo:".$e->getFile()."en la linea:".$e->getLine();
			$tipomensaje="error";
			header("Location: ../View/Modificar_Cita.php?m=".$mensaje."&tm=".$tipomensaje);

		}


		break;

	case 'D':

	try{
		Gestionar_citas::Delete(base64_decode($_REQUEST["ui"]));
		$mensaje="la cita se elimino correctamente";
		$tipomensaje="success";
		header("Location: ../View/Gestion_Citas.php?m=".$mensaje."&tm=".$tipomensaje);

	}catch(Exception $e){
		$mensaje="ha ocurrido un error, el error fue:".$e->getMessage()."en el archivo:".$e->getFile()."en la linea:".$e->getLine();
		$tipomensaje="error";
		header("Location: ../View/Gestion_Citas.php?m=".$mensaje."&tm=".$tipomensaje);

	}		

	break;
    // citas validacion con ajax
	case 'valida_citas':
	  	$fecha = $_POST["fecha_cita"]; 
	  	$hora = $_POST["hora"]; 
	  	$barbero = $_POST["emple"];
	 
	  	try{
	  		$cita = Gestionar_Citas::ValidoCita($fecha, $hora, $barbero);

	  		if($cita[0] != ""){
	  			$existe = true;	
	  			$message = "Este horario ya se encuentra ocupado.";
	  		}else{
	  			$existe = false;
	  			$message = "";
	  		} 
	  	}catch(Exception $e){
	  		echo $e->getMessage();
	  	}


	  	echo json_encode(array('ue' => $existe, 'msn' => $message));

	  break;

}


 ?>