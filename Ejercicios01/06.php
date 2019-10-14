<!DOCTYPE html>
<!-- 
	6- Generar la  tabla de multiplicar de un número elegido al azar entre 1 y 10 con la siguiente apariencia:
	
	TABLA DE MULTIPLICAR
	
	+--------------+
	|Tabla del 5|  |
	+-----------+--+
	|5 x 1	=	| 5|
	+-----------+--+
	|5 x 2	=	|10|
	+-----------+--+
	|5 x 3 =	|15|
	+-----------+--+
	|5 x 4 =	|20|
	+-----------+--+
	|5 x 5 =	|25|
	+-----------+--+
	|5 x 6 =    |30|
	+-----------+--+
	|5 x 7 =    |35|
	+-----------+--+
	|5 x 8 =    |40|
	+-----------+--+
	|5 x 9 =    |45|
	+-----------+--+
	|5 x 10 =   |50|
	+--------------+
-->
<html>
	<head>
		<title>Ejercicio 6 (1)</title>
		<style>
		  h1{
		      background-color: blue;
		      padding: 1em;
		      width: fit-content;
		  }
		  .L{
		      text-align: left;
		  }
		  .R{
		      text-align: right;
		      width: fit-content;
		  }
		  table{
		      border-collapse: collapse;
		  }
		  tr, td, th{
		      border: 2px solid black;
		  }
		</style>
	</head>
	<body>
		<h1>TABLA DE MULTIPLICAR</h1>
		<br>
		<?php
			$num = random_int(1, 10);
			
			echo "
                <table>
                    <tr>
                        <th class='L'>Tabla del $num</th>
                        <th></th>
                    </tr>
            ";
			for($i = 1; $i <= 10; $i++){
			    echo "
                    <tr>
                        <td class='L'>$num x $i =</td>
                        <td class='R'>".($num*$i)."</td>
                    </tr>
                ";
			}
			echo "</table>";
		?>
	</body>
</html>