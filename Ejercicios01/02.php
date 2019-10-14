<!DOCTYPE html>
<!--
2 - Obtener un número al azar entre 1 y 9 y generar una escalera numérica del tamaño 
	indicado alternando colores entre rojo y azul.*/
-->
<html>
	<head>
		<title>Ejercicio 2 (1)</title>
		<style>
			ul{ 
				list-style-type: none;
			}
		</style>
	</head>
	<body>
		<?php
			$num = random_int(1,9);
			echo "Número generado = $num <br><br>";
		?>
		<ul>
			<?php
				for($i = 1; $i <= $num; $i++){
					echo "<li style='";
					if($i % 2 == 0){ 
						echo "color: red;";
					}else{
						echo "color: blue;";
					}
					echo "'>";
					for($f = 0; $f < $i; $f++){
						echo "$num";
					}
					echo "</li>";
				}
			?>
		</ul>
	</body>
</html>