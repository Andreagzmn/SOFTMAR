<!DOCTYPE html>
<html>
<head>
	<title>Formulario</title>
  <meta charset="utf-8"/>
   <link type="text/css" rel="stylesheet" href="estilos.css">
  <title>Registrar usuario</title>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
</head>
<body >
  <!--<section class="contenedor">
  <img class="logoregis" class="bg-principal contenido col-6-s" src="img\SOFTMAR.png">
  <H5 id="crea">CREA UNA CUENTA</H5>
  </section>-->
  <div class="container">
    <div ="row">
          <div class="col l8 offset-l2 center">
        	<form action="../Controller/Usuariocontroller.php" method="POST" class="z-depth-4 formulario" >
            <section id="formulario">
              
              <h3 style="text-align:center;
                ">Registrarse</h3>
              <div class="col l6  input-field form center">
                <div class="row">
                    <div class="input-field col s12">
                      <input id="Numero" type="text" class="validate" name="cod_rol">
                      <label for="Numero">Número de rol</label>
                    </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="Nombre" type="text" class="validate" name="nombre">
                    <label for="Nombre">Nombre</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="Apellido" type="email" class="validate" name="apellido">
                    <label for="Apellido">Apellido</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="Dir" type="email" class="validate" name="direccion">
                    <label for="Dir">Direccion</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="edad" type="email" class="validate" name="edad">
                    <label for="edad">Edad</label>
                  </div>
                </div>  
                <div class="row">
                  <div class="input-field col s12">
                    <input id="contra" required type="email" class="validate" name="clave">
                    <label for="contra">Contraseña</label>
                  </div>
                </div> 
                <div class="row">
                  <div class="input-field col s12">
                    <input id="Correo" type="email" class="validate" name="correo">
                    <label for="Correo">Correo</label>
                  </div>
                </div> 
                <div class="row">
                  <div class="input-field col s12">
                    <input id="Cc" type="email" class="validate" name="cedula">
                    <label for="Cc">Cedula</label>
                  </div>
                </div>         
                  		
          		<button id="boton" class="btn waves-effect #212121 grey darken-4" type="submit" type="submit" name="accion" value="c">Registrarse</button>
              <?php echo @$_REQUEST["msn"]; ?>
            </section>       
        	</form>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.js"></script>
</body>
</html>
<!--<label>Foto:</label>
<input type="text" name="foto">
 <br>
 <br>-->

 