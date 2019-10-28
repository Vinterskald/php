<br><b>Detalles:</b><br><br>
<table id="detalles">
	<tr>
		<td>Longitud: </td>
		<td><?php echo "&nbsp;".long_texto($_REQUEST["comentario"]); ?></td>
	</tr>
	<tr>
		<td>Nº de palabras: </td>
		<td><?php echo "&nbsp;".num_palabras($_REQUEST["comentario"]); ?></td>
	</tr>
	<tr>
		<td>Letra más repetida: </td>
		<td><?php echo "&nbsp;".letra_masrep($_REQUEST["comentario"]); ?></td>
	</tr>
	<tr>
		<td>Palabra más repetida: </td>
		<td><?php echo "&nbsp;".palabra_masrep($_REQUEST["comentario"]); ?></td>
	</tr>
</table>