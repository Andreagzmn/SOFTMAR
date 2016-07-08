<?php
 session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");

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
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster" />
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
  <nav id="menufixed" class="black">
    <div class="nav-wrapper " style="margin-left: 5px; margin-right: 5px;">
      <h3 href="#!" class="brand-logo" style="text-align:center; margin-top: 10px; "><!-- <img src="img/SOFTMAR.png" style="width: 500%; margin-top: -15px; position: relative;"> -->Softmar</h3>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <?php include_once("../View/comp.menu.php"); ?>
   </div>
  </nav>
  <section class="datagrid">
     <center><div class="containact">
      <h3 style="text-align: center;">Agregar Empleado</h3>
      <div class="row formu">
        <form class="col s12"  action="../controller/Empleados.controller.php" method="POST">
          <div class="row">
            <div class="input-field col s12 m4">
              <select  Required name="Cod_Emp" id="demo">
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
              <div class="input-field col s12 m8">
                <input id="demo" type="text" class="validate" name="Nombre" required>
                <label for="Nombre" data-error="wrong" >Nombre empleado</label>
              </div>
              <div class="input-field col s12 m6">
                <input id="demo" type="text" class="validate" name="Apellido" required>
                <label for="Nombre" data-error="wrong" >Apellido</label>
              </div>
              <div class="input-field col s12 m6">
                <input id="demo" type="number" class="validate" name="Telefono" required>
                <label for="Telefono" data-error="wrong" >Telefono</label>
              </div>
              <div class="input-field col s12 m6">
                <input id="demo" type="text" class="validate" name="Direccion" required>
                <label for="Direccion" data-error="wrong" >Direccion</label>
              </div>
              <div class="input-field col s12 m6">
                <input id="demo" type="number" class="validate" name="Edad" required>
                <label for="NIT" data-error="wrong"  >Edad</label>
              </div>
              <div class="input-field col s12 m6">
                <input id="demo" type="email" class="validate" name="Correo" required>
                <label for="email" data-error="wrong" >Correo electronico</label>
              </div>
              <div class="input-field col s12 m6">
                <input id="demo" type="number" class="validate" name="Cedula" required>
                <label for="Cedula" data-error="wrong" >Cedula</label>
              </div>
              <div class="input-field col s12 m12">
                <input id="demo" type="text" class="validate" name="Cargo" required>
                <label for="Cargo" data-error="wrong">Cargo</label>
              </div>
            </div>
          </div>
           <button type="submit" name="accion" value="c" id="boton" class="btn waves-effect">Registrar</button>
           <a href="Gestionar_Empleado.php" id="boton" class="btn waves-effect blue-grey darken-2">Cancelar</a>
                <?php echo @$_REQUEST["msn"]; ?>
        </form>
      </div>
    </div></center>
  </section>
  <?php include_once("../View/pie_pagina.php"); ?>
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
