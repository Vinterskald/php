<fieldset>
	<legend align="left">Datos personales</legend>
	<br>
    	<form name="datos_personales" action="" method="POST">
    	<ul>
    		<li><label>Nombre:</label><input type="text" name="nombre"/></li>
    		<li><label>Apellidos:</label><input type="text" name="apellido"/></li>
    		<?php
                //Formato para la fecha actual (para el siguiente campo del formulario).
    		   date_default_timezone_set("Europe/Madrid");
    		   $fecha_hoy = date('Y-m-d');
    		?>
    		<li>
    			<label>Fecha de nacimiento:</label>
    			<input type="date" name="fecha_nac" min="1900-01-01" max="<?php echo $fecha_hoy; ?>" value="<?php  ?>"/>
    		</li>
    		<li>
    			<label>Género:</label>&nbsp;
    			<label>Mujer <input type="radio" name="genero" value="mujer"/></label>&nbsp;
    			<label>Hombre <input type="radio" name="genero" value="hombre"/></label>&nbsp;
    			<label>Otro <input type="radio" name="genero" value="otro"/></label>
    		</li>
    		<li><label>Casad@ o pareja de hecho:</label><input type="checkbox" name="cas_par"/></li>
    		<li><label>Hijo(s):</label><input type="checkbox" name="hijos"/></li>
    		<li>
    			<label>Nacionalidad:</label><br> 
    			<select multiple>
    				<optgroup label="Europea">
    					<option>Sueca</option>
    					<option>Islandesa</option>
    					<option>Finesa</option>
    					<option>Danesa</option>
    					<option>Alemana</option>
    					<option>Francesa</option>
    					<option>Española</option>
    					<option>Portuguesa</option>
    					<option>Holandesa</option>
    					<option>Luxemburguesa</option>
    					<option>Croata</option>
    					<option>Polaca</option>
    					<option>Letona</option>
    					<option>Estonia</option>
    					<option>Lituana</option>
    					<option>Checa</option>
    					<option>Búlgara</option>
    					<option>Húngara</option>
    					<option>Italiana</option>
    					<option>Griega</option>
    					<option>Inglesa</option>
    					<option>Irlandesa</option>
    					<option>Escocesa</option>
    				</optgroup>
    				<option>Africana*</option>
    				<option>Asiática*</option>
    				<option>Australiana</option>
    				<option>Neozelandesa</option>
    				<optgroup label="Americana">
    					<option>Norteamericana</option>
    					<option>Latinoamericana</option>
    				</optgroup>
    				<option>Noruega</option>
    				<option>Canadiense</option>
    				<option>Rusa</option>
    				<option>Groenlandesa (Danesa)</option>
    				<option>Otra</option>
    			</select>
    		</li>
    	</ul>
    	<input type="submit" value="Siguiente" name="boton"/>
	</form>
</fieldset>