<?php
 session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");

   if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/Index.php?m=".$msn."&tm=".$tipo_msn);
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Nosotros</title>
<meta charset="utf-8" />
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster"/>
    
    <link type="text/css" rel="stylesheet" href="estilos.css"> 
</head>
<body>
	 <nav id="menufixed" class="black">
      <div class="nav-wrapper " style="margin-left: 5px; margin-right: 5px;">
        <h2 href="#!" class="brand-logo" style="text-align:center; margin-top: 10px; "><!-- <img src="img/SOFTMAR.png" style="width: 500%; margin-top: -15px; position: relative;"> -->Softmar</h2>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <?php include_once("../View/comp.menu.php"); ?>
     </div>
    </nav> 
    <section class="datagrid">
<center><div class="conteno">
    <div class="row formulario">
      	<div class="col s12 push-s12 m12">
	      	<h5 class="pink-text text-purple lighten-2 center-align ">Misión</h5>
	      		<p><b>Lograr un equipo comprometido y motivado a mejorar los procesos 
	      			funcionales en una peluquería, barbería o salon de belleza y a los 
	      			cambios del negocio sistematizando los procesos relevantes y 
	      			aumentando nuestra participación en el segmento de pequeñas y medianas empresas. 
	      			Y consolidarnos como unos estudiantes emprendedores reconocidos por su alto grado
	      			de satisfacción de clientes en la oferta de soluciones integrales de tecnología,
	      			que contribuyan con el desarrollo de la competitividad en nuestro país.</b></p>
	      	<br>
	      	<h5 class="pink-text text-purple lighten-2 center-align">Vision</h5>
		      	<p><b>Nuestra motivación es posicionarnos como una empresa que 
		      		brinda servicios tecnológicos para contribuir a la gestión 
		      		de negocios de nuestros clientes, generando valor en sus procesos 
		      		administrativos y en la toma de decisiones a través del uso de tecnología
		      		de punta. Nuestro compromiso nos permite desarrollar e implementar 
		      		exitosamente soluciones de gestión empresarial y servicios tecnológicos</b></p>
	     </div>
      	<div class="col s12 pull-s12 m12 quienes" >
			<h5 class="pink-text text-purple lighten-2 center-align " >¿Quienes somos?</h5>
		  		<p><b>
			    <br>
			    <br>Somos un grupo de estudiantes de la tecnología análisis y desarrollo de
			    sistemas de información, Un grupo de emprendedores joven y dinámico que entiende 
			    la creación de sistemas de calidad como el fundamento del futuro de Internet. 
			    queremos que sean muchos los visitantes a nuestro sitio en el futuro.
			    servicio de nuestros visitantes.</b></p>
		</div>
	</div>

</div></center>
</section>
<?php include_once("../View/pie_pagina.php"); ?>
<script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
</div>
</body>
</html>