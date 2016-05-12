

<?php
 session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");

   if(!isset($_SESSION["Cod_usu"])){
    //$msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/Index.php?m=".$msn."&tm=".$tipo_msn);
  }

  $usuario =  Gestion_Contacto::ReadbyID(base64_decode($_REQUEST["ui"]));
?>
<!DOCTYPE html>
<html>
<head>
	
  <meta charset="utf-8"/>
   <link type="text/css" rel="stylesheet" href="estilos.css">
  <title>Registrar usuario</title>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster" />
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
    <script>
      <?php

          if(isset($_GET["m"])){
            if($_GET["m"] != ""){
              echo "<script>alert('".$_GET["m"]."')</script>";
            }
          }

      ?>
      </script>
</head>
<body >
  <!--<section class="contenedor">
  <img class="logoregis" class="bg-principal contenido col-6-s" src="img\SOFTMAR.png">
  <H5 id="crea">CREA UNA CUENTA</H5>
  </section>-->
  <center><div class="container">
    <div ="row">
          <div class="col s12 l8  ">
          <h3  style="text-align:center; margin-bottom: -47px; ">Softmar</h3>
          	<form action="../Controller/Usuariocontroller.php" method="POST" class="col s12 m8 offset-l8 z-depth-4 formulario " id="formulario" >
              <section class="col s12" >              
                
         		    <input type="hidden" readonly name="Cod_usu" required value="<?php echo $usuario[0] ?>">                   
                <div class="col l6 s12 input-field form center" >
                 <div class="row">
                    <select name="cod_rol">
                      <option value="102" <?php if($usuario["cod_rol"] == 102){ echo "selected"; } ?>>Cliente</option>
                      <option value="101" <?php if($usuario["cod_rol"] == 101){ echo "selected"; } ?>>Dueño de Local</option>
                      <option value="101" <?php if($usuario["cod_rol"] == 103){ echo "selected"; } ?>>Administrador</option>
                    </select>  
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="Nombre" type="text" class="validate" name="nombre" required  value="<?php echo $usuario[2] ?>">
                      <label for="Nombre">Nombre</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="Apellido" type="text" class="validate" name="apellido" required  value="<?php echo $usuario[3] ?>">
                      <label for="Apellido">Apellido</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="Dir" type="text" class="validate" name="direccion" required  value="<?php echo $usuario[4] ?>">
                      <label for="Dir">Direccion</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="edad" type="number" class="validate" name="edad" required  value="<?php echo $usuario[5] ?>">
                      <label for="edad">Edad</label>
                    </div>
                  </div>                    
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="Correo" type="email" class="validate" name="correo" required  value="<?php echo $usuario[7] ?>">
                      <label for="Correo">Correo</label>
                    </div>
                  </div> 
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="Cc" type="number" class="validate" name="cedula" required  value="<?php echo $usuario[9] ?>">
                      <label for="Cc">Cedula</label>
                    </div>
                  </div>         
                    		
            		  <button  name="accion" value="u" id="boton" class="btn waves-effect cyan darken-3" id="btn-crear-cuenta" >Actualizar</button>
            		  <a href="Gestion_Usuario_admin.php" id="boton" class="btn waves-effect blue-grey darken-2  " id="btn-crear-cuenta">Cancelar</a>
                  
                <?php echo @$_REQUEST["$mensaje"]; ?>
                </div>
              </section>       
          	</form>

        </div>
      </div>
   </div></center>

  <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.js"></script>
  <script>
    $(document).ready(function() {
      $('select').material_select();
    });

  </script>
</body>
</html>