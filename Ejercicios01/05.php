<!DOCTYPE html>
<!--
	5- Realizar un segunda versión del primer ejercicio donde la página de resultado tiene que mostrar una tabla con el siguiente formato utilizando estilo.

	1º Número : 5  
	2º Número : 2
	
	+------------------------+
	|Operación	|	Resultado|
	+-----------+------------+
	|5+2		|			7|
	+-----------+------------+
	|5-2		|			3|
	+-----------+------------+
	|5*2		|		   10|
	+-----------+------------+
	|5/2		|		  2.4|
	+-----------+------------+
	|5%2		|			1|
	+-----------+------------+
	|5^2		|		   25|
	+------------------------+
-->
<html>
	<head>
		<title>Ejercicio 5 (1)</title>
		<style>
			table{
				padding: 20px;
				border-collapse: collapse;
			}
			.L{
				text-align: left;
			}
			.R{
				text-align: right;
			}
			th{
				font-size: 25px;
				color: blue;
				background-color: grey;
			}
			tr, td, th{
				border: 2px solid black;
			}
		</style>
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
			
			echo "Número 1: $num1 <br> Número 2: $num2 <br>";
		?>
		<br>
		<table>
			<tr>
				<th class="L">Operación</th>
				<th class="R">Resultado</th>
			</tr>
			<tr>
				<td class="L"><?php echo "$num1 + $num2"; ?></td>
				<td class="R"><?php echo $suma; ?></td>
			<tr>
				<td class="L"><?php echo "$num1 - $num2"; ?></td>
				<td class="R"><?php echo $resta; ?></td>
			</tr>
			<tr>
				<td class="L"><?php echo "$num1 * $num2"; ?></td>
				<td class="R"><?php echo $mult; ?></td>
			</tr>
			<tr>
				<td class="L"><?php echo "$num1 / $num2"; ?></td>
				<td class="R"><?php echo $divi; ?></td>
			</tr>
			<tr>
				<td class="L"><?php echo "$num1 % $num2"; ?></td>
				<td class="R"><?php echo $mod; ?></td>
			</tr>
			<tr>
				<td class="L"><?php echo "$num1^$num2"; ?></td>
				<td class="R"><?php echo $pot; ?></td>
			</tr>
		</table>
	</body>
</html>