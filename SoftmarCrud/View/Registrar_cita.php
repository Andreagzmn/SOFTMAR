<?php
 session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");
  require_once("../Model/servicio.class.php");
  require_once("../Model/Empleados.class.php");
  require_once("../Model/empresa.class.php");


   if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/Index.php?m=".$msn."&tm=".$tipo_msn);
  }   



  $Cod_Emp = $_REQUEST["ei"];
 
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

<script src="sweetalert-master/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/sweetalert.css">

<script>
  $(document).ready(function()
  {

    
    $('select').material_select();
    $('#fecha_cita').datepicker
    ({
      
        showOn: "button",
        buttonImage:"calendario/images/calen.png",
        buttonImageOnly:true,
        showButtonPanel:true,
        minDate: "-0D"
    
    });

    function validaCita(hora){
          var hora        = hora;
          var fecha_cita  = $("#fecha_cita").val();
          var empleado    = $("#empleado").val();
          var formato     = $("#formato").val();
          
          var c      = "valida_citas";

          // alert(hora);
          $.post("../Controller/citas.controller.php", {hora: hora, c: c, empleado: empleado, fecha_cita: fecha_cita, formato:formato}, function(result)
          {
                    
                if(result.ue == true)
                { 
                  swal(result.msn);
                  $("#btnreg").prop("disabled",true);
                  // $("#hora").val("");
                }else
                {
                  $("#btnreg").prop("disabled",false);
                }
          },"json");
    }

    $("#hora").change(function(){
        //se asigna el valor de #hora a la variable #horafinal.
        $("#horafinal").val($("#hora").val());

        validaCita($("#horafinal").val());
    });


    $("#empleado").change(function(){
        validaCita($("#horafinal").val());
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
                  <input type="hidden" name="horafinal" id="horafinal">
                  <div class="input-field col s12 m6">
                      <select name="Hora" id="hora">
                        <option value="">Seleccione la hora de su cita</option>
                        <option value="12">12</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
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

                            $services=Gestion_servicio::Readbyserv($Cod_Emp);
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
                                             
                          $empleados = Gestion_Empleados::ReadbyEmpresa($Cod_Emp);                        
                          foreach ($empleados as $row){
                            echo "<option value='".$row["Nombre"]."'>".$row["Nombre"]."</option>"; 
                          }                           
                        ?>
                      </select>                        
                    </div>
                    </div>
                    <input type="hidden" name="Cod_usu" value="<?php echo $_SESSION["Cod_usu"]; ?>"/>
                    

                    <button type="submit"  name="c" value="create" id="btnreg"  class="btn waves-effect  cyan darken-3">Reservar</button>
                    
                    <?php echo @$_REQUEST["$msn"]; ?>   
                </section>
                <div class="col l8 offset l2">


                <?php      
                  
                $horadisp=Gestion_Empresa::consultaHora($Cod_Emp);
                foreach ($horadisp as $row)
                {
                echo"                
                <td>".$row["Hor_desde"]."</td>
                <td>".$row["Hor_hasta"]."</td>
                ";
                $hor=["Hor_desde"];
                if ($hor=='09:30:00'){
                echo"1 2 3 4 5 6 7 8 9";
                }
                }
                ?>
                  
                </div>            
            </form>          
</div></center>

</body>
</html>
