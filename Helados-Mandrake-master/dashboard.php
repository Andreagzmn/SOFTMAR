<?php
  session_start();

  if(!isset($_SESSION["id"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: index.php?m=".$msn."&tm=".$tipo_msn);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Bienvenido Amado <?php echo $_SESSION["nombre"];  ?></h1>
    <a href="cerrarsesion.php">cerrar sesion</a>
    <nav>
      <?php include_once("comp.menu.php"); ?>
    </nav>
  </body>
</html>
