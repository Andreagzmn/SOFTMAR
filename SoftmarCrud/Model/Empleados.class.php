<<?php 
#-> Class: Gestion_Empleados
#->Method(s), Create (), ReadAll(),ReadbyID(),ReadbyName(),Update(),Delete()
#->Author: @valentina_chica
#->Date Create
#->Last Update
#->Date Update

class Gestion_Empleados{
	//Metodo create()
	//El metodo create guarda los datos en la tabla contactos, captura todos los parametros desde el  formulario

	function Create($Cod_Emp ,$Nombre,$Apellido,$Telefono,$Direccion,$Edad ,$Correo ,$cargo,$Cedula){

		//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//Capturar fecha del sistema
		//$fechacreacion = data("Y-m-d");

		//Crear el query que vamos a realizar
		$consulta = "INSERT INTO Empleado (Cod_Emp ,Nombre,Apellido,Telefono,Direccion,Edad ,Correo ,cargo,Cedula) VALUES (?,?,?,?,?,?,?,?,?)";

		$query = $Conexion->prepare($consulta);
		$query->execute(array($Cod_Emp ,$Nombre,$Apellido,$Telefono,$Direccion,$Edad ,$Correo ,$cargo,$Cedula));

		Softmar_BD::Disconnect();
	}
	//Metodo ReadAll()
	//Busca todos los registros de la tabla

	function ReadAll(){

		//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		//Crear el query que vamos a realizar
		$consulta = "SELECT * FROM Empleado ORDER BY Cod_empl";

		$query = $Conexion->prepare($consulta);
		$query->execute();

		//Devolvemos el resultado en un arreglo
		//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
		//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL

		$resultado = $query->fetchALL(PDO::FETCH_BOTH);
		return $resultado;

		Softmar_BD::Disconnect();
	}
	//Metodo ReadAll()
	//Busca todos los registros de la tabla

	function ReadbyID($cod_Empl){

		//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		//Crear el query que vamos a realizar
		$consulta = "SELECT * FROM Empleado WHERE cod_Empl=?";

		$query = $Conexion->prepare($consulta);
		$query->execute(array($Cod_empl));

		//Devolvemos el resultado en un arreglo
		//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
		//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL

		$resultado = $query->fetch(PDO::FETCH_BOTH);
		return $resultado;

		Softmar_BD::Disconnect();
	} 
 
	function Update($Cod_empl ,$Cod_Emp ,$Nombre,$Apellido,$Telefono,$Direccion,$Edad ,$Correo ,$cargo,$Cedula){
	//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		//Crear el query que vamos a realizar
		$consulta = "UPDATE Empleado SET Cod_empl=?,Cod_Emp=?, Nombre=?, Apellido=?,Telefono=?,Direccion=?,Edad=?,Correo=?,cargo=?,Cedula=?  WHERE Cod_Emp=?" ;

		$query = $Conexion->prepare($consulta);
		$query->execute(array($Cod_empl ,$Cod_Emp ,$Nombre,$Apellido,$Telefono,$Direccion,$Edad ,$Correo ,$cargo,$Cedula));		

		Softmar_BD::Disconnect();
	
	}
	function Delete($Cod_empl){
	//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		//Crear el query que vamos a realizar
		$consulta = "DELETE FROM Empleado WHERE cod_Empl = ?" ;

		$query = $Conexion->prepare($consulta);
		$query->execute(array($codigo_Empl));		

		Softmar_BD::Disconnect();
	}
}

?>