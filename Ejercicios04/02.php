<!DOCTYPE html>
<!--
    2- Crear página que simule un calculadora sencilla, mediante un único archivo php que mostrará un formulario 
    con dos campos numéricos y 4 botones con los 4 tipos de operaciones + - * /  posibles. 
    Se incluirá también 3 controles de tipo radio que indicarán como queremos que se muestre el resultado en decimal, 
    binario o hexadecimal.
    El programa php debe comprobar que se han recibido los dos valores numéricos y detectará el error 
    de intento de división por cero. Mostrará el resultado calculado según el formato elegido. 
    
    Por omisión se mostrará en decimal. 
-->
<html>
	<head>
		<title>Ejercicio 2 (4)</title>
		<style>
		  div{
		      text-align: center; 
		      margin: auto;
		  }
		  ul{
		      list-style-type: none;
		  }
		</style>
	</head>
	<body>
		<div>
    		<form name="form02" action="" method="GET">
    			<br>
    			<h2>Calculadora sencilla</h2>
    			<br>
    			<input type="number" name="num1" placeholder="Primer valor" required /> 
    			<br><br>
    			<input type="number" name="num2" placeholder="Segundo valor" required />
    			<br><br>
    			<div>
        			<ul id="operaciones">
            			<li><label><input type="radio" value="Sumar" name="operacion" checked/>Sumar</label></li>
            			<li><label><input type="radio" value="Restar" name="operacion"/>Restar</label></li>
            			<li><label><input type="radio" value="Multiplicar" name="operacion"/>Multiplicar</label></li>
            			<li><label><input type="radio" value="Dividir" name="operacion"/>Dividir</label></li>
            		</ul>
            	</div>
    			<br>
        		<p>Resultado mostrado en:</p>
        		<div>
        			<ul id="numsis">
            			<li><label><input type="radio" value="Decimal" name="sis" checked/>Decimal</label></li>
            			<li><label><input type="radio" value="Binario" name="sis"/>Binario</label></li>
            			<li><label><input type="radio" value="Hexadecimal" name="sis"/>Hexadecimal</label></li>
        			</ul>
        		</div>
        		<br>
        		<input type="submit" value="Calcular" name="calcular"/>
    		</form>
    		<br><br>
    		<p><strong>Resultado:</strong></p>
    		<?php 
    		  if(isset($_REQUEST["operacion"])){
    		      if(!isset($_REQUEST["num1"]) || !isset($_REQUEST["num2"])){
    		          echo "<p>Error en alguno de los valores a calcular.</p>";
    		          exit();
    		      }else{
    		          $n1 = $_REQUEST["num1"];
    		          $n2 = $_REQUEST["num2"];
    		      }
    		      $op = $_REQUEST["operacion"];
    		      $nsis = $_REQUEST["sis"];
    		      //-----------------------------
    		      switch($nsis){
    		          case "Binario":
    		              $n1 = decbin($n1);
    		              $n2 = decbin($n2);
    		              break;
    		          case "Hexadecimal":
    		              $n1 = dechex($n1);
    		              $n2 = dechex($n2);
    		              break;
    		      }
    		      switch($op){
    		          case "Sumar":
    		              echo ($n1 + $n2);
    		              break;
    		          case "Restar":
    		              echo ($n1 - $n2);
    		              break;
    		          case "Multiplicar":
    		              echo ($n1 * $n2);
    		              break;
    		          case "Dividir":
    		              if($n1 == 0 || $n2 == 0){
    		                  echo "Error de cálculo";
    		              }else{
    		                  echo ($n1 / $n2);
    		              }
    		              break;
    		      }
    		  }else{
    		      echo "<p>Esperando respuesta.</p>";
    		  }
    		?>
		</div>
		<hr>
		<?php
		  echo "<br><br>";
		  show_source(__FILE__);
		?>
	</body>
</html>