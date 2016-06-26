<?php
 session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");

   if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/Index.php?m=".$msn."&tm=".$tipo_msn);
  }
  require_once("../Model/oferta.class.php");
    $oferta =  Gestion_oferta::ReadbyID(base64_decode($_REQUEST["of"]));
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
  <center><div class="containact">
    <h4 class="teal-text text-teal lighten-3 test">Actualizar</h4>
    <div class="row formu">
      <form class="col s12" action="../Controller/oferta.controller.php" method="POST">
        <div class="row">
          <input type="hidden" readonly name="Cod_ofer" required value="<?php echo $oferta[0] ?>">
          <input type="hidden" readonly name="Cod_Emp" required value="<?php echo $oferta[1] ?>">
          <div class="row">    
            <div class="input-field col s12">
              <input id="last_name" type="text" class="validate" required name="Nombre" value="<?php echo $oferta[2] ?>">
              <label for="last_name">Nombre de la oferta</label>
            </div>
           </div> 
           <div class="row">   
             <div class="input-field col s12">
               <input id="first_name" type="text" class="validate" required name="Descripcion" value="<?php echo $oferta[3] ?>">
               <label for="first_name">Descripción</label>
             </div>
           </div>
            <div class="input-field col s6 m4">
              <select name="Estado" required  value="<?php echo $Estado[4] ?>">
                <option>Disponible</option>
                <option>No Disponible</option>
              </select>
              <label>Estado</label>
            </div>
            <div>  
            <div class="row">
              <div class="input-field col s12">
                <input id="first_name" type="text" class="validate" required name="Foto" value="<?php echo $oferta[5] ?>">
                <label for="first_name">Foto</label>
              </div>
            </div>                    
            <div class="row">
              <div class="input-field col s12">
                <input id="first_name" type="text" class="validate" required name="Categoria" value="<?php echo $oferta[6] ?>">
                <label for="first_name">Categoria</label>
              </div>
            </div> 
            <div class="row">
              <div class="input-field col s12">
                <input id="first_name" type="number" class="validate" required name="Oferta" value="<?php echo $oferta[7]?>">
                <label for="first_name">Oferta disponibles</label>
              </div>
            </div> 
            <button name="accion" value="u" id="boton" class="btn waves-effect" style="margin: 20px;">Actualizar</button>
            <a href="Gestion_Oferta_admin.php" id="boton" class="btn waves-effect" style="margin: 20px;" >Cancelar</a>
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
</body>
</html>