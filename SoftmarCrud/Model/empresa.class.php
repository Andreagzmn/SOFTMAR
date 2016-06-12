<?php 
#-> Class: Gestion_contactos
#->Method(s), Create (), ReadAll(),ReadbyID(),ReadbyName(),Update(),Delete()
#->Author: @Andrea_Guzman
#->Date Create
#->Last Update
#->Date Update

class Gestion_Empresa{
	//Metodo create()
	//El metodo create guarda los datos en la tabla contactos, captura todos los parametros desde el  formulario

	function Create($Cod_TipEmp,$Nombre,$Telefono,$Direccion,$NIT,$Correo,$Geo_x,$Geo_y,$Informacion,$Dias_aten,$Hor_desde,$Hor_hasta,$Galeria,$Logo){

		//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//Crear el query que vamos a realizar
		$consulta = "INSERT INTO empresa (Cod_TipEmp,Nombre,Telefono,Direccion,NIT,Correo,Geo_x,Geo_y,Informacion,Dias_aten,Hor_desde,Hor_hasta,Galeria,Logo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$query = $Conexion->prepare($consulta);
		$query->execute(array($Cod_TipEmp,$Nombre,$Telefono,$Direccion,$NIT,$Correo,$Geo_x,$Geo_y,$Informacion,$Dias_aten,$Hor_desde,$Hor_hasta,$Galeria,$Logo));

		Softmar_BD::Disconnect();
	}

	function Createdueno($Cod_Emp, $Cod_usu){

		//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//Crear el query que vamos a realizar
		$consulta = "INSERT INTO duenos (Cod_Emp, Cod_usu) VALUES (?,?)";

		$query = $Conexion->prepare($consulta);
		$query->execute(array($Cod_Emp, $Cod_usu));

		Softmar_BD::Disconnect();
	}
	//Metodo ReadAll()
	//Busca todos los registros de la tabla

	function ReadAll(){

		//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		//Crear el query que vamos a realizar
		$consulta = "SELECT * FROM empresa";

		$query = $Conexion->prepare($consulta);
		$query->execute();

		//Devolvemos el resultado en un arreglo
		//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
		//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL

		$resultado = $query->fetchALL(PDO::FETCH_BOTH);
		return $resultado;

		Softmar_BD::Disconnect();
	}
	function ReadbyID($Cod_Emp){

		//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		//Crear el query que vamos a realizar
		$consulta = "SELECT * FROM empresa WHERE Cod_Emp=?";

		$query = $Conexion->prepare($consulta);
		$query->execute(array($Cod_Emp));

		//Devolvemos el resultado en un arreglo
		//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
		//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL

		$resultado = $query->fetch(PDO::FETCH_BOTH);
		return $resultado;

		Softmar_BD::Disconnect();
	}

	function ReadbyNIT($Nit){

		//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		//Crear el query que vamos a realizar
		$consulta = "SELECT * FROM empresa WHERE NIT=?";

		$query = $Conexion->prepare($consulta);
		$query->execute(array($Nit));

		//Devolvemos el resultado en un arreglo
		//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
		//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL

		$resultado = $query->fetch(PDO::FETCH_BOTH);
		return $resultado;

		Softmar_BD::Disconnect();
	}
 
	function ReadbyTipEmp($Cod_TipEmp){

		//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		//Crear el query que vamos a realizar
		$consulta = "SELECT * FROM empresa WHERE Cod_TipEmp=?";

		$query = $Conexion->prepare($consulta);
		$query->execute(array($Cod_TipEmp));

		//Devolvemos el resultado en un arreglo
		//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
		//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL

		$resultado = $query->fetchALL(PDO::FETCH_BOTH);
		return $resultado;

		Softmar_BD::Disconnect();
	}
 
	function Update($Cod_Emp,$Cod_TipEmp,$Nombre,$Telefono,$Direccion,$NIT,$Correo,$Informacion,$Dias_aten,$Hor_desde,$Hor_hasta,$Galeria,$Logo){
	//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		//Crear el query que vamos a realizar
		$consulta = "UPDATE empresa SET Cod_TipEmp = ?, Nombre = ?,Telefono = ?,Direccion = ?,NIT = ?,Correo= ?,Informacion =?,Dias_aten =?,Hor_desde = ?,Hor_hasta = ?,Galeria =?,Logo=? WHERE Cod_Emp = ?" ;

		$query = $Conexion->prepare($consulta);
		$query->execute(array($Cod_TipEmp,$Nombre,$Telefono,$Direccion,$NIT,$Correo,$Informacion,$Dias_aten,$Hor_desde,$Hor_hasta,$Galeria,$Logo,$Cod_Emp));		

		Softmar_BD::Disconnect();
	
	}
		function Delete($Cod_Emp){
	//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		//Crear el query que vamos a realizar
		$consulta = "DELETE FROM empresa WHERE Cod_Emp = ?" ;

		$query = $Conexion->prepare($consulta);
		$query->execute(array($Cod_Emp));		

		Softmar_BD::Disconnect();
	}
}

?>