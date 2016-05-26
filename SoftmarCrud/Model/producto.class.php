<?php

class Gestion_producto{

    function create($Cod_Emp, $Nombre, $Descripcion, $Valor, $Cantidad){

        $Conexion = Softmar_BD::Connect();
        $Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = "INSERT INTO productos_emp (Cod_Emp, Nombre, Descripcion, Valor, Cant) VALUES (?,?,?,?,?)";

        $query = $Conexion->prepare($consulta);
        $query->execute(array($Cod_Emp, $Nombre, $Descripcion, $Valor, $Cantidad));

        Softmar_BD::Disconnect();
    }

    
    function ReadAll(){
    	
        $conexion=softmar_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $consulta="SELECT * FROM productos_emp";
        
        $query=$conexion->prepare($consulta);
        $query->execute();


        $resultado = $query->fetchALL(PDO::FETCH_BOTH);
        return $resultado;

        softmar_BD::Disconnect();
    } 

    function ReadbyID($Cod_prod){

    //Instanciamos y nos conectamos a la bd
    $Conexion = Softmar_BD::Connect();
    $Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    

    //Crear el query que vamos a realizar
    $consulta = "SELECT * FROM productos_emp WHERE Cod_prod=?";

    $query = $Conexion->prepare($consulta);
    $query->execute(array($Cod_prod));

    //Devolvemos el resultado en un arreglo
    //Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
    //Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL

    $resultado = $query->fetch(PDO::FETCH_BOTH);
    return $resultado;

    Softmar_BD::Disconnect();
  }

    function Update($Cod_prod, $Nombre, $Descripcion, $Valor, $Cantidad){
    //Instanciamos y nos conectamos a la bd
        $Conexion = Softmar_BD::Connect();
        $Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        

        //Crear el query que vamos a realizar
        $consulta = "UPDATE productos_emp SET  Nombre=?, Descripcion=?, Valor=?, Cant=? WHERE Cod_prod = ?" ;

        $query = $Conexion->prepare($consulta);
        $query->execute(array(  $Nombre, $Descripcion, $Valor, $Cantidad, $Cod_prod));        

        Softmar_BD::Disconnect();
    
    }

    function delete($Cod_prod){

      $Conexion = Softmar_BD::Connect();
      $Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $consulta= "DELETE FROM productos_emp WHERE Cod_prod=?";
      $query = $Conexion->prepare($consulta);
      $query->execute(array($Cod_prod));

      softmar_BD::Disconnect();
    }
}
?>