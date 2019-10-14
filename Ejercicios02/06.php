<!DOCTYPE html>
<!--
	6- Generar un número entre 1 y 10  y mostrar una muralla de  asteriscos con tantas almenas como indique el usuario. 
	Nota: una almena está formada dos filas de  cuatro asterisco,  y entre almena y almena hay un  espacio.

	2º Versión: La muralla se genera con  imágenes de ladrillos, de piedras o algo similar.	

	Ej.-
	El usuario introduce: 3
	El programa mostrará: 

	**** **** ****
	**** **** ****
	**************

	El usuario introduce: 5
	El programa mostrará:

	**** **** **** **** ****
	**** **** **** **** ****
	************************
-->
<html>
	<head>
		<title>Ejercicio 6 (2)</title>
		<style>
			img{
				margin: 3px;
			}
		</style>
	</head>
	<body>
		<?php
			function generarAlmenas($n){
				$num_lad_inf = (4*$n)+($n-1);
				$ladrillo = "<img src='./ladrillito.jpg'></img>";
				//-----------------------------------------------
				for($a = 1; $a <= $n; $a++){
					$rep = false;
					for($b = 1; $b <= 4; $b++){
						if($b == 4){
							$b = 1;
							$rep = true;
							echo $ladrillo."&nbsp <br>";
						}elseif($rep && $b == 4){
							break;
						}else{
							echo $ladrillo;
						}	
					}
				}
				echo "<br>";
				/*for($l = 1; $l <= $num_lad_inf; $l++){
					echo $ladrillo;
				}*/
			}
			//-------------------------------
			$almenas = random_int(1, 10);
			generarAlmenas(3);
		?>
	</body>
</html>