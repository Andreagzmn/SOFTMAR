<?php
 session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");

   if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/login.php?m=".$msn."&tm=".$tipo_msn);
  }

  $empresa =  Gestion_Empresa::ReadbyId(base64_decode($_REQUEST["ei"]));
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
    </head>
    <body>
     <center><div class="empref">
      <h4 class="teal-text text-teal lighten-3 test">Actualiza</h4>
      <div class="row formem">
        <form class="col s12"  action="controller/empresa.controller.php" method="POST">
          <div class="row">
              <div>
              <div class="input-field col s12">
                <input id="Nombre" type="text" class="validate">
                <label for="Nombre" data-error="wrong" name="Nombre" >Nombre Empresa</label>
              </div>
              <div class="input-field col s6">
                <input id="telefono" type="number" class="validate">
                <label for="Telefono" data-error="wrong" name="Telefono">Telefono</label>
              </div>
              <div class="input-field col s6">
                <input id="Direccion" type="text" class="validate">
                <label for="Direccion" data-error="wrong" name="Direccion">Direccion</label>
              </div>
              <div class="input-field col s6">
                <select>
                  <option value="" disabled selected name="Ciudad">elige tu ciudad</option>
                </select>
                <label>Ciudad</label>
              </div>
              <div class="input-field col s6">
                <input id="NIT" type="number" class="validate">
                <label for="NIT" data-error="wrong" name="NIT" >NIT</label>
              </div>
              <div class="input-field col s12">
                <input id="email" type="email" class="validate">
                <label for="email" data-error="wrong" name="Correo">Correo electronico</label>
              </div>
              <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea"></textarea>
                <label for="textarea1" name="Informacion">Informacion</label>
              </div>
              <div class="col s12">
                <p class="center">Dias de atencion</p>
                <div class="col s6">
                  <input type="date" name="Dias_aten">
                </div>
              </div>
              <div class="col s12">
              <p class="center">Horario</p>
                <div class="col s6">
                  <label>desde</label>
                  <input type="time" name="Hor_desde">
                </div>
                <div class="col s6">
                <label>Hasta</label>
                  <input type="time" name="Hor_hasta">
                </div>
              </div>
              <input type="hidden" value="" name="Geo_x">
              <input type="hidden" value="" name="Geo_y">
              <div class="file-field input-field col s6">
                <div class="btn">
                  <span>Fotos</span>
                  <input type="file" multiple>
                </div>
                <div class="file-path-wrapper">
                  <input name="Fotos" class="file-path validate" type="text" placeholder="Upload one or more files">
                </div>
              </div>
                  <div class="file-field input-field col s6">
                      <div class="btn">
                        <span>Logo</span>
                        <input type="file">
                      </div>
                      <div class="file-path-wrapper">
                          <input name="Logo" class="file-path validate" type="text">
                      </div>
                  </div>
            </div>
          </div>
           <button type="submit" name="accion" value="r" id="boton" class="btn waves-effect  teal lighten-1" ><i class=" material-icons">done</i>Actualizar</button>
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
