<?php
 session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");

   if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/login.php?m=".$msn."&tm=".$tipo_msn);
  }
  require_once("../Model/Servicio.class.php");
  $servicio =  Gestion_servicio::ReadbyID(base64_decode($_REQUEST["sr"]));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link type="text/css" rel="stylesheet" href="estilos.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Servicios empresa</title>
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
<body>
    <div class="container">
            <h3 style="text-align:center; margin-bottom: -47px; ">Actualizar Servicios</h3>
            <form  action="../Controller/servicio_emp.controller.php" method="POST" id="formi" class="contenedor"class="col s12">
             <input type="hidden" readonly name="Cod_serv" required value="<?php echo $servicio[0] ?>">
                <input type="hidden" readonly name="Cod_Emp" required value="<?php echo $servicio[1] ?>">
                    <div class="row">    
                        <div class="input-field col s12">
                            <input id="last_name" type="text" class="validate" required name="Nombre" value="<?php echo $servicio[2] ?>">
                            <label for="last_name">Nombre del servicio</label>
                        </div>
                     </div> 
                    <div class="row">   
                        <div class="input-field col s12">
                           <input id="first_name" type="text" class="validate" required name="Descripcion" value="<?php echo $servicio[3] ?>">
                           <label for="first_name">Descripción</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10">
                            <select required name="Estado" value="<?php echo $servicio[4] ?>">
                                <option value="" disabled selected>---Seleccione estado---</option>
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name" type="number" class="validate" required name="Valor" value="<?php echo $servicio[5] ?>">
                            <label for="first_name">Valor</label>
                        </div>
                    </div>  
                    <button type="submit" name="accion" value="c" id="botn" id="buton" class="btn waves-effect  cyan darken-3">Actualizar</button>
                    <a href="Gestion_Servicio_admin.php" id="boton" class="btn waves-effect  blue-grey darken-2  " id="btn-crear-cuenta">Cancelar</a>
                    <?php echo @$_REQUEST["$msn"]; ?>   
                </section>            
            </form>
        </div>  
        <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
        <script type="text/javascript" src="materialize/js/materialize.js"></script>
        <script>
            $(document).ready(function() {
             $('select').material_select();
            });
        </script>
</body>
</html>
