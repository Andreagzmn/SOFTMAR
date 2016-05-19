<!DOCTYPE html >
<html>
<head>
  
  <meta charset="utf-8"/>
   <link type="text/css" rel="stylesheet" href="estilos.css">
  <title>Registrar usuario</title>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster" />
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body >
  <!--<section class="contenedor">
  <img class="logoregis" class="bg-principal contenido col-6-s" src="img\SOFTMAR.png">
  <H5 id="crea">CREA UNA CUENTA</H5>
  </section>-->
  <center><div class="container">         
    <h3  style="text-align:center; margin-bottom: -47px; ">Softmar</h3>
      <form action="../Controller/Usuariocontroller.php" method="POST" class="col s12 m8 offset-l8 z-depth-4 formulario " id="formulario" >
        <section class="col s12" >                
          <div class="col l6 s12 input-field form center">
            <div class="row">
                <div class="input-field col s12"> 
                  <select name="cod_rol">
                    <option value="" selected>Seleccione un tipo de usuario</option>
                    <option value="102">Cliente</option>
                    <option value="101">Dueño de Local</option>
                    <option value="103">Administrador</option>
                  </select>

                </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="Cc" type="number" class="validate" name="cedula" required>
                <label for="Cc">Documento de identidad*</label>
                <span id="resultadobusqueda" class="red-text accent-3 left"> </span>
              </div>
            </div>
            <div id="last">
            <div class="row">
              <div class="input-field col s12">
                <input id="Nombre" type="text" class="validate" name="nombre" required>
                <label for="Nombre">Nombre</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="Apellido" type="text" class="validate" name="apellido" required>
                <label for="Apellido">Apellido</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="Dir" type="text" class="validate" name="direccion" required>
                <label for="Dir">Direccion</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                 <input id="edad" type="number" class="validate" name="edad" required>
                <label for="edad">Edad</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="contra" required type="password" class="validate" name="clave" >
                 <label for="contra">Contraseña</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="Correo" type="email" class="validate" name="correo" required>
                <label for="Correo">Correo</label>
              </div>
            </div>
            <div class="buttons">    
            <button type="submit" name="accion" value="c" id="boton" class="btn waves-effect  cyan darken-3" id="btn-crear-cuenta">Registrarse</button>
            </div>
            </div>
            <a href="Gestion_Usuario_admin.php" id="boton" class="btn waves-effect  blue-grey darken-2  " id="btn-crear-cuenta">Cancelar</a>
          <?php echo @$_REQUEST["$mensaje"]; ?>
        </section>
      </form>     
   </div></center>

  <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.js"></script>
  <script>
    $(document).ready(function() {
      $('select').material_select();
    });

  </script>
  <script>
    $(document).ready(function() {
      $('select').material_select();

      $("#Cc").keyup(function(){
          var cedula = $("#Cc").val();
          var accion = "existe_usuario";

          $.post("../Controller/Usuariocontroller.php", {cedula: cedula, accion: accion}, function(result){

              $("#resultadobusqueda").html(result.msn); 

              if(result.ue == true){ 
                $("button").prop("disabled",true);
                $("#last").addClass("hide");
              }

              if(result.ue == false){ 
                $("button").prop("disabled",false);
                $("#last").removeClass("hide");
              }
          }, "json");
      });


    });

  </script>
</body>
</html>