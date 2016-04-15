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
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>

    <script>
    $(document).ready( function () {
      $('#datatable').DataTable();
    });
    </script>
   </head>
  <body>
    <h1>GESTIONAR TIPO EMPRESA</h1>

    <table id="datatable" class="display">
      <thead>
        <tr>
          <th>Cod_TipEmp</th>
          <th>Nombre</th>
        </tr>
      </thead>
      <tbody>

      <?php
      $Tipo_empresa = Gestion_Tipo_Empresa::ReadAll();

      foreach ($Tipo_empresa as $row) {

        if($row["Tipo_empresa"] == 3){
          $Tipo_empresa = "Peluqueria";
        }elseif($row["Tipo_empresa"] == 4){
          $Tipo_empresa = "Barberia";
        }elseif($row["Tipo_empresa"] == 5){
          $Tipo_empresa = "Spa";
        }elseif($row["Tipo_empresa"] == 6){
          $Tipo_empresa = "Peluqueria Infantil";
        }

        echo "<tr>
                <td>".$Tipo_empresa."</td>
                <td>".$row["Nombre"]."</td>
                <td>

                  <a href='../View/editar.Tipo_empresa.php?tp=".base64_encode($row["Cod_TipEmp"])."'><i class='fa fa-pencil'></i></a>
                  <a href='../Controller/Tipo_empresa.controller.php?tp=".base64_encode($row["Cod_TipEmp"])."&accion=d'><i class='fa fa-trash'></i></a>


                </td>
              </tr>";
      }

      ?>
      </tbody>
    </table>
  </body>
</html>
