<!DOCTYPE html>
<!--
    7-Crear otro programa que use estos datos y elija un país al azar indicando sus datos y el nombre de 
    sus ciudades y un enlace generado a google map: ‘https://www.google.es/maps/place/’.$paiselegido
-->
<html>
	<head>
		<title>Ejercicio 7 (3)</title>
	</head>
	<body>
		<?php
            include("./infopaises.php");
            
            $pais = array_rand($paises);
            
            echo "País Elegido : ".$pais.", con ".number_format($paises[$pais]['Poblacion'], 0, ',', '.'). " habitantes <br/>";
            echo "<br>Lista de Ciudades: ";
            echo "<ul style='list-style-type: none;'>";
            foreach($ciudades[$pais] as $ciudad){
                echo "<li>$ciudad</li>";
            }
            echo "</ul>";
            echo "<br/>Enlace a Google Maps: ";
        ?>
		<a href="https://www.google.es/maps/place/<?php echo $pais?>">Maps</a>
		<?php
		  echo "<br><hr><br>";
		  show_source(__FILE__);
		?>
	</body>
</html>