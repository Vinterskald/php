<?php
    // Funci�n para limpiar
    function filtrado($entrada){
        $entrada = trim($entrada); // Elimina espacios antes y despu�s de los datos
        $entrada = stripslashes($entrada); // Elimina backslashes \
        $entrada = htmlspecialchars($entrada); // Traduce caracteres especiales en entidades HTML
        return $entrada;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="default.css" rel="stylesheet" type="text/css" />
        <title>Ejemplo de formulario</title>
    </head>
    <body>
    	<div id="container" style="width: 600px;">
    		<div id="header">
    			<h1>DATOS PERSONALES</h1>
    		</div>
    
    		<div id="content">
    		<?php  if ($_SERVER['REQUEST_METHOD'] == "GET") { ?>
    			<form method="post" name="datos" size=15>
    				Nombre: &nbsp; <input name="nombre"><br> Apellidos: <input
    					name="apellidos" size=30> <br> Edad: <select name="edad">
    					<option>Menor de 18</option>
    					<option>Entre 18 a 30</option>
    					<option>Entre 30 a 55</option>
    					<option>Mayor de 55</option>
    					</select> 
    					<br> Sexo: 
    					<input name="sexo"  value="hombre" type=radio  checked="checked">Hombre &nbsp;
    					<input name="sexo"  value="mujer"  type=radio>Mujer <br>
    					<br> Hobbies:<br>
    					<input name="hobbies[]" value="la lectura" type="checkbox"> lectura<br>
    				    <input name="hobbies[]" value="ver la tele" type="checkbox">ver la tele<br>
    				    <input name="hobbies[]" value="hacer deporte" type="checkbox">hacer deporte <br>
    				    <input name="hobbies[]" value="salir de marcha"  type="checkbox">Salir de marcha<br> <br>
    				<button>Enviar</button>
    			</form>
    		<?php }
    		     else {
    		     $nombre = filtrado($_POST["nombre"]);
    		     $apellidos = filtrado($_POST["apellidos"]); 
    		     $msg = ($_POST['sexo'] == "hombre" )?"Bienvenido":"Bienvenida";
    		     $msg .= " $nombre $apellidos ";
    		     if ( !isset ($_POST["hobbies"])){
    		         $msg .= "no tiene aficiones de nuestra lista.";
    		     }
    		     else {
    		         $thobbies = $_POST["hobbies"];
    		         if ( count($thobbies) == 1){
    		         $msg .= "su �nica afici�n es ". $thobbies[0].".";
                     }
                     else {
                         $msg .= "sus aficiones son ";
                         for ($i=0; $i < count($thobbies)-1; $i++){
                             $msg .= $thobbies[$i].", ";
                           }
                         $msg .= " y ".$thobbies[$i];
              
                         }
                     }
                 echo $msg;
    		     }
    		     
    		     
    		
    		?>
    		</div>
    	</div>
    <hr>
    <?php show_source(__FILE__); ?>
    <hr>
    </body>
</html>