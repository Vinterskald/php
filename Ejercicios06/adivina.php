<!DOCTYPE html>
<?php
    if(empty($_SESSION)){
        session_start();
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		<title>Adivina número</title>
		<style type="text/css">
            #contenido{
                text-align: center;
            }
            a{
                text-decoration: none;
            }
		</style>
	</head>
	<body>
		<div id="contenido">
			<br>
			<h2>Adivina un número</h2>
			<p>Tienes 5 intentos para adivinar el número, entre 1 y 20.</p>
			<br>
			<?php
                if(!isset($_SESSION["adivina"])){
                   $_SESSION["adivina"] = random_int(1, 20);
                   $_SESSION["fallos"] = 0;
                   $_SESSION["maxfallos"] = 5;
                }
                
                if(isset($_REQUEST["numero"])){
                    $numero = $_REQUEST["numero"];
                    if($numero != $_SESSION["adivina"]){
                        $_SESSION["fallos"]++;
                    }else{
                        session_unset();
                        session_destroy();
                        echo "¡Has acertado! <br> El número era $numero.<br><br>";
                        echo "<a href='adivina.php?reiniciar'>Volver a empezar</a>";
                        exit();
                    }
                }
                
                if($_SESSION["fallos"] < $_SESSION["maxfallos"]){
                    if($_SESSION["fallos"] > 0){
                        echo "Tienes ".$_SESSION["fallos"]." fallos.<br><br>";    
                    }
                    echo "
                        <form action='' method='GET'>
                            <input type='number' min='1' max='20' name='numero'>
                            <br><br>
                            <input type='submit' value='Comprobar'>
                            <br><br>
                            (".$_SESSION["adivina"].")
                        </form>
                    ";
                }else{
                    session_unset();
                    session_destroy();
                    echo "¡Ups! Has perdido.<br><br>";
                    echo "<a href='adivina.php?reiniciar'>Volver a empezar</a>";
                }
			?>
		</div>
	</body>
</html>