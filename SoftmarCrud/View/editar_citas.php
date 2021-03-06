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



  // $Cod_Emp = $_REQUEST["ei"];
 
 $cod_cita=$_POST["ci"];
?>

 
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
<?php

          if(isset($_GET["m"])){
            if($_GET["m"] != ""){
              echo "<script>alert('".$_GET["m"]."')</script>";
            }
          }

      ?>
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

    $("#fecha_cita").change(function(){
        validaCita($("#horafinal").val());

    });
})

  

  
</script>

</head>
<body>

<center><div class="container" style="width: 50%;">
        <h3 style="text-align:center; margin-bottom: 5px; ">Softmar</h3>        
          <form  action="../Controller/citas.controller.php" method="POST" class="col s12 formulario1">
                <section class="col s12" >
                <p style="text-align: center;"><b>Llena el formulario para separar tu cita.<b></p>    
                <div class="row">  
                  <input id="Cod_Emp" type="hidden" value="<?php echo $_GET["ei"]?>" name="Cod_Emp">
                  <div class="input-field col s12 m12">
                      <input id="last_name" type="number" class="validate" required name="Telefono">
                      <label for="last_name">Telefono</label>
                  </div>
                <div class="input-field col s12 m12">
                 <input type="text" name="Fecha" placeholder="clic en el calendario" required id="fecha_cita" readonly>
                </div>

                
                  <input type="hidden" name="horafinal" id="horafinal">
                  <div class="input-field col s12 m12">
                      <select name="Hora" id="hora">
                        <option value="">Seleccione la hora de su cita</option>
                        <option value="12:00:00">12:00:00</option>
                        <option value="1:00:00">1:00:00</option>
                        <option value="2:00:00">2:00:00</option>
                        <option value="3:00:00">3:00:00</option>
                        <option value="4:00:00">4:00:00</option>
                        <option value="5:00:00">5:00:00</option>
                        <option value="6:00:00">6:00:00</option>
                        <option value="7:00:00">7:00:00</option>
                        <option value="8:00:00">8:00:00</option>
                        <option value="9:00:00">9:00:00</option>
                        <option value="10:00:00">10:00:00</option>
                        <option value="11:00:00">11:00:00</option>
                      </select>
                  </div> 

                  <div class="input-field col s12 m12">
                       <select name="Formato" id="formato">
                        <option value="" disabled selected>Seleccione el horario:</option>
                        <option value="am">am</option>
                        <option value="pm">pm</option>
                        </select>
                  </div>

                    <div class="input-field col s12 m12">
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
                       <div class="input-field col s12 m12">
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
                     
            </form>          
</div></center>

</body>
</html>
