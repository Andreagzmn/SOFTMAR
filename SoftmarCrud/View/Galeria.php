<?php
$total = count($_FILES['Imagen_Upload']['name']);
for($i=0; $i<$total; $i++) {
  $tmpFilePath = $_FILES['Imagen_Upload']['tmp_name'][$i];
  if ($tmpFilePath != ""){
    $newFilePath = "Galeria/" . $_FILES['Imagen_Upload']['name'][$i];
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
      echo "Los archivos se subieron correctamente";
    }
  }
?>