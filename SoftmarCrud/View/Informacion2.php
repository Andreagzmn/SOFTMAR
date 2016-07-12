

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
	<title>Informacion SOFTMAR</title>
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
      	<div class="col s12 m12 center">
      	<img src="img/SOFTMAR.png" class="login">
	      	<p>Las peluquerías cuentan con una gran variedad de herramientas para sus diferentes servicios
           y trabajos para con el cliente o para sus empleados. Sus útiles principales son aquellos 
           instrumentos con los que se realizan las tareas otorgadas por el cliente como peinados, 
           cortes, cepillado… entre otros. Los útiles auxiliares son objetos que se emplean como protección 
           es decir guantes, gorros, toallas, entre otros. Los útiles de laboratorio son aquellos materiales 
           que se emplean para hacer mezclas de sustancias químicas como recipientes de vidrio, papel 
           tornasol.
            La aparatología es un conjunto de aparatos diseñados para la realización de las
             técnicas de peluquería como secadores, esterilizadores, entre otros. 
          </p>
	      	<p>Con que las peluquería, barberías y salones de belleza no cuentan es
             con un software que le permita a la peluquería y al estilista una 
             facilidad de trabajo, es decir, que dicha peluquería muestre el 
             cronograma de atención y disponibilidad con el requerimiento, 
             para que no sea necesario que el cliente llame a todas las peluquerías 
             para que le den un turno, el propósito seria que esto mostrara fecha, hora,
              día que están disponibles en las diferentes peluquerías que usen nuestro 
              software, para que el cliente tenga varias opciones de elegir de acuerdo a 
              su disponibilidad de tiempo.</p>
	      	<p><br><br><br>

	      	<em>copyright softmar 2016 todos los derechos reservados</em>
	      </p>
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