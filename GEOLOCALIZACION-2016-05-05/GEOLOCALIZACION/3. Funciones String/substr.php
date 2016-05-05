<?php

$nombre_usuario = "Guillermo  Valencia";

// ech substr($nombre_usuario, 0, 1)
$nombre_usuario = explode(" ",$nombre_usuario);

$nombre_usuario = substr($nombre_usuario[0], 0,1)."".substr($nombre_usuario[1], 0,1);

echo $nombre_usuario;
?>