<!DOCTYPE html>
<!--
 2- Definir dos variables asignándoles un valor entero aleatorio entre 1 y 10, mostrar su suma, su resta, 
 su división, su multiplicación, su módulo y su potencia (ciclo for). 
 Crea un archivo llamado funcionesvar.php donde estén definidas las cinco operaciones: suma, resta, división, producto, módulo y potencia. 
 Incluir ese fichero dentro de fichero principal (require_once) y llamar  a las funciones para obtener el resultado.

    Ejemplo
    function calSuma( $valor1, $valor2){
      $resultado = $valor1 + valor$;
      return $resultado;
    }
    
    Ejemplo de uso de la función:
    
    $valor = calSuma(9,10); // devolverá el valor 19
    
    1º Número : 5  
    2º Número : 2
     
    5+3  = 7
    5-2  = 3
    5*2  = 10
    5/ 2 = 2.5
    5%2  = 1
    5**2 = 25   
-->
<html>
	<head>
		<title>Ejercicio 2 (2)</title>
		<meta charset="UTF-8">
	</head>
	<body>
    	<?php
    	   $var1 = random_int(1, 10);
    	   $var2 = random_int(1, 10);
    	   
    	   require_once("funcionesvar.php");
    	   
    	   echo "1er Número: $var1 <br> 2do Número: $var2 <br><br>";
    	   
    	   for($i = 0; $i < 6; $i++){
    	       switch($i){
    	           case 0:
    	               echo "$var1 + $var2 = ".sumar($var1, $var2)."<br>";
    	               break;
    	           case 1:
    	               echo "$var1 - $var2 = ".restar($var1, $var2)."<br>";
    	               break;
    	           case 2:
    	               echo "$var1 * $var2 = ".multiplicar($var1, $var2)."<br>";
    	               break;
    	           case 3:
    	               echo "$var1 / $var2 = ".dividir($var1, $var2)."<br>";
    	               break;
    	           case 4:
    	               echo "$var1 % $var2 = ".modulo($var1, $var2)."<br>";
    	               break;
    	           case 5: 
    	               echo "$var1 ** $var2 = ".potencia($var1, $var2);
    	               break;
    	       }
    	   }
        ?>
    </body>
</html>