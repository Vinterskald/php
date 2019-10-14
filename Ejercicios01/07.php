<!DOCTYPE html>
<!--
    7- Elegir tres valores entre 100 y 500 y pintar tres barras de color rojo, verde y azul del tamaño indicado.
    Pista: Utilizar  3 tablas con una fila del tamaño generado.
-->
<html>
	<head>
		<title>Ejercicio 7 (1)</title>
		<meta charset="UTF-8">
		<style>
		  table{
		      margin: 0;
		  }  
		  td{
		      padding: 10px;
		  }
		</style>
	</head>
	<body>
    	<?php
    	   $rojo = random_int(100, 500);
    	   $verde = random_int(100, 500);
    	   $azul = random_int(100, 500);
    	   
    	   echo "
                <table>
                    <tr>
                        <td style='width: ".$rojo."px; background-color: red;'>Rojo($rojo)</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td style='width: ".$verde."px; background-color: green;'>Verde($verde)</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td style='width: ".$azul."px; background-color: blue;'>Azul($azul)</td>
                    </tr>
                </table>
           ";
        ?>
    </body>
</html>