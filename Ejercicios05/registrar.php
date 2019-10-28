<!DOCTYPE html>
<!--
    2.Realizar el programa registrar.php que sirva para dar de alta usuarios en el sistema. 
    El programa mostrará un formulario donde se solicitará un nombre, un correo electrónico y la contraseña dos veces. 
    El programa comprobará que ningún campo está vacío que el correo tiene un valor correcto de email y que 
    los dos valores de la contraseña coinciden.
    
    La contraseña tiene que ser segura, para ello tiene que cumplir las siguiente reglas:
        1º Tamaño  igual o superior a 8 caracteres en total.
        2º Contiene  caracteres alfabéticos donde hay mayúsculas o minúsculas (una como mínimo de cada).
        3º Contiene algún dígito.
        4º Contiene algún carácter no alfanumérico ni dígito ni alfabético.

    El programa mostrará en mensaje: Usuario registrado o error indicado el tipo de error producido debido a que 
    falta un dato, las contraseñas no coinciden o no cumplen alguna de las reglas de seguridad.
    
    Nota: Si es posible el chequeo también se hará, por lo menos lo más sencillo, en la parte cliente (JavaScript).  
-->
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ejercicio 2 (5) - Registro de prueba</title>
		<style type="text/css">
            #contenido{
                text-align: center;
            }
		</style>
	</head>
	<body>
		<div id="contenido">
    		<?php
    		//Función para validación de contraseña con patrón (expresión regular) para comprobar los requisitos de coincidencia de caracteres:
        		function validar($password) {
        		    return preg_match_all('$S*(?=S{8,})(?=S*[a-z])(?=S*[A-Z])(?=S*[d])(?=S*[W])S*$', $password) ? TRUE : FALSE;
        		}
        		/* Patrón:
        		    -> $ = Principio de cadena.
                    -> S* = Cualquier combinación de caracteres(no incluyendo espacio en blanco).
                    -> * = Cero o más de-
                    -> (?=S{8,}) = De al menos 8 caracteres.
                    -> (?=S*[a-z]) = Conteniendo al menos una minúscula.
                    -> [a-z] = Conteniendo cualquier letra desde a minúscula hasta z minúscula. 
                    -> (?=S*[A-Z]) = Y por lo menos una mayúscula.
                    -> [A-Z] = Conteniendo cualquier mayúscula desde A mayúscula hasta Z mayúscula.
                    -> (?=S*[d]) = Y al menos un número.
                    -> d = Dígito (0-9).
                    -> (?=S*[W]) = Y al menos un caracter especial (no alfanumérico).
                    -> $ = Final de la cadena.
        		 */
        		//-----------------------------------------------------------------------------------------
    		    $page = '';
    		    //Si se ha enviado algo por POST o si se ha definido la variable del submit del formulario:
                if($_SERVER["REQUEST_METHOD"] == "POST" || isset($_REQUEST["enviar"])){
                    //Variables (elementos de formulario):
                        $nombre = $_REQUEST["nombre"];
                        $correo = $_REQUEST["email"];
                        $password1 = $_REQUEST["pass1"];
                        $password2 = $_REQUEST["pass2"];
                    //----------------------------------------------
                        if(!empty($nombre)){
                            $page .= "Nombre '$nombre' válido.<br>";
                            if(!empty($correo)){
                                if(strpos($correo, "@") != FALSE && strpos($correo, ".") != FALSE){
                                    $page .= "Cuenta de correo '$correo' válida.<br>";
                                    if(!empty($password1)){
                                        if(strlen($password1) >= 8){
                                            if(validar($password1)){
                                                if($password2 !== $password1){
                                                    $page .= "ERROR: Las contraseñas no coinciden.<br>";
                                                }else{
                                                    $page .= "Usuario registrado correctamente.<br>";
                                                }
                                            }else{
                                                $page .= "ERROR: La contraseña no es válida.<br>";
                                            }
                                        }else{
                                            $page .= "ERROR: El número de caracteres en la contraseña debe ser igual o mayor de ocho (8).<br>";
                                        }
                                    }else{
                                        $page .= "ERROR: El campo contraseña está vacío.<br>";
                                    }
                                }else{
                                    $page .= "ERROR: No has introducido una cuenta de correo válida.<br>";
                                }
                            }else{
                                $page .= "ERROR: El campo correo está vacío.<br>";
                            }
                        }else{
                            $page .= "ERROR: El campo nombre está vacío.<br>";
                        }
                    $page .= "<br><a href=''>Volver a formulario.</a>";
                }else{
                    //Si no hay datos de envío, se muestra el formulario:
                    $page .= "
                        <form name='form_reg' action='' method='POST'>
                            <br><h2>Formulario de registro</h2><br>
                            <label>Nombre de usuario</label><br>
                            <input name='nombre' type='text' required/>
                            <br><br>
                            <label>Correo electrónico</label><br>
                            <input name='email' type='email' placeholder='ejemplo@correo.com' required/>
                            <br><br>
                            <label>Contraseña</label><br>
                            <input name='pass1' type='password' required/><br>
                            <details>
                                <summary>La contraseña:</summary>
                                <p>Debe ser de mínimo 8 caracteres.</p>
                                <p>Debe contener mayúscula(s), minúscula(s), algún dígito y algún caracter no alfanumérico (como +, *, _ o &).</p>
                            </details>
                            <br>
                            <label>Repite tu contraseña</label><br>
                            <input name='pass2' type='password' required/>
                            <br><br>
                            <input type='submit' name='enviar' value='Registrar'/>
                        </form>
                    ";
                }
                echo $page;
    		?>
		</div>
	</body>
</html>
<?php
    echo "<br><hr><br>";
    show_source(__FILE__);
?>