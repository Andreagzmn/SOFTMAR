<?php 
#-> Class: Gestion_contactos
#->Method(s), Create (), ReadAll(),ReadbyID(),ReadbyName(),Update(),Delete()
#->Author: @Andrea_Guzman
#->Date Create
#->Last Update
#->Date Update

class Gestion_Contacto{
	//Metodo create()
	//El metodo create guarda los datos en la tabla contactos, captura todos los parametros desde el  formulario

	function Create($cod_rol, $Nombre, $Apellido, $Direccion, $Edad, $Clave, $Correo, $Cedula){

		//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//Capturar fecha del sistema
		//$fechacreacion = data("Y-m-d");

		//Crear el query que vamos a realizar
		$consulta = "INSERT INTO usuario (cod_rol, Nombre, Apellido, Direccion, Edad, Clave, Correo, Cedula) VALUES (?,?,?,?,?,?,?,?)";

		$query = $Conexion->prepare($consulta);
		$query->execute(array($cod_rol, $Nombre, $Apellido, $Direccion, $Edad, $Clave, $Correo, $Cedula));

		Softmar_BD::Disconnect();
	}
	//Metodo ReadAll()
	//Busca todos los registros de la tabla

	function ReadAll(){

		//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		//Crear el query que vamos a realizar		

		$consulta = "SELECT * FROM usuario ORDER BY Nombre";	


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

	function ReadbyID($Cod_usu){

		//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		//Crear el query que vamos a realizar
		$consulta = "SELECT * FROM usuario WHERE Cod_usu=?";

		$query = $Conexion->prepare($consulta);
		$query->execute(array($Cod_usu));

		//Devolvemos el resultado en un arreglo
		//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
		//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL

		$resultado = $query->fetch(PDO::FETCH_BOTH);
		return $resultado;

		Softmar_BD::Disconnect();
	} 
 
	function Update($codigo_usuario, $nombre_usuario, $apellido_usuario,$direccion_usuario,$email_usuario){
	//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		//Crear el query que vamos a realizar
		$consulta = "UPDATE usuario SET nombre_usuario = ?, apellido_usuario = ?, direccion_usuario = ?, email_usuario = ?, WHERE codigo_usuario = ?" ;

		$query = $Conexion->prepare($consulta);
		$query->execute(array($nombre_usuario, $apellido_usuario,$direccion_usuario,$email_usuario));		

		Softmar_BD::Disconnect();
	
	}
	function Delete($codigo_usuario){
	//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		//Crear el query que vamos a realizar
		$consulta = "DELETE FROM usuario WHERE codigo_usuario = ?" ;

		$query = $Conexion->prepare($consulta);
		$query->execute(array($codigo_usuario));		

		Softmar_BD::Disconnect();
	}

  	function ValidaUsuario($Correo, $Clave){
      $Conexion = Softmar_BD::Connect();
      $Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $consulta = "SELECT * FROM usuario WHERE Correo = ? AND Clave = ?";

      $query = $Conexion->prepare($consulta);

      $query->execute(array($Correo, $Clave));
      // fetch cuando voy a mostrar un solo registro
      // fetchALL cuando voy a mostrar mas de un registro

      $results = $query->fetch(PDO::FETCH_BOTH);
      Softmar_BD::Disconnect();

      return $results;
    }
}

?>