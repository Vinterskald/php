<?php
    function usuarioOK($usuario, $contrasenia){
        $tam_usuario = strlen($usuario);
        $nombre_inv = strrev($usuario);
        
        if(($tam_usuario < 8) || ($contrasenia != $nombre_inv)){
            return false;
        }else{
            return true;
        }
    }
    //-----------------------------------------------------------
    //Funciones para generar detalles:
    //Longitud de texto:
    function long_texto($textarea){
        $longitud = strlen($textarea);
        return $longitud;
    }
    
    //Nº de palabras:
    function num_palabras($textarea){
        $countpalabras = str_word_count($textarea, 0);
        return $countpalabras;
    }
    
    //Letra más repetida:
    function letra_masrep($textarea){
        //Elimino los espacios.
        $textarea = str_replace(' ', '', $textarea);
        $textoArray = str_split(count_chars($textarea.trim($textarea), 3));
        $mas_rep = "";
        $veces = 0;
        
        foreach($textoArray as $value){
            $enc = substr_count($textarea, $value);
            if($veces < $enc){
                $mas_rep = $value;
                $veces = $enc;
            }
        }
        
        return $mas_rep;
    }
    
    //Palabra más repetida:
    function palabra_masrep($textarea){
        //preg_split() para separar la cadena en un array de String.
        $textoArray = preg_split ("/[\s,]+/",strtolower(rtrim(ltrim($textarea))));
        
        $countRep = [];
        for($i = 0; $i < count($textoArray); $i++){
            //str_ireplace() para ignorar si hay o no mayúsculas.
            $palabra = strtolower($textoArray[$i]);
            //echo $textoArray[$i];
            
            //Compruebo con array_key_exists() si el índice que quiero comprobar existe ya o no en el array de destino.
            $encontrado=false;
            for($j = 1; $j < count($countRep)+1; $j++){
                if($palabra == $countRep[$j][1]){
                    $encontrado = true;
                    $key = $j;
                    break;
                }  
            }
            if($encontrado){
                $countRep[$key][0] = (0+$countRep[$key][0])+1;
            }else{
                $key = count($countRep)+1;
                $countRep[$key][0] = 1;
                $countRep[$key][1] = $palabra;
            }
            //echo $countRep[$key][1] . ' ' . $countRep[$key][0];
        }
        
        array_multisort($countRep[0],SORT_DESC);
        $palabraMasRepe = $countRep[1][1] ;
        
        return $palabraMasRepe;
    }
?>