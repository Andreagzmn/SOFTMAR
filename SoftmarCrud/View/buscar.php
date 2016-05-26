<?php
  session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");


  if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/Index.php?m=".$msn."&tm=".$tipo_msn);
  }
  require_once ("../Model/empresa.class.php")
?>
<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster" />
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="flexboxgrid.min.css">
    <link type="text/css" rel="stylesheet" href="estilos.css">  
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
<body>
	 <nav class="black navbar-fixed">
      <div class="nav-wrapper " style="margin-left: 5px; margin-right: 5px;">
        <h2 href="#!" class="brand-logo" style="text-align:center; margin-top: 10px; "><!-- <img src="img/SOFTMAR.png" style="width: 500%; margin-top: -15px; position: relative;"> -->Softmar</h2>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <?php include_once("../View/comp.menu.php"); ?>

     </div>
     </nav>
     <center><table id="datatable" class="display highlight" >
      <thead>
        <tr>
          <th>Codigo Empresa</th>
          <th>Tipo Empresa</th>
          <th>Nombre</th>
          <th>Telefono</th>
          <th>Direccion</th>
          <th>NIT</th>
          <th>Correo</th>
          <th>Informacion</th>
          <th>Dias de atencion</th>
          <th>Hora desde</th>
          <th>Hora hasta</th>
          <th></th>
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
                <td>".$row["NIT"]."</td>
                <td>".$row["Correo"]."</td>
                <td>".$row["Informacion"]."</td>
                <td>".$row["Dias_aten"]."</td>
                <td>".$row["Hor_desde"]."</td>
                <td>".$row["Hor_hasta"]."</td>
                <td>
                  <a href='../View/actualizar_empresa.php?ei=".base64_encode($row["Cod_Emp"])."'><i class='fa fa-pencil'></i></a>
                  <a href='../Controller/empresa.controller.php?ei=".base64_encode($row["Cod_Emp"])."&accion=d'><i class='fa fa-trash'></i></a>
                 <a href='../View/PerfilEm.php?ei=".base64_encode($row["Cod_Emp"])."'><i class='fa fa-user'></i></a>
                </td>
              </tr>";
      }
      ?>
      </tbody>
    </table></center>

  <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.js"></script>
</body>
</html>