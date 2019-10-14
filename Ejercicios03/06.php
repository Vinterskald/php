<!DOCTYPE html>
<!--
    6-Incluir el archivo infopaises.php en un programa php que me muestre el país que tiene mas población y 
    el nombre de sus ciudades. El programa debe buscar en las tablas.  
-->
<html>
	<head>
		<title>Ejercicio 6 (3)</title>
	</head>
	<body>
		<?php
            include("./infopaises.php");
            
            foreach($paises as $clave => $valor){
                echo $paises[$clave]["Capital"]."<br>";
            }
		?>
		<?php
		  echo "<br><hr><br>";
		  show_source(__FILE__);
		?>
	</body>
</html>