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
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster"/>
    
    <link type="text/css" rel="stylesheet" href="estilos.css"> 

<head>
	<title>Contácto SOFTMAR</title>
</head>
<body>
  <nav class="black">
      <div class="nav-wrapper " style="margin-left: 5px; margin-right: 5px;">
        <h2 href="#!" class="brand-logo" style="text-align:center; margin-top: 10px; "><!-- <img src="img/SOFTMAR.png" style="width: 500%; margin-top: -15px; position: relative;"> -->Softmar</h2>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <?php include_once("../View/comp.menu.php"); ?>
     </div>
   </nav>
  <div class="inf-conte">
    <div class="row forma">
        <div class="col s12 center">
        <img src="img/SOFTMAR.png" class="login">
          <p><br><br>Dirección<hr>Celular<hr>Correo eletrónico<hr>Integrantes<br></p>
      </div>
  </div>
  </div>
    <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){    
         $(".button-collapse").sideNav();
         $(".dropdown-button").dropdown();
      });
    </script>
    <?php include_once("../View/pie_pagina.php"); ?>
</body>
</html>