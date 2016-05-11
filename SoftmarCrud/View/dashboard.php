<?php
  session_start();

  if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/login.php?m=".$msn."&tm=".$tipo_msn);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link type="text/css" rel="stylesheet" href="estilos.css">  
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster" />
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body>
    <nav class="black">
      <div class="nav-wrapper " style="margin-left: 5px; margin-right: 5px;">
        <a href="#!" class="brand-logo"><img src="img/SOFTMAR.png" style="width: 500%; margin-top: -15px; position: relative;"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <?php include_once("../View/comp.menu.php"); ?>
     </div>
    </nav>
    <div class="conte">
      <div class="row imgn hover">
        <div>
          <div class="col s6 ">
            <img src="img/peluquerias.jpg" class="imgn"/>
            <h3 class="info"><span>Peluqueria</span></h3>
          </div>
        </div>
        <div class="col s6">

          <div id="infantil" class="inf">
            <img src="img/infantil.jpg" class="imgn">
            <div >
              <h5><span>Infantil</span></h5>
            </div>
          </div>

          <div  id="barberia" class="bar">
            <img src= "img/barberia.jpg" class="imgn">
            <div>
              <h5><span>Barberia</span></h5>
            </div>
          </div>
          <div id="spa" class="inf2">
            <img src="img/spa.jpg" class="imgn">
            <div>
              <h5><span>Spa</span></h5>
            </div>
          </div>
          <div id="estilo" class="bar2">
            <img src="img/estilo.jpg" class=" imgn" >
            <div>
              <h5><span>Estilo</span></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include_once("../View/pie_pagina.php"); ?>
  <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.js"></script>
   <script type="text/javascript">
      $(document).ready(function(){    
         $(".button-collapse").sideNav();
         $(".dropdown-button").dropdown();
      });
    </script>
  </body>
</html>