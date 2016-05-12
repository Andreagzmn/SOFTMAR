<?php
 session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");

   if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/Index.php?m=".$msn."&tm=".$tipo_msn);
  }
   require_once("../Model/Empleados.class.php");
   $empleado =  Gestion_Empleados::ReadbyID(base64_decode($_REQUEST["ei"]));
?>
<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8"/>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" type="text/css" href="estilos.css">
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
     <center><div class="empref">
      <h4 class="teal-text text-teal lighten-3 test">Actualizar</h4>
      <div class="row formem">
        <form class="col s12" action="../controller/Empleados.controller.php" method="POST">
          <div class="row">
          <input type="hidden" readonly name="Cod_empl" required value="<?php echo $empleado[0] ?>">
          <input type="hidden" readonly name="Cod_Emp" required value="<?php echo $empleado[1] ?>">
              <div class="input-field col s6">
                <div class="input-field col s6">
                <input id="demo" type="text" class="validate" name="Nombre" required value="<?php echo $empleado[2] ?>">
                <label for="Nombre" data-error="wrong" >Nombre empleado</label>
              </div>
              <div class="input-field col s6">
                <input id="demo" type="text" class="validate" name="Nombre" required value="<?php echo $empleado[3] ?>">
                <label for="Nombre" data-error="wrong" >Apellido</label>
              </div>
              <div class="input-field col s6">
                <input id="demo" type="number" class="validate" name="Telefono" required value="<?php echo $empleado[4] ?>">
                <label for="Telefono" data-error="wrong" >Telefono</label>
              </div>
              <div class="input-field col s6">
                <input id="demo" type="text" class="validate" name="Direccion" required value="<?php echo $empleado[5] ?>">
                <label for="Direccion" data-error="wrong" >Direccion</label>
              </div>
              <div class="input-field col s6">
                <input id="demo" type="number" class="validate" name="Edad" required value="<?php echo $empleado[6] ?>">
                <label for="NIT" data-error="wrong"  >Edad</label>
              </div>
              <div class="input-field col s6">
                <input id="demo" type="email" class="validate" name="Correo" required value="<?php echo $empleado[7] ?>">
                <label for="email" data-error="wrong" >Correo electronico</label>
              </div>
              <div class="input-field col s6">
                <input id="demo" type="Text" class="validate" name="Cargo" required value="<?php echo $empleado[8] ?>">
                <label for="Cargo" data-error="wrong" >Cargo</label>
              </div>
              <div class="input-field col s6">
                <input id="demo" type="number" class="validate" name="Cedula" required value="<?php echo $empleado[9] ?>">
                <label for="Cedula" data-error="wrong" >Cedula</label>
              </div>
            </div>
          </div>
           <button name="accion" value="u" id="boton" class="btn waves-effect" style="margin: 20px;">Actualizar</button>
                  <a href="Gestion_Empleado.php" id="boton" class="btn waves-effect" style="margin: 20px;" >Cancelar</a>
                <?php echo @$_REQUEST["$mensaje"]; ?>
        </form>
      </div>  
    </div></center>
    <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
          $('select').material_select();
        });
    </script>
    <script>
      $('.datepicker').pickadate({
          selectMonths: true, // Creates a dropdown to control month
          selectYears: 15 // Creates a dropdown of 15 years to control year
      });

    </script>
    </body>
  </html>
