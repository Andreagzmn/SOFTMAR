<!-- Menu Administrador = perfil 1 -->
<?php
if($_SESSION["perfil"]==1){
?>

<ul>
  <li><a href="index.php">Inicio</a></li>
  <li><a href="gestion_usuarios.php">Gestion Usuario</a></li>

  <li>Permisos</li>
  <li>Usuarios</li>
  <li>Clientes</li>
</ul>


<?php
}elseif($_SESSION["perfil"]==2){
?>

<!-- Menu Cliente = perfil 2 -->
<ul>
  <li>Inicio</li>
</ul>
<?php
}
?>
