<?php
  session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");

  if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/login.php?m=".$msn."&tm=".$tipo_msn);
  }
  require_once("../Model/servicio.class.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
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
    <script>
    $(document).ready( function () {
      $('#datatable').DataTable();
    });
    </script>
   </head>
  <body>
    <h1>GESTIONAR SERVICIOS</h1>
    <a href="Registrar_servicio.php">Nueva Empresa</a>
    <table id="datatable" class="display">
      <thead>
        <tr>
          <th>servicio</th>
          <th>Empresa</th>
          <th>Nombre</th>
          <th>Descripcion</th>
          <th>Estado</th>
          <th>Valor</th>
        </tr>
      </thead>
      <tbody>

      <?php
      $servicios = Gestion_servicio::ReadAll();

      foreach ($servicios as $row) {

        if($row["Estado"] == 1){
          $Estado = "Activo";
        }elseif($row["Estado"] == 2){
          $Estado = "Inactivo";
        }
        echo "<tr>
                <td>".$row["Cod_serv"]."</td>
                <td>".$row["Cod_Emp"]."</td>
                <td>".$row["Nombre"]."</td>
                <td>".$row["Descripcion"]."</td>
                <td>".$Estado."</td>
                <td>".$row["Valor"]."</td>
                <td>

                  <a href='../View/Actualizar_servicio.php?sr=".base64_encode($row["Cod_serv"])."'><i class='fa fa-pencil'></i></a>
                  <a href='../Controller/servicio_emp.controller.php?sr=".base64_encode($row["Cod_serv"])."&accion=d'><i class='fa fa-trash'></i></a>
                </td>
              </tr>";
      }

      ?>
      </tbody>
    </table>
  </body>
</html>