<?php
 session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");

   if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/login.php?m=".$msn."&tm=".$tipo_msn);
  }
	$Tipo_empresa = Gestion_Tipo_Empresa::ReadbyId(base64_decode($_REQUEST["tp"]));
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
   <link type="text/css" rel="stylesheet" href="estilos.css">
  <title>tipo empresa</title>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
</head>
<body >
  <div class="container">
    <div ="row">
          <div class="col s12 l8  ">
          	<form action="../Controller/Tipo_empresa.controller.php" method="POST" class="col s12 m8 offset-l8 z-depth-4 formulario " id="formulario" >
              <section class="col s12" > 
                <h3  style="text-align:center; margin-top:20px;">Editar tipo de empresa</h3>
              	<label>Codigo tipo empresa</label>
       		 	<input type="text" readonly name="Cod_TipEmp" required value="<?php echo $Tipo_empresa[0] ?>">
                  <div class="col l6 s12 input-field form center" >
                  <div class="row">
                      <select name="Cod_TipEmp">
				        <option value="3" <?php if($Tipo_empresa["Cod_TipEmp"] == 3){ echo "selected"; } ?>>Peluqueria</option>
				        <option value="4" <?php if($Tipo_empresa["Cod_TipEmp"] == 4){ echo "selected"; } ?>>Barberia</option>
				        <option value="5" <?php if($Tipo_empresa["Cod_TipEmp"] == 5){ echo "selected"; } ?>>Spa</option>
				        <option value="6" <?php if($Tipo_empresa["Cod_TipEmp"] == 6){ echo "selected"; } ?>>Peluqueria Infantil</option>
				      </select>
                <div class="col l6 s12 input-field form center" >
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="Nombre" type="text" class="validate" name="Nombre" required  value="<?php echo $Tipo_empresa[1] ?>">
                      <label for="Nombre">Nombre</label>
                    </div>
                  </div>     
               </div>
               <button type="submit" name="accion" value="c" id="boton" class="btn waves-effect blue darken-3" ><i class=" material-icons right">done</i>Actualizar</button>
            	<button type="submit" name="accion" id="boton" class="btn waves-effect blue darken-3" href="Gestion_Tipo_Empresa_admin.php" ><i class=" material-icons right">done</i>Cancelar</button>
                <?php echo @$_REQUEST["msn"]; ?>
              </section>
           </form>
        </div>
    </div>
   </div>

  <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.js"></script>
</body>
</html>