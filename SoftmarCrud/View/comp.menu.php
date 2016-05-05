<!-- Menu Administrador = perfil 1 -->
<link rel="stylesheet" href="../../font-awesome-4.6.2/css/font-awesome.min.css">
<?php
if($_SESSION["cod_rol"]==103){
?>bn
 

 <ul class="right hide-on-med-and-down">
    <li><a href="dashboard.php">Inicio</a></li>
    <li><a href="#">Información</a></li>
    <li><a href="Gestion_Usuario_admin.php">Gestionar usuario</a></li>
    <li><a href="Gestion_Empresa_admin.php">Gestionar empresa</a></li>
    <li><a href="Gestion_Servicio_admin.php">Gestionar servicio</a></li>
    <li><a href="Gestionar_Empleado.php">Gestionar empleado</a></li>
    <li><a href="../Controller/cerrarusuario.php">Cerrar sesión</a></li>
  </ul>


<?php
}elseif($_SESSION["cod_rol"]==102){
?>
<ul class="right hide-on-med-and-down">
    <li><a href="#">Inicio</a></li>
    <li><a href="#">Información</a></li>
    <li><a href="#">Nosotros</a></li>
    <li><a href="#">Contacto</a></li>
    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Perfil<i class="material-icons right">arrow_drop_down</i></a></li>
  </ul>
  <ul id="dropdown1" class="dropdown-content">
    <li><a href="ActualizarMiperfil.php">Editar Perfil</a></li>
    <li><a href="../Controller/cerrarusuario.php">Cerrar sesión</a></li>
  </ul> 
<?php
}elseif ($_SESSION["cod_rol"]==101) {
?>	
	<ul class="right hide-on-med-and-down">
	    <li><a href="#">Inicio</a></li>
	    <li><a href="#">Empleados</a></li>
	    <li><a href="#">Ofertas</a></li>
	    <li><a href="#">Citas</a></li>
	    <li><a href="#">Reportes</a></li>
	    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Perfil<i class="material-icons right">arrow_drop_down</i></a></li>
	  </ul>
	  <ul id="dropdown1" class="dropdown-content">
	    <li><a href="#!">Editar Perfil</a></li>
	    <li><a href="../Controller/cerrarusuario.php">Cerrar sesión</a></li>
	  </ul>
<?php  	   
}
?>
<footer id="piedepagina" class="page-footer">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Footer Content</h5>
        <p class="grey-text text-lighten-4"></p>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text"></h5>
          <ul>
            <li><a id="faceicon"class="grey-text text-lighten-3" href="www.facebook.com"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
            <li><a id="faceicon"class="grey-text text-lighten-3" href="www.twitter.com"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
            <li><a id="faceicon"class="grey-text text-lighten-3" href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          </ul>
      </div>
    </div>
  </div>
  <div id="copy" class="footer-copyright">
      <div class="container">
      © Copyright  2016 SOFTMAR todos los derechos reservados
    </div>
  </div>
</footer>