<?php
namespace pruebas00\taller\POO;

include_once 'Batidora.php';
include_once 'Ejemplotrait.php';

class Molinex extends Batidora
{

    use Ejemplotrait;
    
    public function __toString(){
        return 
            "Potencia  = ".$this->potencia." W <br>".
            "Estado del Motor = ".(($this->estaEncendido())?"Encendido":"Apagado")."<br>".
            "Precio    = ".$this->getprecio()." Euros <br>";
    }
}

