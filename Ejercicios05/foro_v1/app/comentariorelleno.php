<?php
    $asunto = htmlspecialchars($_REQUEST["asunto"]);
    $comentario = htmlspecialchars($_REQUEST["comentario"]);
?>
<form id="form_com" name="comentario_rell" method="POST">
	<label>Tema:</label><br>
	<input type="text" name="asunto" value="<?php echo $asunto; ?>" readonly/>
	<br><br>
	<label>Comentario:</label><br>
	<textarea name="comentario" style="resize: none;" rows="10" cols="50" maxlength="300" readonly><?php echo $comentario; ?></textarea>
	<br><br>
	<div>
		<input type="submit" name="orden" value="Detalles"/>
		<input type="submit" name="orden" value="Nueva opinión"/>
		<input type="submit" name="orden" value="Terminar"/>
	</div>
</form>