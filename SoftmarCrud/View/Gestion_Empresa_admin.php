<?php
  session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");


  if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/login.php?m=".$msn."&tm=".$tipo_msn);
  }
  require_once ("../Model/empresa.class.php")
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>

    <script>
    $(document).ready( function () {
      $('#datatable').DataTable();
    });
    </script>
   </head>
  <body>
    <h1>GESTIONAR EMPRESA</h1>
    <a href="formem.php">Nueva Empresa</a>

    <table id="datatable" class="display" >
      <thead style="width: 50%">
        <tr>
          <th>Cod_Emp</th>
          <th>Cod_TipEmp</th>
          <th>Nombre</th>
          <th>Telefono</th>
          <th>Direccion</th>
          <th>NIT</th>
          <th>Correo</th>
          <th>Informacion</th>
          <th>Dias de atencion</th>
          <th>Hora desde</th>
          <th>Hora hasta</th>
          <th>Foto 1</th>
          <th>Foto 2</th>
          <th>Foto 3</th>
          <th>Foto 4</th>
          <th>Logo</th>
        </tr>
      </thead>
      <tbody>

      <?php
      $empresa = Gestion_Empresa::ReadAll();

      foreach ($empresa as $row) {

        if($row["Cod_TipEmp"] == 3){
          $Cod_TipEmp = "Peluqueria";
        }elseif($row["Cod_TipEmp"] == 4){
          $Cod_TipEmp = "Barberia";
        }elseif($row["Cod_TipEmp"] == 5){
          $Cod_TipEmp = "Spa";
        }elseif($row["Cod_TipEmp"] == 6){
          $Cod_TipEmp = "Peluqueria Infantil";
        }

        echo "<tr>
                <td>".$row["Cod_Emp"]."</td>
                <td>".$Cod_TipEmp."</td>
                <td>".$row["Nombre"]."</td>
                <td>".$row["Telefono"]."</td>
                <td>".$row["Direccion"]."</td>
                <td>".$row["Correo"]."</td>
                <td>".$row["Informacion"]."</td>
                <td>".$row["Dias_aten"]."</td>
                <td>".$row["Hor_desde"]."</td>
                <td>".$row["Hor_hasta"]."</td>
                <td>".$row["Foto1"]."</td>
                <td>".$row["Foto2"]."</td>
                <td>".$row["Foto3"]."</td>
                <td>".$row["Foto4"]."</td>
                <td>".$row["Logo"]."</td>
                <td>

                  <a href='../View/actualizar_empresa.php?ei=".base64_encode($row["Cod_Emp"])."'><i class='fa fa-pencil'></i></a>
                  <a href='../Controller/empresa.controller.php?ei=".base64_encode($row["Cod_Emp"])."&accion=d'><i class='fa fa-trash'></i></a>


                </td>
              </tr>";
      }

      ?>
      </tbody>
    </table>
  </body>
</html>
