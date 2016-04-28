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

      <?php

          if(isset($_GET["m"])){
            if($_GET["m"] != ""){
              echo "<script>alert('".$_GET["m"]."')</script>";
            }
          }

      ?>
    </head>
    <body>
     <center><div class="empref">
      <h4 class="teal-text text-teal lighten-3 test">Registrar Empleado</h4>
      <div class="row formem">
        <form class="col s12"  action="../controller/Empleados.controller.php" method="POST">
          <div class="row">
            <div class="input-field col s12">
              <select  name="Cod_Emp" id="demo">
                  <option value="" disabled selected>Empresa</option>
                  <?php
                    // Cargo la bd
                     require_once("../Model/db_conn.php");
                    // Cargo la clase tipo empresa
                     require_once("../Model/Empresa.class.php");

                    $empresa = Gestion_Empresa::ReadAll();

                    foreach ($empresa as $row){
                        echo "<option value='".$row["Cod_Emp"]."'>".$row["Nombre"]."</option>";
                    }
                    //foreach ($imagenes as $row){
                    //    echo "<img src='".$row["Nombre"]."'/>";
                    //}
                  ?>
                </select>
                <label>Empresa</label>
              </div>
              <div>
              <div class="input-field col s6">
                <input id="demo" type="text" class="validate" name="Nombre" required>
                <label for="Nombre" data-error="wrong" >Nombre empleado</label>
              </div>
              <div class="input-field col s6">
                <input id="demo" type="text" class="validate" name="Nombre" required>
                <label for="Nombre" data-error="wrong" >Apellido</label>
              </div>
              <div class="input-field col s6">
                <input id="demo" type="number" class="validate" name="Telefono" required>
                <label for="Telefono" data-error="wrong" >Telefono</label>
              </div>
              <div class="input-field col s6">
                <input id="demo" type="text" class="validate" name="Direccion" required>
                <label for="Direccion" data-error="wrong" >Direccion</label>
              </div>
              <div class="input-field col s6">
                <input id="demo" type="number" class="validate" name="Edad" required>
                <label for="NIT" data-error="wrong"  >Edad</label>
              </div>
              <div class="input-field col s6">
                <input id="demo" type="email" class="validate" name="Correo" required>
                <label for="email" data-error="wrong" >Correo electronico</label>
              </div>
              <div class="input-field col s6">
                <input id="demo" type="Text" class="validate" name="Cargo" required>
                <label for="Cargo" data-error="wrong" >Cargo</label>
              </div>
              <div class="input-field col s6">
                <input id="demo" type="number" class="validate" name="Cedula" required>
                <label for="Cedula" data-error="wrong" >Cedula</label>
              </div>
            </div>
          </div>
           <button type="submit" name="accion" value="c" id="boton" class="btn waves-effect">Registrar</button>
                <?php echo @$_REQUEST["msn"]; ?>
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
