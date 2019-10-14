<!DOCTYPE html>
<!--
  1-Realizar y probar una función en PHP  llamada elMayor  que reciba tres números: A,B y C. 
  La función almacenará en C el valor que sea mayor A o B. En el caso sean iguales almacenará el valor 0 en C. 
  ¿Qué parámetros se deberían pasar por valor o copia y cuales por referencia?  
-->
<html>
	<head>
		<title>Ejercicio 1 (2)</title>
	</head>
	<body>
    	<?php
    	   $c = "";   
    	
    	   function elMayor($a, $b, &$c){
    	       if($a > $b){
    	           $c = $a;
    	       }elseif($a < $b){
    	           $c = $b;
    	       }else{
    	           $c = 0;  
    	       }
    	   }
    	   
    	   elMayor(random_int(1,9), random_int(1,9), $c);
    	   echo $c;
        ?>
    </body>
</html>