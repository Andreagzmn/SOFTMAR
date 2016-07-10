<?php
session_start();
require_once("../Model/db_conn.php");
require_once("../Model/empresa.class.php");

$result = Gestion_Empresa::ReadbyNombre($_POST['q']);

foreach ($result as $row) {
	$nombre_empresa = strtolower(str_replace('ñ', 'n', $row["Nombre"]));
	$nombre_empresa = strtolower(str_replace(' ', '', $nombre_empresa));
	echo "
		<div class='container-fluid'>
			<div class='row busca'>
				<div class='log col s6 m3'><a href='../View/PerfilEm.php?ei=".base64_encode($row["Cod_Emp"])."'><img src='img/Imagenes_Empresas/".$nombre_empresa."/logo.png'> </a></div>
				<div class='col s6 m9 datos'>
				<a href='../View/PerfilEm.php?ei=".base64_encode($row["Cod_Emp"])."'><h4 class='nombr'>".$row["Nombre"]."</h4></a>
				<p style='margin-top: 30px;'>Telefono: ".$row["Telefono"]."</p>
				<p style='margin-top: 10px;'>Direccion: ".$row["Direccion"]."</p>
			</div>
		</div>
		<br>";
}



?>