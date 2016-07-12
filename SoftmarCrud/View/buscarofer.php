<?php
  session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");

  if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/Index.php?m=".$msn."&tm=".$tipo_msn);
  }
  require_once("../Model/producto.class.php");
   require_once("../Model/oferta.class.php");
 

?>
<!DOCTYPE html>
<html>
  <head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">   
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>      
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="sweetalert-master/sweetalert.css">
    <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.js"></script>
    <script type="text/javascript" src="sweetalert-master/sweetalert.min.js"></script>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="estilos.css">    
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster"/><link rel="stylesheet" type="text/css" href="Jquery/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="Jquery/jquery.dataTables.js"></script>


    <script>
    $(document).ready(function() {
        $('#datatable').DataTable();
        $(".button-collapse").sideNav();
         $(".dropdown-button").dropdown();
         <?php

          if(isset($_GET["m"])){
            if($_GET["m"] != ""){
              echo "sweetAlert({
                           title: 'Mensaje de SOFTMAR',   
                           text: '".$_GET["m"]."',   
                           type: '".$_GET["tm"]."',   
                           showCancelButton: false,
                           confirmButtonColor: '#4db6ac',   
                           confirmButtonText: 'Aceptar',   
                          cancelButtonText: 'No, cancel plx!',   
                           closeOnConfirm: false,   
                           closeOnCancel: false
                       });";
            }
          }

      ?>
    });
    </script>
</head>
   <nav id="menufixed" class="black">
      <div class="nav-wrapper " style="margin-left: 5px; margin-right: 5px;">
        <h2 href="#!" class="brand-logo" style="text-align:center; margin-top: 10px; "><!-- <img src="img/SOFTMAR.png" style="width: 500%; margin-top: -15px; position: relative;"> -->Softmar</h2>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <?php include_once("../View/comp.menu.php"); ?>
      </div>  
    </nav>
  <body>


  <section class="datagrid"> 
    <center><a href="ofertas.php" class="btn-floating waves-effect waves-light cyan darken-3"><i class="material-icons">visibility</i></a>Mirar ofertas</center>
    <center><h3>Productos</h3></center>
  	   <center><table id="datatable" class="display highlight">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Descripcion</th>
          <th>Valor</th>
          <th>Cantidad</th>
        </tr>
      </thead>
      <tbody>

      <?php
      $producto = Gestion_producto::ReadAll();
       
      
      foreach ($producto as $row) {
        echo "<tr>
                <td>".$row["Nombre"]."</td>
                <td>".$row["Descripcion"]."</td>
                <td>".$row["Valor"]."</td>
                <td>".$row["Cant"]."</td>  
              </tr>";
      }

      ?>
      </tbody>
    </table></center>
  </section>

    <?php include_once("../View/pie_pagina.php"); ?>
  </body>
</html>