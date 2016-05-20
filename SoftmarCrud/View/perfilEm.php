<?php
 session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");

   if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/Index.php?m=".$msn."&tm=".$tipo_msn);
  }
   require_once("../Model/empresa.class.php");
   $informacion = Gestion_Empresa::ReadAll();
   
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
	<title>Perfil</title>

</head>
<body>
 <nav class="black">
      <div class="nav-wrapper " style="margin-left: 5px; margin-right: 5px;">
        <h2 href="#!" class="brand-logo" style="text-align:center; margin-top: 10px; "><!-- <img src="img/SOFTMAR.png" style="width: 500%; margin-top: -15px; position: relative;"> -->Softmar</h2>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <?php include_once("../View/comp.menu.php"); ?>
     </div>
  </nav>
	<div class="container-fluid">
		<center><div class="slider">
		    <ul class="slides">
		    <!--   <?php

		      // $fotos = Gestion_Empresa::ReadAll();

		      // foreach ($fotos as $row) {
		      ?>

		      <li>
		        <img src="img/<?php //echo $row["Foto1"].$row["Foto2"].$row["Foto3"].$row["Foto4"] ?>">
		      </li>

		      <?php
		        // }
		      ?> -->
		      <li>
		      	<img src="img/3.jpg">
		      </li>
		      <li>
		      	<img src="img/4.jpg">
		      </li>
		    </ul>

  		</div></center>
  		<div id="menu-empresa" class="row">
	  		<div class="black col s3">
	  			<ul>
	  				<li><a href="" class="list">Productos y servicios</a></li>
	  				<li><a href="" class="list">Citas disponibles</a></li>
	  				<li><a href="" class="list">Ofertas</a></li>
	  				<li><a href="" class="list">Tips</a></li>
	  				<li><a href="" class="list">Contactos</a></li>
	  			</ul>
	  		</div>
	  		<div class="col s9 bgcontent">
	  		<?php
		      foreach ($informacion as $text) {
		        echo "<h3>".$text["Nombre"]."</h3>
		        		<p>".$text["Informacion"]."</p>";
		      }
		      ?>
	  		</div>
  		</div>
	</div>
 <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
 <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
 <script >
		$(document).ready(function(){
	      $('.slider').slider({
	      	Height:400,
	      	Transition: 500,
	      	Interval: 600,
	      	Indicators: false
	      });
	    });
	</script>
</body>
</html>