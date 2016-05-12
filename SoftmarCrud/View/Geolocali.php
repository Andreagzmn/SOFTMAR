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
  <link type="text/css" rel="stylesheet" href="estilos.css">  
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster" />
  <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
  <title>GMaps.js &mdash; Geolocation</title>

  <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="Jquery/gmaps.js"></script>
  <script>
    $(document).ready(function(){
      new GMaps({
        div: '#map',
        lat: -12.043333,
        lng: -77.028333
      });
    });  
  </script>
</head>
<body> 
  <nav class="black">
      <div class="nav-wrapper " style="margin-left: 5px; margin-right: 5px;">
        <a href="#!" class="brand-logo"><img src="img/SOFTMAR.png" style="width: 500%; margin-top: -15px; position: relative;"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons"></i></a>
        <?php include_once("../View/comp.menu.php"); ?>
     </div>
  </nav> 


  <div class="container-fluid">
    <div class="row opt" style="margin-bottom: 0;">
      <div class="col s2" style="margin-top: 20px;">
      <form action="#">
         <p style="margin-top: 20px;">
          <input name="group1" type="radio" id="test1" />
          <label for="test1">Barberias</label>
        </p>
        <p style="margin-top: 20px;">
          <input name="group1" type="radio" id="test2" />
          <label for="test2">Peluquerias</label>
        </p>
        <p style="margin-top: 20px;">
          <input name="group1" type="radio" id="test3" />
          <label for="test3">Peluquerias infantiles</label>
        </p>
        <p style="margin-top: 20px;">
          <input name="group1" type="radio" id="test4" />
          <label for="test4">Spa</label>
        </p>
      </form>
      <form>
        <div class="input" style="margin-top: 20px;">
          <input type="text" id="address" name="address" placeholder="¿Qué Buscas?"/>
          <input type="submit" class="btn" value="Buscar" style="width: 100%;" />
        </div>
      </form>
    </div>
      <div class="col s10" style="padding: 0;">
        <div id="map"></div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="materialize/js/materialize.js"></script>
</body>
</html>