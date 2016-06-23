<?php 

class Gestionar_citas{

	// Reservar las citas
	function Create($Cod_usu,$Telefono,$Hora,$Fecha,$Estado,$Servicio,$empleado,$Cod_Emp){
		$conexion=Softmar_BD::Connect();
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$consulta="INSERT INTO citas (Cod_usu,Telefono,Hora,Fecha,Estado,Servicio,empleado,Cod_Emp) VALUES (?,?,?,?,?,?,?,?)";		
		$query=$conexion->prepare($consulta);
		$query->execute(array($Cod_usu,$Telefono,$Hora,$Fecha,$Estado,$Servicio,$empleado,$Cod_Emp));

		Softmar_BD::Disconnect();			
	}

	// modificacion de las citas
	function Update($Cod_cita,$Cod_usu,$Telefono,$Hora,$Fecha,$Estado,$Cod_empl,$Cod_serv,$Cod_Emp){
		$conexion=Softmar_BD::Connect();
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		

		$consulta="UPDATE citas SET Cod_usu=?,Telefono=?,Hora=?,Fecha=?,Estado=?,Cod_serv=?,Cod_Emp=? WHERE Cod_cita=? ";		
		$query=$conexion->prepare($consulta);
		$query->execute(array($Cod_usu,$Telefono,$Hora,$Fecha,$Estado,$Cod_serv,$Cod_Emp,$Cod_cita));
		
		Softmar_BD::Disconect();		

	}

	// eliminar cita

	function Delete($Cod_cita){ 
		$conexion=Softmar_BD::Connect();
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		$consulta="DELETE FROM citas WHERE Cod_cita=?";
		$query=$conexion->prepare($consulta);
		$query->execute(array($Cod_cita));

		Softmar_BD::Disconect();
	}

	// funcion ReadbyId

	function ReadbyId($Cod_cita){//para el modificar de todos los usuarios
		$conexion=Softmar_BD::Connect();
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$consulta="SELECT * FROM citas WHERE Cod_cita=?";
		$query=$conexion->prepare($consulta);
		$query->execute(array($Cod_cita));

		$resultado=$query->fetch(PDO::FETCH_BOTH);

		Softmar_BD::Disconect();

		return $resultado;		
	}

	function Mi_Cita($Cod_usu){//para el modificar de todos los usuarios
		$conexion=Softmar_BD::Connect();
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$consulta="SELECT * FROM citas WHERE Cod_usu=?";
		$query=$conexion->prepare($consulta);
		$query->execute(array($Cod_usu));

		$resultado=$query->fetchAll(PDO::FETCH_BOTH);

		Softmar_BD::Disconect();

		return $resultado;		
	}



	function ReadAll(){//para el administrador y el barbero
		$conexion=Softmar_BD::Connect();
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		$consulta="SELECT * FROM citas";
		$query=$conexion->prepare($consulta);
		$query->execute();

		$resultado=$query->fetchAll(PDO::FETCH_BOTH);

		Softmar_BD::Disconect();

		return $resultado;		
	}

	function ValidoCita($Fecha, $Hora, $Cod_empl){

		//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		//Crear el query que vamos a realizar
		$consulta = "SELECT * FROM citas WHERE Fecha =? AND Hora = ? AND Cod_empl =? ";

		$query = $Conexion->prepare($consulta);
		$query->execute(array($Fecha, $Hora, $Cod_empl ));

		//Devolvemos el resultado en un arreglo
		//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
		//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL

		$resultado = $query->fetch(PDO::FETCH_BOTH);
		return $resultado;

		Softmar_BD::Disconnect();
	}
}


 ?>