<!-- Menu Administrador = perfil 1 -->
<?php
if($_SESSION["cod_rol"]==103){
?>
 
  <nav class="black">
      <div class="nav-wrapper " style="margin-left: 5px; margin-right: 5px;">
        <a href="#!" class="brand-logo"><img src="img/SOFTMAR.png" style="width: 650%;"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Información</a></li>
          <li><a href="#">Visualizar pagina web</a></li>
          <li><a href="#">Gestionar usuario</a></li>
          <li><a href="#">Gestionar empresa</a></li>
        </ul>
      </div>
    </nav>


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
