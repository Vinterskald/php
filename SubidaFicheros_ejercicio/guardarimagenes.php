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
                // Posibles errores de subida
                $codigosErrorSubida= [
                0 => 'Subida correcta',
                1 => 'El tamaño del archivo excede el admitido por el servidor',  // directiva upload_max_filesize en php.ini
                2 => 'El tamaño del archivo excede el admitido por el cliente',  // directiva MAX_FILE_SIZE en el formulario HTML
                3 => 'El archivo no se pudo subir completamente',
                4 => 'No se seleccionó ningún archivo para ser subido',
                6 => 'No existe un directorio temporal donde subir el archivo',
                7 => 'No se pudo guardar el archivo en disco',  // permisos
                8 => 'Una extensión PHP evito la subida del archivo'  // extensión PHP
                ];
                $mensaje = '';
                
                // si no se reciben el directorio de alojamiento y el archivo, se descarta el proceso
                if((!isset($_FILES['img1']['name']))){
                    $mensaje .= 'ERROR: No has indicado una Imagen 1 para subir; si quieres subir solo una imagen, usa esta opción.';
                }else{
                    // se reciben el directorio de alojamiento y el archivo
                    $directorioSubida = "./imgusers/"; // debe permitir la escritua para Apache
                    // Información sobre el archivo subido
                    $nombreImg1 = $_FILES['img1']['name'];
                    $tipoImg1 = $_FILES['img1']['type'];
                    $tamanioImg1 = $_FILES['img1']['size'];
                    $temporalImg1 = $_FILES['img1']['tmp_name'];
                    $errorImg1 = $_FILES['img1']['error'];
                    
                    $mensaje .= 'Intentando subir Imagen 1: ' . ' <br />';
                    $mensaje .= "- Nombre: $nombreImg1" . ' <br />';
                    $mensaje .= '- Tamaño: ' . ($tamanioImg1 / 1024) . ' KB <br />';
                    $mensaje .= "- Tipo: $tipoImg1" . ' <br />' ;
                    $mensaje .= "- Nombre archivo temporal: $temporalImg1" . ' <br />';
                    $mensaje .= "- Código de estado: $errorImg1" . ' <br />';
                    
                    $mensaje .= '<br />RESULTADO<br />';
                    
                    // Obtengo el código de error de la operación, 0 si todo ha ido bien
                    if($errorImg1 > 0) {
                        $mensaje .= "Se a producido el error: $errorImg1:"
                        . $codigosErrorSubida[$errorImg1] . ' <br />';
                    }else{ 
                        // subida correcta del temporal
                        //Compruebo el tipo de archivo y su tamaño:
                        $ext1 = strtolower(pathinfo($nombreImg1, PATHINFO_EXTENSION));
                        if($ext1 != "jpg" || $ext1 != "png"){
                            $mensaje .= "ERROR: El archivo de Imagen 1 no es válido. <br>"; 
                        }else{
                            if($tamanioImg1 > 200000){
                                $mensaje .= "ERROR: El archivo que quieres subir supera el máximo individual permitido. <br>";
                            }else{
                                // si es un directorio y tengo permisos
                                if(is_dir($directorioSubida) && is_writable ($directorioSubida)) {
                                    //Intento mover el archivo temporal al directorio indicado
                                    if (move_uploaded_file($temporalImg1,  $directorioSubida .'/'. $nombreImg1) == true) {
                                        $mensaje .= 'Archivo guardado en: ' . $directorioSubida .'/'. $nombreImg1 . ' <br />';
                                    }else{
                                        $mensaje .= 'ERROR: Archivo no guardado correctamente <br />';
                                    }
                                }else{
                                    $mensaje .= 'ERROR: No es un directorio correcto o no se tiene permiso de escritura <br />';
                                }
                            }            
                        }        
                    }
                    echo $mensaje;
                       
                    if((isset($_FILES['img2']['name']))){
                        // Información sobre el archivo subido
                        $nombreImg2 = $_FILES['img2']['name'];
                        $tipoImg2 = $_FILES['img2']['type'];
                        $tamanioImg2 = $_FILES['img2']['size'];
                        $temporalImg2 = $_FILES['img2']['tmp_name'];
                        $errorImg2 = $_FILES['img2']['error'];
                        
                        $mensaje .= '<br><br>Intentando subir Imagen 2: ' . ' <br />';
                        $mensaje .= "- Nombre: $nombreImg2" . ' <br />';
                        $mensaje .= '- Tamaño: ' . ($tamanioImg2 / 1024) . ' KB <br />';
                        $mensaje .= "- Tipo: $tipoImg2" . ' <br />' ;
                        $mensaje .= "- Nombre archivo temporal: $temporalImg2" . ' <br />';
                        $mensaje .= "- Código de estado: $errorImg2" . ' <br />';
                        
                        $mensaje .= '<br />RESULTADO<br />';
                        
                        // Obtengo el código de error de la operación, 0 si todo ha ido bien
                        if($errorImg2 > 0) {
                            $mensaje .= "Se a producido el error: $errorImg2:"
                            . $codigosErrorSubida[$errorImg2] . ' <br />';
                        }else{ 
                            // subida correcta del temporal
                            //Compruebo el tipo de archivo y su tamaño:
                            $ext2 = strtolower(pathinfo($nombreImg2, PATHINFO_EXTENSION));
                            if($ext2 != "jpg" || $ext2 != "png"){
                                $mensaje .= "ERROR: El archivo de Imagen 2 no es válido. <br>";
                            }else{
                                if($tamanioImg2 > 200000){
                                    $mensaje .= "ERROR: El archivo que quieres subir supera el máximo individual permitido. <br>";
                                }elseif(($tamanioImg2 + $tamanioImg1) > 300000){
                                    $mensaje .= "ERROR: Ambos archivos suman más del tamaño permitido; la Imagen 2 no se subirá.<br>";
                                }else{
                                    // si es un directorio y tengo permisos
                                    if(is_dir($directorioSubida) && is_writable ($directorioSubida)) {
                                        //Intento mover el archivo temporal al directorio indicado
                                        if(move_uploaded_file($temporalImg2,  $directorioSubida .'/'. $nombreImg2) == true) {
                                            $mensaje .= 'Archivo guardado en: ' . $directorioSubida .'/'. $nombreImg2 . ' <br />';
                                        }else{
                                            $mensaje .= 'ERROR: Archivo no guardado correctamente <br />';
                                        }
                                    }else{
                                        $mensaje .= 'ERROR: No es un directorio correcto o no se tiene permiso de escritura <br />';
                                    }
                                }                     
                            }    
                        }
                        echo $mensaje;
                    }                 
                    echo "<br><a href=''>Volver al formulario.</a>";
                }
		    }else{
        		echo "
            		<div id='principal'>
            			<form name='subida' enctype='multipart/form-data' action='' method='POST'>
            				<h1>Formulario de subida de imágenes</h1>
            				<p>	
            					Sube hasta dos imágenes diferentes. Tienen que ser .JPG o .PNG; 
            					una imagen no puede ser de mÃ¡s de 200kb y si subes dos, entre ambas no pueden ser de más de 300kb.
            				</p>
            				<br>
            				<label>Imagen 1: <input type='file' name='img1' accept='image/png, image/jpeg' required /></label>
            				<br><br>
            				<label>Imagen 2 (opcional): <input type='file' name='img2' accept='image/png, image/jpeg'/></label>
            				<br><br>
            				<input type='submit' name='subir' value='Subir'/>
            			</form>
            		</div>
                ";
		    }
		?>
	</body>
</html>