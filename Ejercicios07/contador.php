<!DOCTYPE html>
<!--
    1. Realizar programa php (contador.php) que muestre cuántas veces se ha accedido a la página en total y cuántas
       veces desde un mismo navegador trabajando sobre un fichero llamado accesos.txt y con un valor de cookie válido 
       por tres meses.
-->
<html>
	<?php
    	//Primero, si no existe la cookie de las veces que se ha visitado la página, la crea, y se usará
    	//de soporte para recopilar la información progresiva e ir añadiéndola y leyéndola en el archivo.
    	//(Este código tendrá que preceder a todo lo demás porque la cookie se envía como cabecera, igual que header()).
    	if(!isset($_COOKIE["veces"])){
    	    setcookie("veces", 0, time() + (30*86400)*3); //La cookie expira en 3 meses.
    	    $cookie_cont = 0;
    	}else{
    	    //Si ya existe la cookie, entonces las visitas generales aumentan en 1.
    	    $cookie_cont++;
    	    $_COOKIE["veces"] = $cookie_cont;
    	}
	?>
	<head>
		<meta charset="UTF-8">
		<title>Contador - Ejercicio 1 (7)</title>
	</head>
	<body>
		<?php
    		//Variable con la ruta del fichero al que voy a apuntar.
    		$ruta_fichero = "./accesos.txt";
    		//------------------------------	
            //-Acceder al archivo y escribir en él la información de visita:
            //Primer checkeo, que comprobará si el archivo está donde se le indica y, si no, detiene la ejecución.
            if(!file_exists($ruta_fichero)){
                exit("Error: no se ha localizado el archivo.");
            }
            $archivo = fopen($ruta_fichero, "w");            
            if(!feof($archivo)){
                echo "Error de E/S: EOF no encontrado.\n";
                fclose($archivo);
                exit();
            }
            $datos = "Has accedido ".$cookie_cont." veces a la página en total. \n Has accedido ".$cont_nav." veces desde tu navegador actual.";
            //Escribo en el archivo con los nuevos datos:
            fwrite($archivo, $datos);
            //Y cierro el flujo de datos a el archivo que abrí con modo r+.
            fclose($archivo);
            //-----------------------------------------
            //-Lectura de archivo donde se mostrará la información según actúe el script en el bloque anterior:
            $archivo = fopen($ruta_fichero, "r");
            if($archivo){
                echo $_COOKIE["veces"]."<br>";
                echo $navegador."<br>";
                //Lectura del fichero línea a línea
                while(($linea = fgets($archivo)) !== false){
                    echo $linea;
                }
                if(!feof($archivo)){
                    echo "Error de E/S: EOF no encontrado.\n";
                }
                fclose($archivo);
            }
		?>
	</body>
</html>