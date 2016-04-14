<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">      
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>      
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <link rel="stylesheet" type="text/css" href="estilos.css">

</head>
<body>
<form   action="../Controller/Usuariocontroller.php" method="POST" name="myform" novalidate>
	<div class="con">
		<div class="tarjeta">		    
      <div class="row">

            <div class="col s12 m7  offset-m2 l4 offset-l4 z-depth-4 formulario center">

              <a href="Registrar_Usuario.php" id="btn-crear-cuenta" class="waves-effect waves-light btn right blue-grey lighten-1 ">Crea una cuenta</a>
              <div class="card-content white-text" >                  		
                  
                    	<div class="card-image">
                      
              				  <img src="img/SOFTMAR.png" class="imgi">                                              
            	  		  </div>
                          <div class="row">
                            <div class="input-field col s12">
                                <input id="Correo" type="text" class="validate" required name="correo">
                                <label for="Correo">Correo electrónico</label>
                            </div>
                            <div class="input-field col s12">
                              <input id="Contraseña" type="password" class="validate" required name="clave">
                              <label for="Contraseña">Contraseña</label>                              
                              <button  class="waves-effect waves-light  cyan darken-3 btn btn-large" style="width: 100%" name="accion" value="r" >Iniciar sesión</button>    
                               
                            </div>                              
                              <div>
                                <a href="#modal1" class="lostpass waves-effect waves-light modal-trigger"  >¿Olvidaste la contraseña?</a>
                              </div>
                                <div id="modal1" class="modal">
                                  <div class="modal-content">                                    
                                    <h4>Recupera tu cuenta</h4>
                                    <p>Ingresa tu correo electrónico </p> 
                                    <div class="input-field col s12">                                                                       
                                      <input id="Correo2" type="text" class="validate" required>
                                      <label for="Correo2">Correo electrónico</label>
                                    </div>
                                    <p>En breves instantes te enviaremos un enlace al correo ingresado</p>
                                  </div>
                                  <div class="modal-footer">
                                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                                  </div>
                                </div>                                
                                                            
                          </div>                          
        		
                       
        		  </div>
        	 </div>
      </div>
    </div>                        
	</div>     
</form>
  <?php
   if( base64_decode(@$_GET["tm"]) == "advertencia"){
                      $estilos = "orange";
  }else{
    $estilos = "red";
  }

echo "<div style='background-color:".$estilos."'>".base64_decode(@$_GET["m"])."</div>";?>
	  <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){    
        $('.modal-trigger').leanModal();

      });

    </script>

</body>
</html>
