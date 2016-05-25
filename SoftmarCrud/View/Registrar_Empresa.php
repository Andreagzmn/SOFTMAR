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
    
     <center><div class="empref">
      <h4 class="teal-text text-teal lighten-3 test">Registra tu empresa</h4>
      <div class="row formem">
       <div class="contamap col s12">
            <div style="padding: 0;">
              <div id="map" class="contamap"></div>
            </div>
           </div>
        <form class="col s12"  action="../controller/empresa.controller.php" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="input-field col s3">
              <select  name="Cod_TipEmp" id="demo">
                  <option value="" disabled selected>Tipo de empresa</option>
                  <?php
                    // Cargo la bd
                     require_once("../Model/db_conn.php");
                    // Cargo la clase tipo empresa
                     require_once("../Model/tipo_Empresa.class.php");

                    $tipoempresa = Gestion_Tipo_Empresa::ReadAll();

                    foreach ($tipoempresa as $row){
                        echo "<option value='".$row["Cod_TipEmp"]."'>".$row["Nombre"]."</option>";
                    }
                    //foreach ($imagenes as $row){
                    //    echo "<img src='".$row["Nombre"]."'/>";
                    //}
                  ?>
                </select>
                <label>Tipo empresa</label>
              </div>
              <div>
              <div class="input-field col s9">
                <input id="demo" type="text" class="validate" name="Nombre" required>
                <label for="Nombre" data-error="wrong" >Nombre Empresa</label>
              </div>
              <div class="input-field col s6">
                <input id="demo" type="number" class="validate" name="Telefono" required>
                <label for="Telefono" data-error="wrong" >Telefono</label>
              </div>
              <div class="input-field col s6">
                <input id="demo" type="text" class="validate" name="Direccion" required>
                <label for="Direccion" data-error="wrong" >Direccion</label>
              </div>
            <!--   <div class="input-field col s6">
                <select>
                  <option value="" disabled selected name="Ciudad">elige tu ciudad</option>
                </select>
                <label>Ciudad</label>
              </div> -->
              <div class="input-field col s6">
                <input id="demo" type="number" class="validate" name="NIT" required>
                <label for="NIT" data-error="wrong"  >NIT</label>
              </div>
              <div class="input-field col s6">
                <input id="demo" type="email" class="validate" name="Correo" required>
                <label for="email" data-error="wrong" >Correo electronico</label>
              </div>
              <div class="input-field col s12">
                <textarea id="demo" class="materialize-textarea" name="Informacion" required></textarea>
                <label for="textarea1" >Describe tu empresa</label>
              </div>
              <div class="col s12">
                <p class="center">Dias de atencion</p>
                <div class="col s6">
                  <input type="text" id="demo" name="Dias_aten" required>
                </div>
              </div>
              <div class="col s12">
              <p class="center">Horario</p>
                <div class="col s6">
                  <label>desde</label>
                  <input type="time" id="demo" name="Hor_desde" required>
                </div>
                <div class="col s6">
                <label>Hasta</label>
                  <input type="time" id="demo" name="Hor_hasta" required>
                </div>
              </div>
              <input type="hidden" value="" name="Geo_x" id="ltn"> 
              <input type="hidden" value="" name="Geo_y" id="lng">
              <div class="file-field input-field col s6">
                <div class="btn">
                  <span>Galeria</span>
                  <input type="file" multiple name="Imagen_Upload[]">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate"  type="text" placeholder="Puede subir mas de una imagen" name="galeria"  >
                </div>
              </div>
                  <div class="file-field input-field col s6">
                      <div class="btn">
                        <span>Logo</span>
                        <input type="file" name="Imagen_Logo">
                      </div>
                      <div class="file-path-wrapper">
                          <input name="Logo"  id="demo" class="file-path validate" type="text">
                      </div>
                  </div>
            </div>
               
          </div>
           <button type="submit" name="accion" value="c" id="boton" class="btn waves-effect" style="margin-top: 30px;">Registrarse</button>
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
