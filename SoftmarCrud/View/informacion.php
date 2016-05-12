<?php
  session_start();

  if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/Index.php?m=".$msn."&tm=".$tipo_msn);
  }
?>

<!doctype html>
<html>
<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster"/>
<head>
	<title>Informacion SOFTMAR</title>
</head>
<body>
  <nav class="black">
      <div class="nav-wrapper " style="margin-left: 5px; margin-right: 5px;">
        <h2 href="#!" class="brand-logo" style="text-align:center; margin-top: 10px; "><!-- <img src="img/SOFTMAR.png" style="width: 500%; margin-top: -15px; position: relative;"> -->Softmar</h2>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <?php include_once("../View/comp.menu.php"); ?>
     </div>
   </nav> 
	<div class="conte">
    <div class="row formulario">
      	<div class="col s12 center">
      	<img src="img/SOFTMAR.png" class="login">
	      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	      	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	      	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	      	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	      	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	      	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	      	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	      	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	      	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	      	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	    </div>
	</div>
	</div>
	<?php include_once("../View/pie_pagina.php"); ?>
<script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
</body>
</html>