<?php 

class Softmar_BD{
	//Declara las variables que utilizo para cualquiera de mis metodos que se encuentren en la clase Laboratorio_BD.

	//Private = solos se puede usar en esta clase
	//Static = puedo utilizar esta variable o metodo sin necesidad de instanciar una clase.

	private static $db_host = "localhost";
	private static $db_name = "softmar";
	private static $db_user = "root";
	private static $db_pass = "";

	private static $conn = null;

	public static function Connect(){

		if(self::$conn == null){

			//Try y Catch = prueba y error. Funciona para probar y ejecutar un elemento si hay algun error el catch nos genera una excepcion.

			try{
				//conexion instancia la clase PDO(), para instanciar una clase necesitamos variable = new clase

				self::$conn = new PDO("mysql:host=".self::$db_host.";dbname=".self::$db_name,self::$db_user,self::$db_pass);
				self::$conn -> exec("SET CHARACTER SET UTF8");

			}catch(PDOException $e){
				die($e -> getMessage());
			}
	
		}
		return self::$conn;
	}

	public static function Disconnect(){
			self::$conn= null;
	}
}

?>