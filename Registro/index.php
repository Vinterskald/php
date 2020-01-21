<!DOCTYPE html>
<?php
    if(empty($_SESSION)){
        session_start();
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Formulario de registro con pasos</title>
		<style type="text/css">
            #contenido{
                margin: 0 auto;
                border: 1px solid black;
                width: 700px;
                margin-top: 4%;
                padding: 8px;
            }
            #navegador img{
                width: 6%;
                heigth: 6%;
                margin: 3px;
            }
            ul{
                list-style-type: none;
            }
            .anterior{
                margin-right: 15px;
            }
            textarea{
                resize: none;
                width: 40%;
            }
		</style>
	</head>
	<?php
        //En la primera ejecución de index, "paso" no estará inicializada; por defecto, se mostrará entonces el paso 1.
	    if(!isset($_SESSION["paso"])){
            $_SESSION["paso"] = 1;     	    
	    }
	    //-----------------------------
	    //Comprobar si entra información enviada desde el navegador o por URL (siempre GET).
	    if(isset($_GET["paso"])){
	       $_SESSION["paso"] = $_GET["paso"];
	    }
	    
	    //Comprobar si entra información a través de un formulario ("boton", siempre POST).
	    if(isset($_POST["boton"])){
	        if($_POST["boton"] == "Atrás"){
	            $_SESSION["paso"]--;
	        }elseif($_POST["Siguiente"]){
	            if($_SESSION["paso"] == 3){
	                $_SESSION["paso"] = "resumen";
	            }else{
	                $_SESSION["paso"]++;
	            }
	        }
	    }
	?>
	<body>
		<div id="contenido">
			<nav id="navegador">
				<a href="index.php?paso=1"><img id="1" alt="Paso 1" src="./img/Number-1-icon.png"></a>
				<a href="index.php?paso=2"><img id="2" alt="Paso 2" src="./img/Number-2-icon.png"></a>
				<a href="index.php?paso=3"><img id="3" alt="Paso 3" src="./img/Number-3-icon.png"></a>
				<a href="index.php?paso=resumen"><img id="resumen" alt="Resumen" src="./img/checkered-flag-icon.png"></a>
			</nav>
			<br>
			<?php
                //Contenido dinámico
			    switch($_SESSION["paso"]){
			        case 1:
			            include_once './data/1_personales.php';
			            break;
			        case 2:
			            include_once './data/2_profesionales.php';
			            break;
			        case 3:
			            include_once './data/3_bancarios.php';
			            break;
			        case "resumen":
			            include_once './data/resumen.php';
			            break;
			    }
			?>
		</div>
		<script type="text/javascript">
			//Parte de JS para cambiar la opacidad de los iconos del navegador según cuál está activo.
			var icono_activo = document.getElementById(<?php echo $_SESSION["paso"]; ?>);
			var iconos = ["1", "2", "3", "resumen"];

			for(var i = 0; i < iconos.length; i++){
				if(iconos[i] != icono_activo){
					document.getElementById(iconos[i]).style.opacity = 0.5;
				}
			}
			
		</script>
	</body>
</html>