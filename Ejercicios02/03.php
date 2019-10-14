<!DOCTYPE html>
<!--
  3 - Hacer una nueva versión  del ejercicio anterior pero creando un nuevo fichero de funciones (funcionesref.php)
  donde cada función tenga tres parámetros; los dos primeros por valor y el último por referencia.

  Ejemplo:
    function calSuma($valor1, $valor2, &$resultado){
        $resultado = $valor1 + valor$;
    }

  Ejemplo de uso de la función:
    calSuma(9,10,$valor);  // almacena en la variable valor el número 19     
-->
<html>
	<head>
		<title>Ejercicio 3 (2)</title>
		<meta charset="UTF-8">
	</head>
	<body>
    	<?php
    	$var1 = random_int(1, 10);
    	$var2 = random_int(1, 10);
    	
    	require_once("funcionesref.php");
    	
    	echo "1er Número: $var1 <br> 2do Número: $var2 <br><br>";
    	
    	for($i = 0; $i < 6; $i++){
    	    $resultado = 0;
    	    switch($i){
    	        case 0:      
    	            echo "$var1 + $var2 = ".sumar($var1, $var2, $resultado)."<br>";
    	            break;
    	        case 1:
    	            echo "$var1 - $var2 = ".restar($var1, $var2, $resultado)."<br>";
    	            break;
    	        case 2:
    	            echo "$var1 * $var2 = ".multiplicar($var1, $var2, $resultado)."<br>";
    	            break;
    	        case 3:
    	            echo "$var1 / $var2 = ".dividir($var1, $var2, $resultado)."<br>";
    	            break;
    	        case 4:  
    	            echo "$var1 % $var2 = ".modulo($var1, $var2, $resultado)."<br>";
    	            break;
    	        case 5:      
    	            echo "$var1 ** $var2 = ".potencia($var1, $var2, $resultado);
    	            break;
    	    }
    	}
        ?>
    </body>
</html>