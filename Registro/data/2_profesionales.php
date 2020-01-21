<fieldset>
	<legend align="left">Datos profesionales</legend>
	<form name="datos_profesionales" action="" method="POST">
		<ul>
			<li>
				<label>Departamento</label>
				<select id="departamento">
					<option>Contabilidad</option>
					<option>Informática</option>
					<option>Almacén</option>
					<option>Ventas</option>
				</select>
			</li>
			<li><label>Salario</label><input type="number" name="salario" min="0"/></li>
			<li>
				<label>Comentarios:</label>
				<textarea rows="30" name="comentarios"></textarea>
			</li>
		</ul>
		<input type="submit" class="anterior" value="Anterior" name="boton"/>
		<input type="submit" value="Siguiente" name="boton"/>
	</form>
</fieldset>