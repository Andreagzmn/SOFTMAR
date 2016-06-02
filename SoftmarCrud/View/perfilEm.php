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

   if(isset($_GET["ei"])){
      $ei =  base64_decode($_GET["ei"]);
   }else{
      $ei = $_SESSION["Cod_Emp"];
   }
   
   $informacion = Gestion_Empresa::ReadbyID($ei);
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
		<div class="slider">
		    <ul class="slides">
			  <?php
 				
  			 $fotos = explode(",", $informacion["Galeria"]);
  			 $nombre_empresa = strtolower(str_replace('ñ', 'n', $informacion["Nombre"]));
			 $nombre_empresa = strtolower(str_replace(' ', '', $nombre_empresa));

  			 $directorio = "img/Imagenes_Empresas/".$nombre_empresa."/";
  			 
  			 for ($i=0; $i < count($fotos) ; $i++) {
  			 	$foto = str_replace(' ', '', $fotos[$i]);
  			 	echo "<li><img src='img/Imagenes_Empresas/".$nombre_empresa."/".$foto."'><div class='caption left-align'>
          			<h4 class='nombr'><span>".$informacion['Nombre']."</span></h4>
        			</div></li>";
  			 }
 
		     ?>
		    </ul>
  		</div>
  	</div>
  		<header class="container sub-menu">
        <center><nav class=" nava grey darken-1">
			    <div class="nav-wrapper">
			      <ul id="nav-mobile" class="center hide-on-med-and-down " >
			        <li><a href="#">Productos y servicios</a></li>
			        <li><a href="#">Citas</a></li>
			        <li><a href="#">Ofertas</a></li>
			        <li><a href="#">Contacto</a></li>
			      </ul>
			    </div>
			  </nav></center>
        </header>
      <div class="container-fluid ">
        <div class="row">
  	  		<?php
  		         echo "
               <div class='log col s6 m3'><img src='img/Imagenes_Empresas/".$nombre_empresa."/logo.png'></div>
               <div class='col s6 m9 bgcontent'>
               <h4>".$informacion["Nombre"]."</h4>
  		         <p>".$informacion["Informacion"]."</p>
  		         <p>Dias de atencion ".$informacion["Dias_aten"]."</p>
               <p>".$informacion["Telefono"]."</p>
               <p>".$informacion["Correo"]."</p> 
               <p>".$informacion["Direccion"]."</p>
               </div>";
  		      ?>
          </div>
      </div>

 <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
 <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
 <script >
  
		$(document).ready(function(){
	     $('.slider').slider({
	      	Height:400,
	      	Transition: 400,
	      	Interval: 400,
	      	Indicators: false
	     });
	   });
	</script>
</body>
</html>