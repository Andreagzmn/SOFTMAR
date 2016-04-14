<!-- Menu Administrador = perfil 1 -->
<?php
if($_SESSION["perfil"]==1){
?>

<ul>
  <li>Inicio</li>
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
  <li>Mi perfil</li>
  <li>Historial</li>
</ul>
<?php
}
?>
