

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
 <nav id="menufixed" class="black">
      <div class="nav-wrapper " style="margin-left: 5px; margin-right: 5px;">
        <h3 href="#!" class="brand-logo" style="text-align:center; margin-top: 10px; "><!-- <img src="img/SOFTMAR.png" style="width: 500%; margin-top: -15px; position: relative;"> -->Softmar</h3>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
         <ul class="right hide-on-med-and-down">
         <li><a href="Index.php">Iniciar sesión</a></li>
          <li><a href="Informacion2.php">Informacion acerca de softmar</a></li>
          <li><a href="contacto2.php">Contactanos</a></li>
          <li><a href="">¡Facilidad para tu vida y negocio!</a></li>                 
       </ul> 
     </div>
      <ul class="side-nav" id="mobile-demo">
  <li><a href="Index.php">Iniciar sesió</a></li>
    <li><a href="Informacion2.php">Informacion acerca de softmar</a></li>
    <li><a href="contacto2.php">Contactanos</a></li>
    <li><a href="">¡Facilidad para tu vida y negocio!</a></li>
  </ul> 
</nav>
  <center><div class="inf-conte">
    <div class="row forma">
        <div class="contac" class="col s12 center">
        <center><img src="img/SOFTMAR.png" class="login"></center>
          <br><br><p><strong>Dirección</strong></p><br><em>Cl. 64 #63, Las Americas, Itagüi, Antioquia.</em><br><br><hr width="55%" color="grey">
          <br><br><p><strong>Teléfono</strong></p><br><em>3-02-221-94-93</em><br><br><hr width="55%" color="grey">
          <br><br><p><strong>Email</strong></p><br><em>softmar@gmail.com</em><br><br><hr width="55%" color="grey"><br><br>
      </div>
  </div>
  </div></center>
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