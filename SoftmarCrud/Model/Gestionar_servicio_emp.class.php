<?php

class Gestionar_servicios_empresa
    {

	function create($Cod_serv, $Cod_Emp, $Nombre, $Descripcion, $Estado, $Valor){

	$conexion = softmar_bd::connect();
	$conexion->setAttribute(POD::ATTR_ERRMODE_EXCEPTION);

	$consulta = "INSERT INTO servicio_emp VALUES('?,?')";

	$query = $conexion->prepare($consulta);
	$query->excute(array($Cod_serv, $Cod_Emp, $Nombre, $Descripcion, $Estado, $Valor));

	laboratorio_BD::disconnect(conn_identifier);

    }

function ReadAll(){
    	
    $conexion=softmar_BD::Connect();
    $conexion->SetAttribute(PDO::ATTRERRMODE,POO::ERRMODE_EXCEPTION);

    $consulta="SELECT * FROM servicio_emp ORDER BY Cod_Emp";
    $query=$conexion->prepare($consulta);
    $query->execute();

    $resultado=$query->fetcAll(PDO::FETCH_BOTH);
    return $resultado;

    laboratorio_BD::Disconnect();
    
    } 

function ReadbyID($Cod_Emp){

	$conexion=softmar_BD::conect();
	$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXEPTION);

	$consulta="SELECT * FROM servicio_emp WHERE Cod_Emp=?";
	$query=$conexion->prepare($consulta);
	$squery=excute(array($Cod_serv, $Cod_Emp, $Nombre, $Descripcion, $Estado, $Valor));

    $resultado=$query->fetch(PDO::FETCH_BOTH);
    return $resultado;

    laboratorio_BD::Disconnect();
    }

function update($Cod_Emp, $Nombre, $Descripcion, $Estado, $Valor){

	$conexion=softmar_BD::conect();
	$conexion->SetAttribute(PDO::ATTR_ERMODE,PDO::ERMODE_EXCEPTION);

	$consulta="UPDATE $servicio_emp SET $Cod_Emp=?, $Nombre=?, $Descripcion=?, $Estado=?, $Valor_=?";
	$query=$conexion->prepare($consulta);
	$query=execute(array($Cod_Emp));

	laboratorio_BD::Disconnect();
}

function delete($Cod_Emp){

    $conexion=softmar_BD::conect();
	$conexion->SetAttribute(PDO::ATTR_ERMODE,PDO::ERMODE_EXCEPTION);

    $consulta= "DELETE FROM $servicio_emp WHERE $Cod_Emp=?";
    $query=$conexion->prepare($consulta);
    $query=execute(array($Cod_Emp));

    laboratorio_BD::Disconnect();
    }
}

?>