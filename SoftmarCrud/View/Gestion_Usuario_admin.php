<?php
  session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");
  

  if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/login.php?m=".$msn."&tm=".$tipo_msn);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>      
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- sweet alert -->
    <link rel="stylesheet" type="text/css" href="sweetalert-master/sweetalert.css">
    <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.js"></script>
    <!-- sweet alert -->
    <script type="text/javascript" src="sweetalert-master/sweetalert.min.js"></script>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="estilos.css">    
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster"/>

<?php

       if(isset($_GET["m"]) and isset($_GET["tm"])){
         if($_GET["m"] != ""){
           echo "<script>
                   $(document).ready(function(){
                      sweetAlert({
                           title: 'Mensaje de SOFTMAR',   
                           text: '".$_GET["m"]."',   
                           type: '".$_GET["tm"]."',   
                           showCancelButton: false,
                           confirmButtonColor: '#4db6ac',   
                           confirmButtonText: 'Aceptar',   
                          cancelButtonText: 'No, cancel plx!',   
                           closeOnConfirm: false,   
                           closeOnCancel: false
                       });
                   });
                </script>";
           }
         }
?>

   <link rel="stylesheet" type="text/css" href="Jquery/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="Jquery/jquery.dataTables.js"></script>


    <script>
    $(document).ready(function() {
        $('#datatable').DataTable();
        $(".button-collapse").sideNav();
        $(".dropdown-button").dropdown();
    });
    </script>
  </head>
   <nav class="black">
      <div class="nav-wrapper " style="margin-left: 5px; margin-right: 5px;">
        <a href="#!" class="brand-logo"><img src="img/SOFTMAR.png" style="width: 500%; margin-top: -15px; position: relative;"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <?php include_once("../View/comp.menu.php"); ?>
     </div>
  </nav>   
  <body> 
    <center><h3>Gestionar usuarios</h3></center>
    <center><a href="RegistrarUsuarioAdmn.php" class="btn-floating waves-effect waves-light cyan darken-3"><i class="material-icons">add</i></a>Agregar usuario</center>

    <center><table id="datatable" class="display highlight" >
      <thead>
        <tr>
          <th>Cod_usu</th>
          <th>cod_rol</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Direccion</th>
          <th>Edad</th>
          <th>Correo</th>
          <th>Cedula</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

      <?php
      $usuarios = Gestion_Contacto::ReadAll();

      foreach ($usuarios as $row) {

        if($row["cod_rol"] == 103){
          $cod_rol = "Administrador";
        }elseif($row["cod_rol"] == 102){
          $cod_rol = "Usuario";
        }elseif($row["cod_rol"] == 101){
          $cod_rol = "Cliente";
        }

        echo "<tr>
                <td>".$row["Cod_usu"]."</td>
                <td>".$cod_rol."</td>
                <td>".$row["Nombre"]."</td>
                <td>".$row["Apellido"]."</td>
                <td>".$row["Direccion"]."</td>
                <td>".$row["Edad"]."</td>
                <td>".$row["Correo"]."</td>
                <td>".$row["Cedula"]."</td>
                <td>
                  <a href='../View/editar.usuario.php?ui=".base64_encode($row["Cod_usu"])."'><i class='fa fa-pencil'></i></a>
                  <a href='../Controller/Usuariocontroller.php?ui=".base64_encode($row["Cod_usu"])."&accion=d'><i class='fa fa-trash'></i></a>
                </td>
              </tr>";
      }

      ?>
      </tbody>
    </table></center>
    <?php include_once("../View/pie_pagina.php"); ?>
  </body>
</html>
