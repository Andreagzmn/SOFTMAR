<?php

class Gestion_oferta{

    function create($Cod_Emp, $Nombre, $Descripcion, $Estado, $Foto, $Categoria, $Oferta){

        $Conexion = Softmar_BD::Connect();
        $Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = "INSERT INTO oferta_emp (Cod_Emp, Nombre, Descripcion, Estado, Foto, Categoria, Oferta) VALUES (?,?,?,?,?,?,?)";

        $query = $Conexion->prepare($consulta);
        $query->execute(array($Cod_Emp, $Nombre, $Descripcion, $Estado, $Foto, $Categoria, $Oferta));

        Softmar_BD::Disconnect();
    }

    
    function ReadAll(){
    	
        $conexion=softmar_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $consulta="SELECT * FROM oferta_emp";
        
        $query=$conexion->prepare($consulta);
        $query->execute();


        $resultado = $query->fetchALL(PDO::FETCH_BOTH);
        return $resultado;

        softmar_BD::Disconnect();
    } 

    function ReadbyID($Cod_ofer){

    //Instanciamos y nos conectamos a la bd
    $Conexion = Softmar_BD::Connect();
    $Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    

    //Crear el query que vamos a realizar
    $consulta = "SELECT * FROM oferta_emp WHERE Cod_ofer=?";

    $query = $Conexion->prepare($consulta);
    $query->execute(array($Cod_ofer));

    //Devolvemos el resultado en un arreglo
    //Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
    //Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL

    $resultado = $query->fetch(PDO::FETCH_BOTH);
    return $resultado;

    Softmar_BD::Disconnect();
  }

    function Update($Cod_ofer, $Cod_Emp, $Nombre, $Descripcion, $Estado, $Foto, $Categoria, $Oferta){
    //Instanciamos y nos conectamos a la bd
        $Conexion = Softmar_BD::Connect();
        $Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        

        //Crear el query que vamos a realizar
        $consulta = "UPDATE oferta_emp SET Cod_Emp=?, Nombre=?, Descripcion=?, Estado=?, Foto=?, Categoria=?, Oferta=? WHERE Cod_ofer = ?" ;

        $query = $Conexion->prepare($consulta);
        $query->execute(array($Cod_Emp, $Nombre, $Descripcion, $Estado, $Foto, $Categoria, $Oferta, $Cod_ofer));        

        Softmar_BD::Disconnect();
    
    }

    function delete($Cod_ofer){

      $Conexion = Softmar_BD::Connect();
      $Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $consulta= "DELETE FROM oferta_emp WHERE Cod_ofer=?";
      $query = $Conexion->prepare($consulta);
      $query->execute(array($Cod_ofer));

      softmar_BD::Disconnect();
    }
}
?>