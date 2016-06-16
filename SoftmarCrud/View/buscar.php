<?php
  session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");


  if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/Index.php?m=".$msn."&tm=".$tipo_msn);
  }
  require_once ("../Model/empresa.class.php")
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">   
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>      
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="sweetalert-master/sweetalert.css">
    <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>

    <script type="text/javascript" src="materialize/js/materialize.js"></script>
    <script type="text/javascript" src="sweetalert-master/sweetalert.min.js"></script>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="estilos.css">    
    <script type="text/javascript" src="ajax.js"></script>


      
   </head>
  <body>
  <nav class="black">
      <div class="nav-wrapper " style="margin-left: 5px; margin-right: 5px;">
        <h2 href="#!" class="brand-logo" style="text-align:center; margin-top: 10px; "><!-- <img src="img/SOFTMAR.png" style="width: 500%; margin-top: -15px; position: relative;"> -->Softmar</h2>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <?php include_once("../View/comp.menu.php"); ?>
     </div>
  </nav> 
  <div class="container cbus">
    <div class="form">
      <form action="" method="POST" name="bus" id="bus">
        <input type="text"  name="search" id="search">
      </form>
    </div>
    <div id="myDiv"></div>
  </div>
</body>
</html>