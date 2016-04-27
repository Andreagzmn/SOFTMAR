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
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>      
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title></title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="estilos.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster" />
    <script>
    $(document).ready( function () {
      $('#datatable').DataTable();
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
      <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){    
         $(".button-collapse").sideNav();
         $(".dropdown-button").dropdown();
      });

    </script>
  </body>
</html>
