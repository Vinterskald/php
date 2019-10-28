<!DOCTYPE html>
<!--
    3.Realizar el script vermes.php que muestre un formulario en el que el usuario pueda introducir un mes y un año, y muestre el calendario  
    correspondiente a ese mes según el formato de figura. El formulario tendrá dos campos select donde el usuario podrá seleccionar 
    el nombre de los meses y los años desde 1980 al año actual (generar el año actual de forma automática).  
-->
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ejercicio 3 (5) - Generador de calendarios</title>
		<style type="text/css">
		  #calendario, #formulario{
		      border: 2px solid black;
		      margin: 0px;
		  }
		  #calendario{
		      display: inline-block;
		  }
		  #formulario{
		      text-align: center;
		  }
		</style>
	</head>
	<body>
		<div id="formulario">
			<form name="form_cal" action="" method="POST">
				<h1>Bienvenido / a al generador de calendarios</h1>
				<br>
				<label>Mes:</label>
				<select name="mes">
					<option value="Enero">Enero</option>
					<option value="Febrero">Febrero</option>
					<option value="Marzo">Marzo</option>
					<option value="Abril">Abril</option>
					<option value="Mayo">Mayo</option>
					<option value="Junio">Junio</option>
					<option value="Julio">Julio</option>
					<option value="Agosto">Agosto</option>
					<option value="Septiembre">Septiembre</option>
					<option value="Octubre">Octubre</option>
					<option value="Noviembre">Noviembre</option>
					<option value="Diciembre">Diciembre</option>
				</select>
				<label>Año:</label>
				<select name="anio">
				</select>
				<input type="submit" name="enviar" value="Enviar"/>
			</form>
		</div>
		<div id="calendario">
		</div>
	</body>
</html>
<?php
    echo "<br><hr><br>";
    echo show_source(__FILE__);
?>