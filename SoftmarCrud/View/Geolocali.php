<?php
  session_start();

  require_once("../Model/db_conn.php");
  require_once("../Model/tipo_Empresa.class.php");
  require_once("../Model/empresa.class.php");

  if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/Index.php?m=".$msn."&tm=".$tipo_msn);
  }

  if(isset($_GET["eid"])){
    $TipEmpresa = $_GET["eid"];
    $empresas = Gestion_Empresa::ReadbyTipEmp($TipEmpresa);
  }else{
    $empresas = Gestion_Empresa::ReadAll();
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
  <title></title>

  <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="Jquery/gmaps.js"></script>
  <script>
    $(document).ready(function(){
      $("#tipoempresa").change(function(){ 
        var eid = $("#tipoempresa").val();
        location.href = "Geolocali.php?eid="+eid;
    });
    
    var map;
    $('select').material_select();
    
        var map = new GMaps({
        div: '#map',
        lat: 6.244203,
        lng: -75.58121189999997,
        zoom: 10
      });
        
      <?php
        foreach ($empresas as $row) {
            
            echo "map.addMarker({ 
                    lat: ".$row["Geo_x"].",
                    lng: ".$row["Geo_y"].",
                    title: '".$row["Nombre"]."',
                    click: function(e) {
                      location.href='../View/PerfilEm.php?ei=".base64_encode($row["Cod_Emp"])."';
                    }
                  });";
        }
      ?>  
 
      GMaps.geolocate({
        success: function(position){
          map.setCenter(position.coords.latitude, position.coords.longitude);
          map.addMarker({
            lat: position.coords.latitude,
            lng: position.coords.longitude,
            title: 'Este sos vos'
          });


          $("#btn").click(function(){
            map.drawRoute({
              origin: [position.coords.latitude, position.coords.longitude],
              destination: [6.181814216283209, -75.60323774814606],
              travelMode: 'driving',
              strokeColor: '#131540',
              strokeOpacity: 0.6,
              strokeWeight: 6
            });
        
        });
      },
        not_supported: function(){
          alert("Su navegador no soporta el geolocalizador");
        }
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
      <select name="tipoempresa" id="tipoempresa">
      <option value='' disabled selected>Escoger una opción</option>
      <?php

        $tipo_Empresa = Gestion_Tipo_Empresa::ReadAll();

        $x = 1;
        foreach ($tipo_Empresa as $row) {

          if(isset($_GET["eid"])){
             if($row[0] == $_GET["eid"]){
                $select = "selected"; 
             }else{
                $select = ""; 
             }
          } 
          echo "<option value='".$row[0]."' $select>".$row[1]."</option>";
        }
      ?>
      </select>  
      </form>
      <form>
        <!-- <div class="input" style="margin-top: 20px;">
          <input type="text" id="address" name="address" placeholder="¿Qué Buscas?"/>
          <input type="submit" class="btn" value="Buscar" style="width: 100%;" />
        </div> -->
        <div> <br>
          <?php
            if(count($empresas) > 0){
              echo "Se ha encontrado ".count($empresas)." registros";
            }

          ?><br>
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