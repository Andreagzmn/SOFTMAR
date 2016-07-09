<?php

$directorio = "../View/img/Imagenes_Empresas/".$nombre_empresa."/";

if (!file_exists($directorio)) { 
  echo "El archivo no existe";
  mkdir($directorio, 0777, true);
}

  $archivo     = $directorio.basename($_FILES["Imagen_Oferta"]["name"]);
  $uploadOk    = 0;
  $extension_archivo = pathinfo($archivo,PATHINFO_EXTENSION);
  
   $archivo = $directorio."Imoferta.".$extension_archivo;

  $check = getimagesize($_FILES["Imagen_Oferta"]["tmp_name"]);
      if($check !== false) {
          echo "El archivo si es una imagen <br>";
          $uploadOk = 1;
      }else{
          echo "El archivo no es una imagen  <br>";
          $uploadOk = 0;
      }

// ASIGNAMOS UN LIMITE DE PESO A NUESTRO ARCHIVO ASIGNANDO UN VALOR EN Bytes
  if($_FILES["Imagen_Oferta"]["size"] > 7000000){
    echo "Ooops! tu imagen no puede superar mas de 700Kb  <br>";
    $uploadOk = 0;
  }
// VALIDAMOS EL TIPO DE ARCHIVO
  if($extension_archivo != "jpg" && $extension_archivo != "png" && $extension_archivo != "jpeg" && $extension_archivo != "gif" ) {
      echo "El archivo no tiene un formato valido de imagen  <br>";
      $uploadOk = 0;
  }

   // COMPROBAMOS QUE EL ARCHIVO NO EXISTA
  if(file_exists($archivo)){
    echo "Lo siento, el archivo ya existe en nuestra aplicación!  <br>";
    $uploadOk = 0;
  }
 
// VALIDAMOS SI $UPLOADOK ESTA EN 1 DE ESA FORMA SE PUEDE SUBIR
  if($uploadOk == 1){
      if (move_uploaded_file($_FILES["Imagen_Oferta"]["tmp_name"], $archivo)) {
          echo "El archivo ". basename( $_FILES["Imagen_Oferta"]["name"]). " se subio correctamente.  <br>";
      } else {
          echo "Oops! ha ocurrido un error.  <br>";
      }
  } else {
    echo "Lo sentimos su archivo no se puede subir.  <br>";
  }

 ?>