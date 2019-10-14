<!DOCTYPE html>
<!-- 
4 - Generar números al azar entre 1 y 10 hasta que se generen 3 veces el valor 6 de forma 
	consecutiva en ese caso se mostrará cuantos número se han generado.
	Han salido tres 6 seguidos tras genera 1343 números en 1.002 milisegundos
	Para obtener los segundos utilizamos la función microtime(true)  para obtener la fecha actual en segundos.
-->
<html>
	<head>
		<title>Ejercicio 4 (1)</title>
	</head>
	<body>
		<?php
			$cont = 0;
			$cont_seises = 0;
			
			while($cont_seises < 3){
				$num = random_int(1, 10);
				if($num == 6){
					$cont_seises++;
				}else{
					$cont_seises = 0;
				}
				$cont++;
			}
			
			echo "Han salido tres 6 seguidos tras generar $cont números en ".microtime(true)." milisegundos.";
		?>
	</body>
</html>