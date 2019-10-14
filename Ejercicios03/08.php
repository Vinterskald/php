<!DOCTYPE html>
<!--
    8-Generar una tabla HTML a partir del contenido de los anteriores datos.
-->
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Ejercicio 8 (3)</title>
		<style type="text/css">
            table, th, td {
            	border: 2px solid black;
            	border-collapse: collapse;
            }
        </style>
	</head>
	<body>
		<?php
            include("./infopaises.php");    
        ?>
		<h1>Tabla de países</h1>
		<table>
    		<tr>
    			<th>País</th>
    			<th>Capital</th>
    			<th>Población</th>
    			<th>Ciudades</th>
    		</tr>
    		<?php
                foreach($paises as $pais => $infopais){
            ?>
         	<tr>
        	 	<td><?php echo $pais ?></td>
        	 	<td><?php echo $infopais['Capital'] ?></td>
        	 	<td><?php echo $infopais['Poblacion'] ?></td>
        	 	<td>
        			<?php
                        foreach($ciudades[$pais] as $ciudad){
                            echo $ciudad . ", ";
                        }
                    ?>
        		</td>
    		</tr>
			<?php }?>
		</table>
		<?php
		  echo "<br><hr><br>";
		  show_source(__FILE__);
		?>
	</body>
</html>