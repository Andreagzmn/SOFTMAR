<?php
 session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/servicio.class.php");
  require_once("../Model/Empleados.class.php");

   if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/Index.php?m=".$msn."&tm=".$tipo_msn);
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster" />
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" type="text/css" href="estilos.css">
       <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
      <script type="text/javascript" src="materialize/js/materialize.js"></script>
      <script>
          $(document).ready(function() {
            $('select').material_select();
          });
      </script>

      <?php

          if(isset($_GET["m"])){
            if($_GET["m"] != ""){
              echo "<script>alert('".$_GET["m"]."')</script>";
            }
          }

      ?>
</head>
<body>
    <center><div class="container">
        <h3 style="text-align:center; margin-bottom: -47px; ">Softmar</h3>
          <form  action="../Controller/citas.controller.php" method="POST" id="formulario" class="col s12 formulario">
                <section class="col s12" >
                <div class="row">  
                  <input id="Cod_Emp" type="hidden" value="<?php echo $_GET["ei"]?>" name="Cod_Emp">
                  <div class="input-field col s12">
                      <input id="last_name" type="number" class="validate" required name="Telefono">
                      <label for="last_name">Telefono</label>
                  </div>
                </div>
                <div class="input-field col s12">
                 <select name="Fecha" id="fecha_cita">
                        <option value="" disabled selected>Seleccione fecha</option>
                        <option value="8:00 am">8:00 am</option>
                        <option value="8:30 am">8:30 am</option>
                        <option value="9:00 am">9:00 am</option>
                      </select>
                  </div>
                <div class="row">    
                  <div class="input-field col s12">
                      <select name="Hora" id="hora">
                        <option value="" disabled selected>Seleccione la hora de su cita</option>
                        <option value="8:00 am">8:00 am</option>
                        <option value="8:30 am">8:30 am</option>
                        <option value="9:00 am">9:00 am</option>
                      </select>
                  </div>                  
                </div>
                <div class="row">    
                  <div class="input-field col s12">
                       <input id="last_name" type="text" class="validate" required name="Estado">
                      <label for="last_name">Estado</label>
                  </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select  name="Cod_serv">
                          <option value="" disabled selected>Seleccione un servicio</option>
                          <?php                        
                            $services=Gestion_servicio::ReadAll();
                            foreach ($services as $row){
                              echo "<option value='".$row["Nombre"]."'>".$row["Nombre"]."</option>"; 
                            }                           
                          ?>
                        </select>                        
                      </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <select  name="Cod_empl" id="emple">
                        <option value="" disabled selected>Seleccione un empleado</option>
                        <?php                        
                          $empleados = Gestion_Empleados::ReadAll();
                          foreach ($empleados as $row){
                            echo "<option value='".$row["Cod_empl"]."'>".$row["Nombre"]."</option>"; 
                          }                           
                        ?>
                      </select>                        
                    </div>
                  </div> 
                    <input type="hidden" name="Cod_usu" value="<?php echo $_SESSION["Cod_usu"]; ?>"/>
                    <!-- <input type="hidden" name="Cod_Emp" value="<?php //echo $_SESSION["Cod_Emp"]; ?>"/>  -->

                    <button type="submit"  name="acc" value="create" id="boton" id="btn-crear-cuenta" class="btn waves-effect  cyan darken-3">Registrar</button>
                    <a href="perfilEm.php" id="boton" class="btn waves-effect  blue-grey darken-2  " id="btn-crear-cuenta">Cancelar</a>
                    <?php echo @$_REQUEST["$msn"]; ?>   
                </section>            
            </form>
    </div></center>    
    </body>
</html>