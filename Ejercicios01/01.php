<!DOCTYPE html>
<!--
1 - Definir dos variables asignándoles un valor entero aleatorio entre 1 y 10 y mostrar su suma, 
	su resta, su división, su multiplicación, módulo y potencia (ciclo for).
-->
<html>
	<head>
		<title>Ejercicio 1 (1)</title>
	</head>
	<body>
		<?php
			$num1 = random_int(1,10);
			$num2 = random_int(1,10);
			
			$suma = 0; $resta = 0; $mult = 0; $divi = 0; $mod = 0; $pot = 0;
			for($i = 0; $i < 6; $i++){
				switch($i){
					case 0:
						$suma = $num1 + $num2;
						break;
					case 1:
						$resta = $num1 - $num2;
						break;
					case 2:
						$mult = $num1 * $num2;
						break;
					case 3:
						$divi = $num1 / $num2;
						break;
					case 4:
						$mod = $num1 % $num2;
						break;
					case 5:
						$pot = $num1 ** $num2;
						break;
				}
			}
			echo "$num1 + $num2 = ".$suma."<br><br>";
			echo "$num1 - $num2 = ".$resta."<br><br>";
			echo "$num1 * $num2 = ".$mult."<br><br>";
			echo "$num1 / $num2 = ".$divi."<br><br>";
			echo "$num1 % $num2 = ".$mod."<br><br>";
			echo "$num1 ** $num2 = ".$pot."<br><br>";
		?>
	</body>
</html>