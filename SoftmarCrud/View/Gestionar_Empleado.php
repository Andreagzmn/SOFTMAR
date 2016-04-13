<!DOCTYPE html>
<html>
<head>
  <title>Gestionar</title>
  <meta charset="utf-8"/>
   <link type="text/css" rel="stylesheet" href="estilos.css">
  <title> Gestionar Empleado</title>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
</head>
<body  background="img\SOFTMAR.jpg">
  
  <div class="container">
    <div class="row">
  <form action="../Controller/Empleados.controller.php" method="POST" class="col s12 m8 offset-m2 l6 offset-13 z-depth-4 formulario" >
    <section id="Gestionar">
      
      <h3 style="color:#8B8B8B; font-family:fantasy; box-shadow:0 10px 4px -6px #999; text-align:center;">Gestionar Empleado</h3>
      <!--<label>Codigo Empleado</label>
      <input type="text" name="Cod_Empleado">
      <br>-->
      <br>
      <label>Codigo Empresa</label>
      <input type="text" name="Cod_Emp">
      <br>
      <br>      
      <label>Nombre:</label>
      <input type="text" name="Nombre">
      <br>
      <br>
      <label>Apellido</label>
      <input type="text" name="Apellido">
      <br>
      <br>     
      <label>Direccion</label>
      <input type="text" name="Direccion">
      <br>
      <br>
      <!--<label>Foto:</label>
      <input type="text" name="foto">
      <br>
      <br>-->
      <label>Telefono</label>
      <input type="number" name="correo">
      <br>
      <br>
      <label>Edad</label>
      <input type="number" name="Edad">
      <br>
      <br> 
      <label>Correo Empleado</label>
      <input type="text" name="Email">
      <br>
      <label>Cargo Empleado</label>
      <input type="text" name="Cargo">
      <br>
      
      <button type="submit" name="accion" value="c" id="boton" class="btn waves-effect blue darken-3" ><i class=" material-icons right"></i>Registrar Empleado</button>
                <?php echo @$_REQUEST["msn"]; ?>
    </section>
    
  </form>
  <script type="text/javascript" src="jquery-1.12.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.js"></script>
</body>
</html>



                       
                       
      