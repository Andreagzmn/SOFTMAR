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
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster"/>
 <script>
      $(document).ready(function(){
      <?php
             if(isset($_GET["m"]) and isset($_GET["tm"])){
               if($_GET["m"] != ""){
                 echo "
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
                             });";
                 }
               }
      ?>

      $("a#btntrash").click(function(){

          var codigo = $("#codemp").val();
          var accion = "d";
         sweetAlert({
                 title: 'Mensaje de SOFTMAR',   
                 text: 'Esta seguro que desea eliminar el producto?',   
                 type: 'warning',   
                 showCancelButton: true,
                 confirmButtonColor: '#4db6ac',   
                 confirmButtonText: 'Aceptar',   
                 cancelButtonText: 'No, cancel!',   
                 closeOnConfirm: false,   
                 closeOnCancel: false,
                 },
              function(isConfirm){   
                if (isConfirm) {     
                    swal("Eliminado!", "se ha eliminado", "success"); 
                    document.location.href = "../Controller/empresa.controller.php?ei="+codigo+"&accion="+accion; 
                }else{    
                    swal("Cancelado", "se cancelo","error");   
                  } 
      });
          
  
});
      
      });
   </script>
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
  <nav id="menufixed" class="black">
      <div class="nav-wrapper " style="margin-left: 5px; margin-right: 5px;">
        <h2 href="#!" class="brand-logo" style="text-align:center; margin-top: 10px; "><!-- <img src="img/SOFTMAR.png" style="width: 500%; margin-top: -15px; position: relative;"> -->Softmar</h2>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <?php include_once("../View/comp.menu.php"); ?>
     </div>
  </nav> 
  <section class="datagrid">
    <center><h3>Gestionar Empresa</h3></center>
    <center><a href="Registrar_Empresa.php" class="btn-floating waves-effect waves-light cyan darken-3"><i class="material-icons">add</i></a>Agregar Empresa</center>

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
                <td>".$row["Dias_aten"]."</td>
                <td>".$row["Hor_desde"]."</td>
                <td>".$row["Hor_hasta"]."</td>
                <td>
                  <a href='../View/actualizar_empresa.php?ei=".base64_encode($row["Cod_Emp"])."'><i class='fa fa-pencil'></i></a>
                   <input type='hidden' id='codemp' value='".base64_encode($row["Cod_Emp"])."'>
                  <a href='#' id='btntrash' >
                  <i class='fa fa-trash'></i></a>
                 <a href='../View/PerfilEm.php?ei=".base64_encode($row["Cod_Emp"])."'><i class='fa fa-user'></i></a>
                </td>
              </tr>";
      }
      ?>
      </tbody>
    </table></center>
    </section>
    <?php include_once("../View/pie_pagina.php"); ?>
  </body>
</html>
