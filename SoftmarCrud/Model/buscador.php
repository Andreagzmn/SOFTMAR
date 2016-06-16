<?php
session_start();
require_once("../Model/db_conn.php");
require_once("../Model/empresa.class.php");

$result = Gestion_Empresa::ReadbyNombre($_POST['q']);

foreach ($result as $row) {
	$nombre_empresa = strtolower(str_replace('ñ', 'n', $row["Nombre"]));
	$nombre_empresa = strtolower(str_replace(' ', '', $nombre_empresa));
	echo "
		<div class='row'>
			<div class='log col s6 m3'><img src='img/Imagenes_Empresas/".$nombre_empresa."/logo.png'></div>
			<div class='col s6 m9 '>
			<h4>".$row["Nombre"]."</h4>
		</div>
	</div>";
}



?>