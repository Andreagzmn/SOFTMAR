<?php
 session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");

   if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/Index.php?m=".$msn."&tm=".$tipo_msn);
  }
  require_once("../Model/producto.class.php");
    $producto =  Gestion_producto::ReadbyID(base64_decode($_REQUEST["pr"]));
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
  <nav id="menufixed" class="black">
    <div class="nav-wrapper " style="margin-left: 5px; margin-right: 5px;">
      <h3 href="#!" class="brand-logo" style="text-align:center; margin-top: 10px; "><!-- <img src="img/SOFTMAR.png" style="width: 500%; margin-top: -15px; position: relative;"> -->Softmar</h3>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <?php include_once("../View/comp.menu.php"); ?>
    </div>
  </nav>
  <section class="datagrid">
    <center><div class="cont-oferta">
      <h3  style="text-align:center;">Actualizar Producto</h3>
      <div class="row formu">
        <form class="col s12 " action="../Controller/producto.controller.php" method="POST">
          <div class="row">
              <input type="hidden" readonly name="Cod_prod" required value="<?php echo $producto[0] ?>">
              <input type="hidden" readonly name="Cod_Emp" required value="<?php echo $producto[1] ?>">
                    <div class="row">    
                        <div class="input-field col s12">
                            <input id="last_name" type="text" class="validate" required name="Nombre" value="<?php echo $producto[2] ?>">
                            <label for="last_name">Nombre del producto</label>
                        </div>
                     </div> 
                    <div class="row">   
                        <div class="input-field col s12">
                           <input id="first_name" type="text" class="validate" required name="Descripcion" value="<?php echo $producto[3] ?>">
                           <label for="first_name">Descripción</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name" type="number" class="validate" required name="Valor" value="<?php echo $producto[4] ?>">
                            <label for="first_name">Valor</label>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name" type="number" class="validate" required name="Cant" value="<?php echo $producto[5] ?>">
                            <label for="first_name">Cantidad</label>
                        </div>
                    </div>  
                   <button name="accion" value="u" id="boton" class="btn waves-effect">Actualizar</button>
                  <a href="Gestion_Producto_admin.php" id="boton" class="btn waves-effect  blue-grey darken-2" >Cancelar</a>
                <?php echo @$_REQUEST["$mensaje"]; ?>            
            </form>
            </div>
        </div></center>
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