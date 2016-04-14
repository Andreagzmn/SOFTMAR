<?php
  session_start();
  require_once("conn.php");
  require_once("class.usuario.php");

  if(!isset($_SESSION["id"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: index.php?m=".$msn."&tm=".$tipo_msn);
  }

  $usuario = Gestion_Usuarios::ReadbyId(base64_decode($_REQUEST["ui"]));
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form>
        <label>Codigo</label>
        <input type="text" readonly name="id" required value="<?php echo $usuario[0] ?>">

        <label>Nombre</label>
        <input type="text" name="nombre" required value="<?php echo $usuario[4] ?>">

        <label>Clave</label>
        <input type="password" name="clave"  value="<?php echo $usuario[2] ?>">

        <label>Correo</label>
        <input type="email" name="correo" value="<?php echo $usuario[1] ?>">

        <label>Perfil</label>
        <select name="perfil">


          <option value="1" <?php if($usuario["perfil"] == 1){ echo "selected"; } ?>>Administrador</option>
          <option value="2" <?php if($usuario["perfil"] == 2){ echo "selected"; } ?>>Visitante</option>
        </select>
        <button name="button">Actualizar</button>
        <a href="gestion_usuarios.php">Cancelar</a>
    </form>
  </body>
</html>
