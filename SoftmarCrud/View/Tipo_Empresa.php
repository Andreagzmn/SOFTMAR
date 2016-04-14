<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
   <link type="text/css" rel="stylesheet" href="estilos.css">
  <title>Añadir tipo empresa</title>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
</head>
<body >
  <div class="container">
    <div ="row">
          <div class="col s12 l8  ">
          	<form action="../Controller/Tipo_empresa.controller.php" method="POST" class="col s12 m8 offset-l8 z-depth-4 formulario " id="formulario" >
              <section class="col s12" > 
                <h3  style="text-align:center; margin-top:20px;">Añade un tipo de empresa</h3>
                <div class="col l6 s12 input-field form center" >
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="Nombre" type="text" class="validate" name="Nombre" required>
                      <label for="Nombre">Nombre</label>
                    </div>
                  </div>     
               </div>
               <button type="submit" name="accion" value="c" id="boton" class="btn waves-effect blue darken-3" ><i class=" material-icons right">done</i>Añadir</button>
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