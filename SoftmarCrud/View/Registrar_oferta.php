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
<!doctype html>
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
          <form  action="../Controller/producto.controller.php" method="POST" id="formulario" class="col s12 formulario">
                <section class="col s12" >
              <div class="row">
                  <div class="input-field col s12">
                            <select  name="Cod_Emp">
                                <option value="" disabled selected>Seleccione una empresa</option>
                                <?php
                                    // Cargo la bd
                                    require_once("../Model/db_conn.php");
                                    // Cargo la clase tipo empresa
                                    require_once("../Model/empresa.class.php");

                                    $empresa = Gestion_Empresa::ReadAll();

                                    foreach ($empresa as $row){
                                        echo "<option value='".$row["Cod_Emp"]."'>".$row["Nombre"]."</option>";
                                    }
                                ?>
                            </select>
                            <label></label>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="input-field col s12">
                            <input id="last_name" type="text" class="validate" required name="Nombre">
                            <label for="last_name">Nombre del servicio</label>
                        </div>
                     </div> 
                    <div class="row">   
                <div class="input-field col s12">
                 <input id="first_name" type="text" class="validate" required name="Descripcion">
                 <label for="first_name">Descripción</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name" type="text" class="validate" required name="Valor">
                            <label for="first_name">Estado</label>
                        </div>
                    </div>
                    <div class="file-field input-field col s12 m6">
                      <div class="btn">
                        <span>Foto oferta</span>
                        <input type="file" name="Imagen_Logo">
                      </div>
                      <div class="file-path-wrapper">
                        <input name="Log"  id="demo" class="file-path validate" type="text">
                      </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name" type="text" class="validate" required name="Cat">
                            <label for="first_name">Categoria</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name" type="number" class="validate" required name="Dispo">
                            <label for="first_name">Oferta disponibles</label>
                        </div>
                    </div>    
                    <button type="submit" name="accion" value="c" id="boton" id="btn-crear-cuenta" class="btn waves-effect  cyan darken-3">Registrar</button>
                    <a href="Gestion_Producto_admin.php" id="boton" class="btn waves-effect  blue-grey darken-2  " id="btn-crear-cuenta">Cancelar</a>
                    <?php echo @$_REQUEST["$msn"]; ?>   
                </section>            
            </form>
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