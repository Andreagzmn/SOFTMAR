<?php
  session_start();
  require_once("conn.php");
  require_once("class.usuario.php");

  if(!isset($_SESSION["id"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: index.php?m=".$msn."&tm=".$tipo_msn);
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

    <a href="nuevo_usuario.php">Nuevo Usuario</a>
<!--
    <select name="campox">
      <option value="">Seleccione un usuario</option>
      <?php
      // $usuarios = Gestion_Usuarios::ReadAll();
      //
      // foreach ($usuarios as $row) {
      //    echo "<option value='".$row[0]."'>".$row[4]."</option>";
      // }

      ?>
    </select> -->


    <table id="datatable" class="display">
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Perfil</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>

      <?php
      $usuarios = Gestion_Usuarios::ReadAll();

      foreach ($usuarios as $row) {

        if($row["perfil"] == 1){
          $perfil = "Administrador";
        }elseif($row["perfil"] == 2){
          $perfil = "Visitante";
        }

        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["nombre"]."</td>
                <td>".$row["correo"]."</td>
                <td>".$perfil."</td>
                <td>

                  <a href='edita_usuario.php?ui=".base64_encode($row["id"])."'><i class='fa fa-pencil'></i></a>
                  <a href='controller.usuario.php?ui=".base64_encode($row["id"])."&acc=d'><i class='fa fa-trash'></i></a>


                </td>
              </tr>";
      }

      ?>
      </tbody>
    </table>
  </body>
</html>
