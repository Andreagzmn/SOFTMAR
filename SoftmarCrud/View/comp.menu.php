<!-- Menu Administrador = perfil 1 -->

<?php
if($_SESSION["cod_rol"]==103){
?>
 
  <ul id="dropdown1" class="dropdown-content">
    <li><a href="Gestion_Usuario_admin.php">Gestionar usuario</a></li>
    <li><a href="Gestion_Empresa_admin.php">Gestionar empresa</a></li>
    <li><a href="Gestion_Servicio_admin.php">Gestionar servicio</a></li>
    <li><a href="Gestionar_Empleado.php">Gestionar empleado</a></li>
 </ul>
 <ul class="right hide-on-med-and-down">
    <li><a href="dashboard.php">Inicio</a></li>
    <li><a href="informacion.php">Información</a></li>
    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Gestionar<i class="material-icons right">arrow_drop_down</i></a></li>
   <li><a class="dropdown-button" href="#!" data-activates="dropdown2"><?php echo($_SESSION["Nombre"])." ".($_SESSION["Apellido"]) ?><i class="material-icons right">arrow_drop_down</i></a></li>
 </ul>  
<ul id="dropdown2" class="dropdown-content"> 
    <li><a href="ActualizarMiperfil.php">Editar Perfil</a></li>   
    <li><a href="../Controller/cerrarusuario.php">Cerrar sesión</a></li>
  </ul>
<?php
}elseif($_SESSION["cod_rol"]==102){
?>
<ul class="right hide-on-med-and-down">
    <li><a href="dashboard.php">Inicio</a></li>
    <li><a href="informacion.php">Información</a></li>
    <li><a href="#">Nosotros</a></li>
    <li><a href="#">Contacto</a></li>
    <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php echo($_SESSION["Nombre"])." ".($_SESSION["Apellido"]) ?><i class="material-icons right">arrow_drop_down</i></a></li>
  </ul>
  <ul id="dropdown1" class="dropdown-content">
    <li><a href="ActualizarMiperfil.php">Editar Perfil</a></li>
    <li><a href="../Controller/cerrarusuario.php">Cerrar sesión</a></li>
  </ul> 
<?php
}elseif ($_SESSION["cod_rol"]==101) {
?>	
	<ul class="right hide-on-med-and-down">
	    <li><a href="dashboard.php">Inicio</a></li>
	    <li><a href="#">Empleados</a></li>
	    <li><a href="#">Ofertas</a></li>
	    <li><a href="#">Citas</a></li>
	    <li><a href="#">Reportes</a></li>
	    <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php echo($_SESSION["Nombre"])." ".($_SESSION["Apellido"]) ?><i class="material-icons right">arrow_drop_down</i></a></li>
	  </ul>
	  <ul id="dropdown1" class="dropdown-content">
	    <li><a href="#!">Editar Perfil</a></li>
	    <li><a href="../Controller/cerrarusuario.php">Cerrar sesión</a></li>
	  </ul>
<?php  	   
}
?>
