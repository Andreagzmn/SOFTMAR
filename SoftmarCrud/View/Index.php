<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">      
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>      
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="sweetalert-master/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster" />
  <link rel="stylesheet" type="text/css" href="estilos.css">
      <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.js"></script>

    <script type="text/javascript" src="sweetalert-master/sweetalert.min.js"></script>
    <script type="text/javascript" src="../Controller/Validarcampos.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){    
        $('.modal-trigger').leanModal();
        <?php
          if (isset($_GET["m"]))
          {
           echo "swal('".base64_decode($_GET["m"])."','','warning');";
          }
        ?> 
      });

    </script>

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
      <li><a href="Informacion2.php">Informacion de softmar</a></li>
      <li><a href="contacto2.php">Contactanos</a></li>
      <li><a href="">¡Facilidad para tu negocio!</a></li>
    </ul> 
</nav>

<center><form   action="../Controller/Usuariocontroller.php" method="POST" >
	<div class="con" style="height: 100px;">
  </div> 
		<div class="tarjeta">		    
      <div class="row">

            <div class="col s12 m9  offset-m2 l4 offset-l4  z-depth-4 formregistrar center" id="formulario">

              <a href="Registrar_Usuario.php" id="btn-crear-cuenta" class="waves-effect waves-light btn right blue-grey lighten-1 ">Crea una cuenta</a>
              <div class="card-content black-text col s12 center" >                  		
                  
                    	<div class="card-image">
                      
              				  <img src="img/SOFTMAR.png" class="imgi">                                              
            	  		  </div>
                          <div class="row">
                            <div class="input-field col s12">
                                <input id="Correo" type="email" class="validate" required name="correo">
                                <label for="Correo">Correo electrónico</label>
                            </div>
                            <div class="input-field col s12">
                              <input id="Contraseña" type="password" class="validate" required name="clave">
                              <label for="Contraseña">Contraseña</label>                              
                              <button  class="waves-effect waves-light  cyan darken-3 btn btn-large" style="width: 100%" name="accion" value="r" >Iniciar sesión</button>    
                               
                            </div>       
                                                            
                          </div>                          
        		                      
        		  </div>
        	 </div>
      </div>
    </div>                        
	    
</form></center>
  
  

<?php include_once("../View/pie_pagina.php"); ?>
 <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.js"></script>
   <script type="text/javascript">
      $(document).ready(function(){    
         $(".button-collapse").sideNav();
         $(".dropdown-button").dropdown();
      });
    </script>
</body>
</html>
