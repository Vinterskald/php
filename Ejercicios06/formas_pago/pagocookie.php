<!DOCTYPE html>
<?php
    //La definición de las cookies ha de ir antes de cualquier salida de código, así que por protocolo va antes que
    //cualquier etiqueta de html, dado que la cookie es un dato que se envía en la cabecera, y se ha procesar antes
    //que otra información del archivo.
    if(isset($_COOKIE["tarjeta"])){
        $tarjeta_actual = "<img src='./imagenes/".$_COOKIE["tarjeta"].".gif'></img>"; 
    }
    
    if(isset($_REQUEST["nuevatarjeta"])){
        setcookie("tarjeta", $_REQUEST["nuevatarjeta"], time() + 180); //La cookie expira en 3 minutos.
    }
    
    if(!isset($_REQUEST["nuevatarjeta"]) && !isset($_COOKIE["tarjeta"])){
        $tarjeta_actual = "<h2>NO TIENE FORMA DE PAGO ASIGNADA</h2><br>";
    }
?>
<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <title>Forma de pago - Cookies</title> 
    </head> 
    <body> 
        <center> 
		 	<H2> SU FORMA DE PAGO ACTUAL ES</H2> <br> 
	        <?php echo $tarjeta_actual;?>   
	        <h2>SELECCIONE UNA NUEVA TARJETA DE CREDITO </h2><br> 
	        <a href='pagocookie.php?nuevatarjeta=cashu'><img  src='imagenes/cashu.gif' /></a>&ensp; 
	        <a href='pagocookie.php?nuevatarjeta=cirrus1'><img  src='imagenes/cirrus1.gif' /></a>&ensp; 
	        <a href='pagocookie.php?nuevatarjeta=dinersclub'><img  src='imagenes/dinersclub.gif' /></a>&ensp; 
	        <a href='pagocookie.php?nuevatarjeta=mastercard1'><img  src='imagenes/mastercard1.gif'/></a>&ensp; 
	        <a href='pagocookie.php?nuevatarjeta=paypal'><img  src='imagenes/paypal.gif' /></a>&ensp; 
	        <a href='pagocookie.php?nuevatarjeta=visa1'><img  src='imagenes/visa1.gif' /></a>&ensp; 
	        <a href='pagocookie.php?nuevatarjeta=visa_electron'><img  src='imagenes/visa_electron.gif'/></a>
        </center> 
    </body> 
</html>