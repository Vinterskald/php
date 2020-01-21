<!DOCTYPE html>
<!--
    2. Realizar un programa (verfichero.php) donde podamos indicar un fichero de texto plano 
    (.txt, html o php, por ejemplo) y que me lo muestre por pantalla, informando del número de caracteres 
    y del número de líneas que contiene.  
-->
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Ver fichero - Ejercicio 2 (7)</title>
	</head>
	<body>
		<form action="" method="GET" style="text-align: center;">
			<h2>Ver datos de un archivo</h2>
			<p>Elige el archivo del que quieras ver su información:</p>
			<br>
			<select id="archivo">
				<option>Archivo 1 - txt</option>
				<option>Archivo 2 - html</option>
				<option>Archivo 3 - php</option>
			</select>
			<input type="submit" name="envio" value="Consultar"/>
		</form>
		<br>
		<hr>
		<br>
		<div id="resultado" style="text-align: center;">
			<?php
			    if(isset($_REQUEST["archivo"])){
			        switch($_REQUEST["archivo"]){
			            case "Archivo 1 - txt":
			                $ruta_archivo = "./archivo1.txt";
			                break;
			            case "Archivo 2 - html":
			                $ruta_archivo = "./archivo2.html";
			                break;
			            case "Archivo 3 - php":
			                $ruta_archivo = "./archivo3.php";
			                break;
			        }
			       
			        chmod($ruta_archivo, 0755);
			        $archivo = fopen($ruta_archivo, "r");
			        
			        if(!file_exists($ruta_archivo)){
			            exit("Error: no se ha localizado el archivo.");
			        }
			        
			        if($archivo){
			            while(($buffer = fgets($archivo)) !== false){
			                
			            }
			            
			            $tamanio = filesize($archivo);
			            $contenido = fread($archivo, $tamanio);
			            if(!feof($archivo)){
			                echo "Error de E/S: EOF no encontrado.\n";
			                fclose($archivo);
			                exit();
			            }
			            fclose($archivo);
			            echo "<p>Contenido: $contenido</p><br>";
			            echo "<p>Número de caracteres: </p><br>";
			            echo "<p>Número de líneas: </p>";
			           
			        }
			       
			    }else{
			        echo "No se ha elegido ningún archivo.";
			    }
		    ?>
		</div>
	</body>
</html>