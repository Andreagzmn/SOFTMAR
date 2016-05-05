<?php

// substr: retorna una porcion de una cadena de texto.
// substr(string, start,lenght);
// echo substr("Guille Valencia", -5);

//TRIM: Busca en la cadena de texto uno o varios caracteres y los elimina

// $texto = "Autoevaluacion";
// echo trim($texto,"evalu");
// substr_compare: compara caracteres en dos cadenas de texto
// echo substr_compare("Hola Mundo","Mundo",1);

// substr_replace(string, replacement, start)
// $texto = "hola bonita";
// echo substr_replace($texto, " como estas?",11);
// $alumnos = array("Juan","Ana","Tulia");
// $alumnos = implode(",", $alumnos);
// $alumnos = explode(",", $alumnos);
$usuario = "Manuel Zapata";
$avatar = explode(" ", $usuario);
count($avatar);

$avatar = substr($avatar[0],0,1)."".substr($avatar[1],0,1);
echo $avatar;
?>