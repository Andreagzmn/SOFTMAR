<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<link type="text/css" rel="stylesheet" href="estilos.css">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Gestionar servicios empresa</title>
</head>
<body>
	<div class="row">
		<h4 class="tit">Registrar Servicios</h4>
		<form action="../Controller/Gestionar_servicio_emp.controller.php" method="POST" class="contenedor"class="col s12">
			<div class="row">
				<div class="input-field col s12">
					<input id="first_name" type="number" class="validate" required>
					<label for="first_name">Código empresa</label>
                </div>
                <div class="input-field col s12">
                    <input id="last_name" type="text" class="validate" required>
                    <label for="last_name">Nombre del servicio</label>
                </div>
				<div class="input-field col s12">
					<input id="first_name" type="text" class="validate" required>
					<label for="first_name">Descripción</label>
                </div>
            </div>
            <div class="input-field col s10">
          	    <select required>
                    <option value="" disabled selected>---Seleccione estado---</option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="first_name" type="text" class="validate" required>
                    <label for="first_name">Valor</label>
                </div>
            </div>  
            <div class="row">
                <button id="botn" id="boton" class="btn waves-effect #1565c0 blue darken-3" name="action" value="c"><i class="material-icons right">done</i>Registrar servicio</button> 
            </div>          
        </form>
    </div>    
    <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('select').material_select();
        });
    </script>
</body>
</html>
