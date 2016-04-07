<?php

class Gestionar_seguridad{

    function create($cod_rol, $cod_nombre){

    $conexion=Softmar_BD::Connect();
    $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //$con_fechacreacion = ("Y-m-d");

    $consulta = "INSERT INTO rol () VALUES(?,?)";

    $query = $conexion->prepare($consulta);
    $query->execute(array($cod_rol, $cod_nombre));

    Softmar_BD::Disconnect();
    }
}