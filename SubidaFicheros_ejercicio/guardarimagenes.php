<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Subida de fichero al servidor Web</title>
		<meta name="author" content="Víctor Viloria Iberti, 2º DAW"/>
		<style>
			#principal{
				text-align: center;
			}
		</style>
	</head>
	<body>
		<?php
            if($_SERVER['REQUEST_METHOD'] == "POST" || isset($_REQUEST["subir"])){
                if($_FILES["img1"]["size"] == 0){
                    if($_FILES["img2"]["size"] > 0){
                        echo "La opción de segunda imagen es opcional; si quieres subir solo una, usa la primera opción.";
                    }else{
                        echo "No has subido ninguna imagen.<br><br>";
                    }       
                    echo "<a href=''>Ir a formulario.</a>";
                }else{
                    //Directorio predefinido.
                    $directorioSubida = "./imgusers/";
                    //Datos de Imagen 1:
                    $nombreImg1 = $_FILES['img1']['name'];
                    $tipoImg1 = $_FILES['img1']['type'];
                    $tamanioImg1 = $_FILES['img1']['size'];
                    $temporalImg1 = $_FILES['img1']['tmp_name'];
                    
                    echo 'Intentando subir el archivo: <br>';
                    echo "- Nombre: $nombreImg1 <br>";
                    echo '- Tamaño: '.($tamanioImg1 / 1024).'KB <br>';
                    echo "- Tipo: $tipoImg1<br>";
                    echo "- Nombre archivo temporal: $temporalImg1 <br>";
                    
                    echo '<br>RESULTADO<br>';
                    
                    if(is_writable($directorioSubida)){
                        //Intenta subir Imagen 1:
                        if(file_exists('./imgusers/'.pathinfo($nombreImg1, PATHINFO_FILENAME))){
                            echo "ERROR Imagen 1: El archivo ya existe en el directorio de subidas.<br><br>";
                            echo "<a href=''>Volver a formulario.</a>";
                            exit();
                        }else{
                            $ext = strtolower(pathinfo($nombreImg1, PATHINFO_EXTENSION));
                            if($ext != "jpg" || $ext != "png"){
                                echo "ERROR Imagen 1: El tipo de archivo no es correcto. <br><br>";
                                echo "<a href=''>Volver al formulario.</a>";
                                exit();
                            }else{
                                if($tamanioImg1 > 200000){
                                    echo "ERROR Imagen 1: El tamaño del archivo supera el máximo permitido.";
                                    echo "<a href=''>Volver al formulario.</a>";
                                    exit();
                                }else{
                                    echo "Subiendo Imagen 1...";
                                    if(move_uploaded_file($temporalImg1, $directorioSubida.'/'.$nombreImg1) == true){
                                        echo 'Archivo guardado en: '.$directorioSubida.'/'.$nombreImg1.'<br>';
                                    }else{
                                        echo 'ERROR: Archivo no guardado correctamente <br>';
                                        echo "<a href=''>Volver al formulario.</a>";
                                        exit();
                                    }
                                }
                            }
                        }
                        //-----------------------------------------------------------------------                     
                        if(is_uploaded_file($_FILES["img2"]["name"])){
                            //Datos de Imagen 2:
                            $nombreImg2 = $_FILES['img2']['name'];
                            $tipoImg2 = $_FILES['img2']['type'];
                            $tamanioImg2 = $_FILES['img2']['size'];
                            $temporalImg2 = $_FILES['img2']['tmp_name'];
                            
                            echo 'Intentando subir el archivo: <br>';
                            echo "- Nombre: $nombreImg2 <br>";
                            echo '- Tamaño: '.($tamanioImg2 / 1024).'KB <br>';
                            echo "- Tipo: $tipoImg2<br>";
                            echo "- Nombre archivo temporal: $temporalImg2<br>";
                            
                            echo '<br>RESULTADO<br>';
                            
                            //Intenta subir Imagen 2 (solo si no falla Imagen 1):
                            if(file_exists('./imgusers/'.pathinfo($nombreImg2, PATHINFO_FILENAME))){
                                echo "ERROR Imagen 2: El archivo ya existe en el directorio de subidas.<br><br>";
                                echo "<a href=''>Volver a formulario.</a>";
                            }else{
                                $ext = strtolower(pathinfo($nombreImg2, PATHINFO_EXTENSION));
                                if($ext != "jpg" || $ext != "png"){
                                    echo "ERROR Imagen 2: El tipo de archivo no es correcto.<br><br>";
                                    echo "<a href=''>Volver al formulario.</a>";
                                }else{
                                    if($tamanioImg2 > 200000){
                                        echo "ERROR Imagen 2: El tamaño del archivo supera el máximo permitido.";
                                        echo "<a href=''>Volver al formulario.</a>";
                                    }elseif(($tamanioImg2 + $tamanioImg1) > 300000){
                                        echo "ERROR: No se ha podido subir la segunda imagen porque entre ambas superan el tamaño máximo permitido de subida simultánea.";
                                        echo "<a href=''>Volver al formulario.</a>";
                                    }else{
                                        echo "Subiendo Imagen 2...";
                                        if(move_uploaded_file($temporalImg2, $directorioSubida.'/'.$nombreImg2) == true){
                                            echo 'Archivo guardado en: '.$directorioSubida.'/'.$nombreImg2.'<br>';
                                        }else{
                                            echo 'ERROR: Archivo no guardado correctamente <br>';
                                            echo "<a href=''>Volver al formulario.</a>";
                                        }
                                    }
                                }
                            }
                        }
                    }else{
                        echo "Fallo de permisos de escritura en el directorio. Disculpa las molestias.<br><br>";
                        echo "<a href=''>Recarga el formulario.</a>";
                    }
                }
		    }else{
        		echo "
            		<div id='principal'>
            			<form name='subida' enctype='multipart/form-data' action='' method='POST'>
            				<h1>Formulario de subida de imágenes</h1>
            				<p>	
            					Sube hasta dos imágenes diferentes. Tienen que ser .JPG o .PNG; 
            					una imagen no puede ser de más de 200kb y si subes dos, entre ambas no pueden ser de más de 300kb.
            				</p>
            				<br>
            				<label>Imagen 1: <input type='file' name='img1[]' accept='image/png, image/jpeg'/></label>
            				<br><br>
            				<label>Imagen 2 (opcional): <input type='file' name='img2[]' accept='image/png, image/jpeg'/></label>
            				<br><br>
            				<input type='submit' name='subir' value='Subir'/>
            			</form>
            		</div>
                ";
		    }
		?>
	</body>
</html>