<?php
namespace pruebas00\taller\POO;

class Coche
{
    // Definir los atributos
    
    
    // Completar los métodos
    
    function __construct ( String $modelo, int $velocidadMax){
        
    }
    
    public function  arrancar():bool{
        return true;
    }
    
    public function parar():bool{
        return true;
    }
    
    public function acelera( int $cantidad):bool{
        return true;
    }
    
    public function frena ( int $cantidad):bool{
        return true;
    }
    
    public function recorre ():bool{
        return true;
    }
    
    public function info():string{
        return "";
    }
    
    public function getKilometros():int{
        return 0;
    }
    
    private function infoError( String $mensaje):void{
        
    }	
}

