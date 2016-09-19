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
  date_default_timezone_set("America/Bogota" ) ;



  $Cod_Emp = $_REQUEST["ei"];

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
<!-- <link rel="stylesheet" href="calendario\calendario.css">

<script type="text/javascript" src="calendario\calendario.js"></script> -->
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
      var horaactual = "<?php echo date("H:i");?>";
      var fechaval = $("fechaval").val();
      var horadesde  = $("#hora").val();

    $('select').material_select();

    function validafecha()
    {
       var horaactual = "<?php echo date("H:i");?>";
       var fechaval = "<?php echo date('Y-m-d'); ?>";
       var fecha_cita = $("#fecha_cita").val();
      //  var fec = $("#fechaval").val();
       var horadesde  = $("#hora").val();
        if (fecha_cita==fechaval){
         if(horadesde < horaactual){
           swal("debe elegir una hora superior a la hora actual "+horaactual+" hs");



         }else{
           validaCita($("#hora").val());
         }
       }else{
          validaCita($("#hora").val());
       }

     }
    function validaCita(hora){
        var fecha_cita  = $("#fecha_cita").val();
        var hora        = hora;
        var barbero     = $("#emple").val();
        var usuario     = $("#Cod_usu").val();
        var Cod_Emp    = $("#Cod_Emp").val();
        var accion      = "valida_citas";

        $.post("../Controller/Citas.controller.php", {hora: hora, c: accion, fecha_cita: fecha_cita, barbero: barbero, usuario:usuario, Cod_Emp:Cod_Emp, horaactual:horaactual, fechaval:fechaval, horadesde:horadesde}, function(result)
        {

            if(result.ue == true)
               {
                  $("#btnreg").val("disabled",true);
                  swal(result.msn);
               }else{

                  document.getElementById("frm").submit();
               }
          },"json");
    }
    $("#btnreg").click(function() 
    {
        //aqui el de los campos

         if($("input").val() == "" || $("select").val() == ""){
          swal("Los campos no deben ir vacios!");
         }else{
           validafecha($("#fechaval").val());
          }
    });
})




</script>

</head>
<body>

<center><div class="container" style="width: 50%;">
        <h3 style="text-align:center; margin-bottom: 5px; ">Softmar</h3>
          <form  action="../Controller/citas.controller.php" method="POST" class="col s12 formulario1" id="frm">
                <section class="col s12" >
                <p style="text-align: center;"><b>Llena el formulario para separar tu cita.<b></p>
                <div class="row">
                  <input id="Cod_Emp" type="hidden" value="<?php echo $_GET["ei"]?>" name="Cod_Emp">
                  <div class="input-field col s12 m12">
                      <input id="last_name" type="number" class="validate" required name="Telefono">
                      <label for="last_name">Telefono</label>
                  </div>
                <div class="input-field col s12 m12">
                 <input type="date" name="Fecha" min="<?php echo date('Y-m-d');?>"  required id="fecha_cita"/>
                </div>
                <div class="input-field col s12 m12">
                  <?php

                          $horario=Gestion_Empresa::ValidaEmpresa($Cod_Emp);
                          //Capturamos la hora de atencion en la barberia
                           $fin=$horario["Hor_hasta"];
                            $inicio=$horario["Hor_desde"];

                            $Hor_desde=$inicio[0].$inicio[1].$inicio[2].$inicio[3].$inicio[4]."hs";
                            $Hor_hasta=$fin[0].$fin[1].$fin[2].$fin[3].$fin[4]."hs";
                    ?>

                      <input type="time" max="<?php echo $fin ?>" min="<?php echo $inicio ?>" name="Hora" id="hora" value="<?php $time=time();echo date("H:i",$time)?>"  ></input>
                   <span type="hidden" id="horafinal"></span>
                   <span type="hidden" id="fechaval" value="<?php echo date('Y-m-d');?>"></span>
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
                      <select  name="Cod_empl" id="emple">
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
                    <input type="hidden" name="Cod_usu" id="Cod_usu" value="<?php echo $_SESSION["Cod_usu"]; ?>"/>
                    <input type="hidden" name="c" value="create">

                    <button id="btnreg"  class="btn waves-effect  cyan darken-3">Reservar</button>

                    <?php echo @$_REQUEST["$msn"]; ?>
                </section>

            </form>
</div></center>

</body>
</html>
