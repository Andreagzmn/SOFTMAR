<?php
 session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");
  require_once("../Model/servicio.class.php");
  require_once("../Model/Empleados.class.php");

   if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/Index.php?m=".$msn."&tm=".$tipo_msn);
  }   
 
?>
<!DOCTYPE html>
<html>
<head>

  <title></title>
  <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
  <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" type="text/css" href="estilos.css">
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster"/>
<link rel="stylesheet" href="iconos/css/font-awesome.min.css">
<link rel="stylesheet" href="calendario\calendario.css">
<script type="text/javascript" src="calendario\calendario.js"></script>
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>

<script>
  $(document).ready(function() {
    <?php
      if(isset($_GET["msn"])){
      echo "swal( '".$_GET["msn"]."','', 'success');";
      }
    ?>
    $('select').material_select();
    $('#fecha_cita').datepicker({
      
    showOn: "button",
    buttonImage:"calendario/images/calen.png",
    buttonImageOnly:true,
    showButtonPanel:true,
    
    });

  $("#empleado").change(function(){
    var hora        = $("#hora").val();
    var fecha_cita  = $("#fecha_cita").val();
    var empleado    = $("#empleado").val();
    var formato     = $("#formato").val();
    // var min         = $("#min").val();
    var acc      = "valida_citas";

    $.post("../Controller/citas.controller.php", {hora: hora, acc: acc, empleado: empleado, fecha_cita: fecha_cita, formato:formato}, function(result){
              
          if(result.ue == true){ 
            (result.msn);
            $("#btnreg").prop("disabled",true);
          }else{
            $("#btnreg").prop("disabled",false);
          }
      },"json");
    });
  })
</script>
</head>
<body>

<center><div class="container" style="width: 80%;">
        <h3 style="text-align:center; margin-bottom: 5px; ">Softmar</h3>        
          <form  action="../Controller/citas.controller.php" method="POST" class="col s12 formulario1">
                <section class="col s12" >
                <p style="text-align: center;"><b>Llena el formulario para separar tu cita.<b></p>    
                <div class="row">  
                  <input id="Cod_Emp" type="hidden" value="<?php echo $_GET["ei"]?>" name="Cod_Emp">
                  <div class="input-field col s12 m6">
                      <input id="last_name" type="number" class="validate" required name="Telefono">
                      <label for="last_name">Telefono</label>
                  </div>
                
                <div class="input-field col s12 m6">
                 <input type="text" name="Fecha" placeholder="clic en el calendario" required id="fecha_cita" readonly>
                </div>
                  <div class="input-field col s12 m6">
                      <select name="Hora" id="hora">
                        <option value="" disabled selected>Seleccione la hora de su cita</option>
                        <option value="8:00 am">8:00 am</option>
                        <option value="8:30 am">8:30 am</option>
                        <option value="9:00 am">9:00 am</option>
                      </select>
                  </div>                    
                  <div class="input-field col s12 m6">
                       <select name="Formato" id="formato">
                        <option value="" disabled selected>Seleccione el horario:</option>
                        <option value="am">am</option>
                        <option value="pm">pm</option>
                        </select>
                  </div>
                    <div class="input-field col s12 m6">
                        <select  name="Cod_serv">
                          <option value="" disabled selected>Seleccione un servicio</option>
                          <?php                        
                            $services=Gestion_servicio::ReadAll();
                            foreach ($services as $row){
                              echo "<option value='".$row["Nombre"]."'>".$row["Nombre"]."</option>"; 
                            }                           
                          ?>
                        </select>                        
                      </div>
                    <div class="input-field col s12 m6">
                      <select  name="Cod_empl" id="empleado">
                        <option value="" disabled selected>Seleccione un empleado</option>
                        <?php                        
                          $empleados = Gestion_Empleados::ReadAll();
                          foreach ($empleados as $row){
                            echo "<option value='".$row["Cod_empl"]."'>".$row["Nombre"]."</option>"; 
                          }                           
                        ?>
                      </select>                        
                    </div>
                    </div>
                    <input type="hidden" name="Cod_usu" value="<?php echo $_SESSION["Cod_usu"]; ?>"/>
                    

                    <button type="submit"  name="acc" value="create" id="btnreg"  class="btn waves-effect  cyan darken-3" onclick="return validarCita()">Registrar</button>
                    
                    <?php echo @$_REQUEST["$msn"]; ?>   
                </section>            
            </form>          
</div></center>

</body>
</html>
