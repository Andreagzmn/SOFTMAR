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
    <h1>GESTIONAR USUARIOS</h1>

    <table id="datatable" class="display">
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
    </table>
  </body>
</html>
