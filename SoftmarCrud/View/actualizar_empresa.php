<?php
 session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");

   if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/Index.php?m=".$msn."&tm=".$tipo_msn);
  }
   require_once("../Model/empresa.class.php");
   $empresa =  Gestion_Empresa::ReadbyID(base64_decode($_REQUEST["ei"]));
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
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
      <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
      <script type="text/javascript" src="Jquery/gmaps.js"></script>

      <?php

          if(isset($_GET["m"])){
            if($_GET["m"] != ""){
              echo "<script>alert('".$_GET["m"]."')</script>";
            }
          }

      ?>
<script>
    var map;
    $(document).ready(function(){
      var map = new GMaps({
        el: '#map',
        lat: 6.244203,
        lng: -75.58121189999997,
         click: function(e){

          map.addMarker({
            lat: e.latLng.lat(),
            lng: e.latLng.lng()
          });

          $("#ltn").val(e.latLng.lat());
          $("#lng").val(e.latLng.lng());
        }
      });   
    });
      </script>
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
      <h3 style="text-align:center">Actualizar Empresa</h3>
      <div class="row formu">
        <form class="col s12 m12"  action="../controller/empresa.controller.php" method="POST" enctype="multipart/form-data">
          <div class="row">
          <input type="hidden" readonly name="Cod_Emp" required value="<?php echo $empresa[0] ?>"/>
            <div class="input-field col s6 m4">
               <select name="Cod_TipEmp" required  value="<?php echo $empresa[1] ?>">
                  <option value="3" <?php if($empresa["Cod_TipEmp"] == 3){ echo "selected"; } ?>>Peluqueria</option>
                  <option value="4" <?php if($empresa["Cod_TipEmp"] == 4){ echo "selected"; } ?>>Barberia</option>
                  <option value="5" <?php if($empresa["Cod_TipEmp"] == 5){ echo "selected"; } ?>>Spa</option>
                  <option value="6" <?php if($empresa["Cod_TipEmp"] == 6){ echo "selected"; } ?>>Peluqueria infantil</option>
                </select>
                <label>Tipo empresa</label>
              </div>
              <div>
              <div class="input-field col s6 m8">
                <input id="demo" type="text" class="validate" name="Nombre" value="<?php echo $empresa[2] ?>" required>
                <label for="Nombre" data-error="wrong" >Nombre Empresa</label>
              </div>
              <div class="input-field col s6 m6">
                <input id="demo" type="number" class="validate" name="Telefono" value="<?php echo $empresa[3] ?>" required>
                <label for="Telefono" data-error="wrong" >Telefono</label>
              </div>
              <div class="input-field col s6 m6">
                <input id="demo" type="text" class="validate" name="Direccion" value="<?php echo $empresa[4] ?>" required>
                <label for="Direccion" data-error="wrong" >Direccion</label>
              </div>
            <!--   <div class="input-field col s6">
                <select>
                  <option value="" disabled selected name="Ciudad">elige tu ciudad</option>
                </select>
                <label>Ciudad</label>
              </div> -->
              <div class="input-field col s6 m6">
                <input id="demo" type="number" class="validate" name="NIT" value="<?php echo $empresa[6] ?>" required>
                <label for="NIT" data-error="wrong"  >NIT</label>
              </div>
              <div class="input-field col s6 m6">
                <input id="demo" type="email" class="validate" name="Correo" value="<?php echo $empresa[7] ?>" required>
                <label for="email" data-error="wrong" >Correo electronico</label>
              </div>
              <div class="input-field col s12 m12">
                <textarea id="demo" class="materialize-textarea" name="Informacion" value="<?php echo $empresa[10] ?>" required></textarea>
                <label for="textarea1" >Describe tu empresa</label>
              </div>
              <div class="col s12 m12 ">
                <p class="center">Dias de atencion</p>
                <div class="col s6 m6">
                  <p>
                    <input type="checkbox" id="l" value="L" name="Dias_aten[]" value="<?php echo $empresa[11] ?>"/>
                    <label for="l">Lunes</label>
                  </p>
                </div>
                  <div class="col s6 m6">
                  <p>
                     <input type="checkbox" id="m" value="M" name="Dias_aten[]" value="<?php echo $empresa[11] ?>"/>
                     <label for="m">Martes</label>
                   </p>
                  </div>
                   <div class="col s6 m6">
                   <p>
                     <input type="checkbox" id="mi" value="Mi" name="Dias_aten[]"  value="<?php echo $empresa[11] ?>" />
                     <label for="mi">Miercoles</label>
                   </p>
                  </div>
                   <div class="col s6 m6">
                   <p>
                     <input type="checkbox" id="j" value="J" name="Dias_aten[]"  value="<?php echo $empresa[11] ?>" />
                     <label for="j">Jueves</label>
                   </p>
                  </div>
                   <div class="col s6 m6">
                    <p>
                     <input type="checkbox" id="v" value="V" name="Dias_aten[]"  value="<?php echo $empresa[11] ?>" />
                     <label for="v">Viernes</label>
                   </p>
                  </div>
                   <div class="col s6 m6">
                   <p>
                     <input type="checkbox" id="s" value="S" name="Dias_aten[]"  value="<?php echo $empresa[11] ?>" />
                     <label for="s">Sabado</label>
                   </p>
                  </div>
                   <div class="col s6 m6">
                   <p>
                     <input type="checkbox" id="d" value="D" name="Dias_aten[]"  value="<?php echo $empresa[11] ?>" />
                     <label for="d">Domingo</label>
                   </p>
                  </div>
                  <div class="col s6 m6">
                   <p>
                     <input type="checkbox" id="DF" value="F" name="Dias_aten[]"  value="<?php echo $empresa[11] ?>" />
                     <label for="DF">Dias Festivos</label>
                   </p>
                  </div>
              </div>
              <div class="col s12 m12">
              <p class="center">Horario</p>
                <div class="col s6 m6">
                  <label>desde</label>
                  <input type="time" id="demo" name="Hor_desde"  value="<?php echo $empresa[12] ?>" required>
                </div>
                <div class="col s6 m6">
                <label>Hasta</label>
                  <input type="time" id="demo" name="Hor_hasta"  value="<?php echo $empresa[13] ?>" required>
                </div>
              </div>
              <div class="file-field input-field col s12 m6">
                <div class="btn">
                  <span>Galeria</span>
                  <input type="file" multiple name="Imagen_Upload[]">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate"  type="text" placeholder="Puede subir mas de una imagen" name="galeria" value="<?php echo $empresa[14] ?>" >
                </div>
              </div>
              </div>
                  <div class="file-field input-field col s12 m6">
                      <div class="btn">
                        <span>Logo</span>
                        <input type="file" name="Imagen_Logo">
                      </div>
                      <div class="file-path-wrapper">
                          <input name="Logo"  id="demo" class="file-path validate" type="text"  value="<?php echo $empresa[15] ?>">
                      </div>
                  </div>
            </div>
                       <button name="accion" value="u" id="boton" class="btn waves-effect">Actualizar</button>
                  <a href="Gestion_Empresa_admin.php" id="boton" class="btn waves-effect blue-grey darken-2">Cancelar</a>
                <?php echo @$_REQUEST["$mensaje"]; ?>   
          </div>


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
