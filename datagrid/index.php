<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="validausuario.controller.php" method="post">
        <label>Correo Electronico</label>
        <input type="email" required name="txt_email">
        <label>Contraseña</label>
        <input type="password" required name="txt_clave">
        <button>Guardar</button>
    </form>

    <?php
      if( base64_decode(@$_GET["tm"]) == "advertencia"){
        $estilos = "orange";
      }else{
        $estilos = "red";
      }

    echo "<div style='background-color:".$estilos."'>".base64_decode(@$_GET["m"])."</div>";?>
  </body>
</html>
