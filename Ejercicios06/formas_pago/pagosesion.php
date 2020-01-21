<?php
    if(empty($_SESSION)){
        session_start();
    } 
?>
<!DOCTYPE html>
<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <title>Forma de pago - Sesiones</title> 
    </head> 
    <body> 
    	<?php
    	   //Tiempo de 3 minutos para la sesión.
    	   $tiempo = $_SERVER["REQUEST_TIME"];
    	   $timeout = 180; //Segundos
    	   
    	   if(isset($_SESSION["LAST_ACTIVITY"]) && ($tiempo - $_SESSION["LAST_ACTIVITY"]) > $timeout){
    	       $tarjeta_actual = "<h2>NO TIENE FORMA DE PAGO ASIGNADA</h2><br>";
    	       session_unset();
    	       session_destroy();
    	   }else{
        	   if($_SERVER["REQUEST_METHOD"] == "GET"){
        	       if(isset($_REQUEST["nuevatarjeta"])){
        	           $_SESSION["tarjeta"] = $_REQUEST["nuevatarjeta"];
        	           $tarjeta_actual = "<img src='./imagenes/".$_SESSION["tarjeta"].".gif'></img>";
        	       }else{
        	           if(!isset($_SESSION["tarjeta"])){
        	               $tarjeta_actual = "<h2>NO TIENE FORMA DE PAGO ASIGNADA</h2><br>";
        	           }else{
        	               $tarjeta_actual = "<img src='./imagenes/".$_SESSION["tarjeta"].".gif'></img>";
        	           }
        	       }
        	   }
    	   }
    	   
    	   $_SESSION["LAST_ACTIVITY"] = $tiempo;
    	?>
        <center> 
		 	<H2> SU FORMA DE PAGO ACTUAL ES:</H2> <br> 
	        <?php echo $tarjeta_actual;?> 
	        <h2>SELECCIONE UNA NUEVA TARJETA DE CRÉDITO </h2><br> 
	        <a href='pagosesion.php?nuevatarjeta=cashu'><img  src='imagenes/cashu.gif' /></a>&ensp; 
	        <a href='pagosesion.php?nuevatarjeta=cirrus1'><img  src='imagenes/cirrus1.gif' /></a>&ensp; 
	        <a href='pagosesion.php?nuevatarjeta=dinersclub'><img  src='imagenes/dinersclub.gif' /></a>&ensp; 
	        <a href='pagosesion.php?nuevatarjeta=mastercard1'><img  src='imagenes/mastercard1.gif'/></a>&ensp; 
	        <a href='pagosesion.php?nuevatarjeta=paypal'><img  src='imagenes/paypal.gif' /></a>&ensp; 
	        <a href='pagosesion.php?nuevatarjeta=visa1'><img  src='imagenes/visa1.gif' /></a>&ensp; 
	        <a href='pagosesion.php?nuevatarjeta=visa_electron'><img  src='imagenes/visa_electron.gif'/></a><br><br>
        </center> 
    </body> 
</html>