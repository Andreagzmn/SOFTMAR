<?php
 session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/servicio.class.php");
  require_once("../Model/Empleados.class.php");

   if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/Index.php?m=".$msn."&tm=".$tipo_msn);
  }
  require_once("../Model/empresa.class.php");

   if(isset($_GET["ei"])){
      $ei =  base64_decode($_GET["ei"]);
   }else{
      $ei = $_SESSION["Cod_Emp"];
   }
   
   $informacion = Gestion_Empresa::ReadbyID($ei);
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script>
          $(document).ready(function() {
            $('select').material_select();
          });
      </script>
</head>
<body>

<center><div class="container" style="width: 30%;">
        <h3 style="text-align:center; margin-bottom: 5px; ">Softmar</h3>        
          <form  action="../Controller/citas.controller.php" method="POST" class="col s12 formulario1">
                <section class="col s12" >
                <div class="row">  
                  <input id="Cod_Emp" type="hidden" value="<?php echo $_GET["ei"]?>" name="Cod_Emp">
                  <div class="input-field col s12">
                      <input id="last_name" type="number" class="validate" required name="Telefono">
                      <label for="last_name">Telefono</label>
                  </div>
                </div>
                <div class="input-field col s12">
                 <select name="Fecha" id="fecha_cita">
                        <option value="" disabled selected>Seleccione fecha</option>
                        <option value="8:00 am">8:00 am</option>
                        <option value="8:30 am">8:30 am</option>
                        <option value="9:00 am">9:00 am</option>
                      </select>
                  </div>
                <div class="row">    
                  <div class="input-field col s12">
                      <select name="Hora" id="hora">
                        <option value="" disabled selected>Seleccione la hora de su cita</option>
                        <option value="8:00 am">8:00 am</option>
                        <option value="8:30 am">8:30 am</option>
                        <option value="9:00 am">9:00 am</option>
                      </select>
                  </div>                  
                </div>
                <div class="row">    
                  <div class="input-field col s12">
                       <input id="last_name" type="text" class="validate" required name="Estado">
                      <label for="last_name">Estado</label>
                  </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
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
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <select  name="Cod_empl" id="emple">
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
                    <!-- <input type="hidden" name="Cod_Emp" value="<?php //echo $_SESSION["Cod_Emp"]; ?>"/>  -->

                    <button type="submit"  name="acc" value="create" id="boton" id="btn-crear-cuenta" class="btn waves-effect  cyan darken-3">Registrar</button>
                    <a href="perfilEm.php" id="boton" class="btn waves-effect  blue-grey darken-2  " id="btn-crear-cuenta">Cancelar</a>
                    <?php echo @$_REQUEST["$msn"]; ?>   
                </section>            
            </form>          
</div></center>

</body>
</html>
