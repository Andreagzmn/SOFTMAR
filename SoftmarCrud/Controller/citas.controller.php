<?php 
 session_start();

include_once("../Model/db_conn.php");
include_once("../Model/Citas.class.php");


	$accion=$_REQUEST["acc"];
	switch ($accion) {

	case 'create':

	
	$Cod_usu=$_POST["Cod_usu"];
	$Telefono=$_POST["Telefono"];
	$Fecha=$_POST["Fecha"];
	$Hora=$_POST["Hora"];
	$Estado=$_POST["Estado"];
	$Servicio=$_POST["Cod_serv"];
	$empleado=$_POST["Cod_empl"];
	$Cod_Emp=$_POST["Cod_Emp"];
	 

	try{

		Gestionar_citas::Create($Cod_usu,$Telefono,$Fecha,$Hora,$Estado,$Servicio,$empleado,$Cod_Emp);
		$mensaje="Su cita fue reservada con exito";
		$tipomensaje = "success";
		header("Location: ../View/perfilEm.php?ei=".base64_encode("$ei").$mensaje."&tm=".$tipomensaje);
	}catch(Exception $e){
		$mensaje="ha ocurrido un error, el error fue:".$e->getMessage()."en el archivo:".$e->getFile()."en la linea:".$e->getLine();
		$tipomensaje="error";
		header("Location: ../View/perfilEm.php?ei=".base64_encode("$ei").$mensaje."&tm=".$tipomensaje);		

	}
	
	break;

	case 'U':

	$Cod_Emp=$_POST["Cod_Emp"];
	$Cod_usu=$_POST["Cod_usu"];
	$Telefono=$_POST["Telefono"];
	$Fecha=$_POST["Fecha"];
	$Hora=$_POST["Hora"];
	$Estado=$_POST["Estado"];
	$Cod_serv=$_POST["Cod_serv"];
	$Cod_empl=$_POST["Cod_empl"];

	try{
		Gestionar_citas::Update($Cod_Emp,$Cod_usu,$Telefono,$Fecha,$Hora,$Estado,$Cod_serv,$Cod_empl);
		$mensaje="la cita se modifico correctamente";
		$tipomensaje="success";
		// if ($_SESSION["Perfil"] =="Administrador") {
		
		// header("Location: ../View/Gestion_Citas.php?m=".$mensaje."&tm=".$tipomensaje);	
		// }
		// elseif ($_SESSION["Perfil"] =="Usuario") {
			
		// 	header("Location: ../View/Mi_Cita.php?m=".$mensaje."&tm=".$tipomensaje);
		// }


		
		
		}catch(Exception $e){
			$mensaje="ha ocurrido un error, el error fue:".$e->getMessage()."en el archivo:".$e->getFile()."en la linea:".$e->getLine();
			$tipomensaje="error";
			// header("Location: ../View/Modificar_Cita.php?m=".$mensaje."&tm=".$tipomensaje);

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