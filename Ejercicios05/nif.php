<!DOCTYPE html>
<!--
    1.Crea un archivo PHP llamado nif.php que solicite un número de DNI y me muestre su letra NIF correspondiente, 
    se tiene que comprobar tanto en la parte cliente como servidor que el valor introducido está formado solo por 
    dígitos. La primera vez se mostrará el formulario y tras rellenar el campo DNI se invocará al propio script por  
    el método POST para que muestre la letra del NIF correspondiente.

    Para saber qué letra le corresponde a un número, se divide el número entre 23 y el resto se sustituye por una letra
    determinada por la tabla:
    
    +---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+
    | T | R | W | A | G | M | Y | F | P | D | X | B | N | J | Z | S | Q | V | H | L | C | K | E |
    +---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+
    
    Realiza el resto del cálculo mediante una función y almacenar la tabla anterior en un array.
-->
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ejercicio 1 (5) - Cálculo de NIF</title>
		<style>
		  div{
		      text-align: center;
		  }
		</style>
	</head>
	<body>
		<?php
		    //Funciones y variables globales para el script:
		    function obtenerLetraDNI($num){
		        $letras = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", 
		                   "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];
		        
		        $letra = $letras[($num % 23)];
		        return $letra;
		    }
		    //-------------------------------------------------------------
		    
            if($_SERVER["REQUEST_METHOD"] == "POST" || isset($_REQUEST["enviar"])){
                $numero = $_REQUEST["numdni"];
                echo "<div>";
                if(!empty($numero)){
                    if(!is_numeric($numero)){
                        echo "Se ha producido un error con el campo de número; debe ser numérico.<br>";
                    }elseif($numero < 10000000){
                        echo "Se ha producido un error con el campo de número: el número de DNI no puede estar formado por menos de 8 dígitos.<br>";
                    }elseif($numero > 99999999){
                        echo "Se ha producido un error con el campo de número: el número de DNI no puede estar formado por más de 8 dígitos.<br>";
                    }else{
                        echo "Bienvenido/a. <br><br> A el DNI introducido, ".$numero.", le corresponde la letra ".obtenerLetraDNI($numero).".<br>";
                    }
                }else{
                    echo "Se ha producido un error con el campo de número: no se ha enviado ningún número.<br>";    
                }             
                echo "<br><a href=''>Volver a formulario.</a>";
                echo "</div>";
            }else{
                echo "
                    <div>
                        <form name='form_nif' action='' method='POST'>
                            <h1>Generar letra de DNI</h1>
                            <br>
                            <p>Introduce tu número de DNI para comprobar su letra.</p>
                            <br>
                            <input type='number' name='numdni' min='10000000' max='99999999'/>
                            <br><br>
                            <input type='submit' name='enviar' value='Enviar'/>    
                        </form>
                    </div>
                ";
            }
		?>
	</body>
</html>
<?php
    echo "<br><hr><br>";
    show_source(__FILE__);	   
?>