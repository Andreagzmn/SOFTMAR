<?php
  session_start();

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
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster" />
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="flexboxgrid.min.css">
    <link type="text/css" rel="stylesheet" href="estilos.css">  
  </head>
  <body>
    <nav id="menufixed" class="black">
      <div class="nav-wrapper " style="margin-left: 5px; margin-right: 5px;">
        <h3 href="#!" class="brand-logo" style="text-align:center; margin-top: 10px; "><!-- <img src="img/SOFTMAR.png" style="width: 500%; margin-top: -15px; position: relative;"> -->Softmar</h3>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <?php include_once("../View/comp.menu.php"); ?>
     </div>
    </nav>
     <section class="dashbo-pel" class="contenido">
      <div class="container-fluid centr">
        <div class="row hover">
          <div  class="thumb col-xs-6" id="gran">
          <!-- <div id="prim">
            <h3><span>Peluqueria</span></h3>
          </div> -->
            <a href="buscar.php"><img  src="img/peluquerias.jpg" alt=""></a>
          </div>
          <div class="thumb col-xs-3">
          <!-- <div id="seg">
            <h5><span>Infantil</span></h5> 
          </div> -->
            <a href="buscar.php"><img src="img/infantil.jpg" alt=""></a>
            <!-- <div id="ter">
              <h5><span>Spa</span></h5> 
            </div> -->
            <a href="buscar.php"><img src="img/spa.jpg" alt=""></a>   
          </div>
          <div class="thumb col-xs-3">
          <!-- <div id="cuar">
            <h5><span>Barberia</span></h5> 
          </div> -->
            <a href="buscar.php"><img src="img/barberia.jpg" alt=""></a>
            <!-- <div id="quin">
              <h5><span>estilo</span></h5>
            </div> -->
            <a href="buscar.php"><img src="img/estilo.jpg" alt=""></a>
          </div>
        </div>
    </div>
    </section>
    <!-- <div class="conte">
      <div class="row imgn hover">
        <div>
          <div  class="col ">
            <a href="Geolocali.php"><img src="img/peluquerias.jpg" class="imgn"/></a>
            
          </div>
        </div>
        <div class="col">
          <div  class="inf ">
            <a href="Geolocali.php"><img src="img/infantil.jpg" class="imgn"></a>            
                         
          </div>
          <div  id="barberia" class="bar col ">
            <a href="Geolocali.php"><img src= "img/barberia.jpg" class="imgn"></a>           
                        
          </div>
          <div id="spa" class="inf2 col ">
            <a href="Geolocali.php"><img src="img/spa.jpg" class="imgn"></a>           
                       
          </div>
          <div id="estilo" class="bar2">
            <img src="img/estilo.jpg" class=" imgn" >           
                         
          </div>
        </div>
      </div>
    </div> -->
  <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.js"></script>
   <script type="text/javascript">
      $(document).ready(function(){    
         $(".button-collapse").sideNav();
         $(".dropdown-button").dropdown();
      });
    </script>
    <?php include_once("../View/pie_pagina.php"); ?>
  </body>
</html>