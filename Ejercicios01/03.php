<!DOCTYPE html>
<!--
3 - Obtener un número al azar entre 1 y 9 y generar una pirámide con ese número de peldaños.
	Utilizar la marca <code></code> para que la visualización no se deforme por el tamaño de los espacios o una estilo con tipo de letra monospace.
-->
<html>
	<head>
		<title>Ejercicio 3 (1)</title>
	</head>
	<body>
		<?php
			$num = random_int(1,9);
			
			echo "Número generado: $num <br>";
			echo "<code>";
			for($i = 1; $i <= $num; $i++){
				for($j = 1; $j <= $num-$i; $j++){
					echo "&nbsp";
				}
				for($x = 1; $x <= ($i*2)-1; $x++){
					echo "*";
				}
				echo "<br>";
			}
			echo "</code>";
		?>
	</body>
</html>