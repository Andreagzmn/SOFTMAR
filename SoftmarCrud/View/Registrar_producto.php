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
    <nav id="menufixed" class="black">
      <div class="nav-wrapper " style="margin-left: 5px; margin-right: 5px;">
        <h3 href="#!" class="brand-logo" style="text-align:center; margin-top: 10px; "><!-- <img src="img/SOFTMAR.png" style="width: 500%; margin-top: -15px; position: relative;"> -->Softmar</h3>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <?php include_once("../View/comp.menu.php"); ?>
      </div>
    </nav> 
    <section class="datagrid" class="col s12" > 
    <center><div class="container">
        <h3 style="text-align:center; margin-bottom: -47px; ">Softmar</h3>
          <form  action="../Controller/producto.controller.php" method="POST" id="formulario" class="col s12 formulario">
                
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
                            <label for="last_name">Nombre del producto</label>
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
                            <input id="first_name" type="number" class="validate" required name="Valor">
                            <label for="first_name">Valor</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name" type="number" class="validate" required name="Cant">
                            <label for="first_name">Cantidad</label>
                        </div>
                    </div>  
                    <button type="submit" name="accion" value="c" id="boton" id="btn-crear-cuenta" class="btn waves-effect  cyan darken-3">Registrar</button>
                    <a href="Gestion_Producto_admin.php" id="boton" class="btn waves-effect  blue-grey darken-2  " id="btn-crear-cuenta">Cancelar</a>
                    <?php echo @$_REQUEST["$msn"]; ?>   
                           
            </form>
        </div></center>
        </section>   
        <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
        <script type="text/javascript" src="materialize/js/materialize.js"></script>
        <script>
            $(document).ready(function() {
             $('select').material_select();
            });
        </script>
        <?php include_once("../View/pie_pagina.php"); ?>
</body>
</html>