<?php
namespace pruebas00\taller\POO;

trait Ejemplotrait
{
    private $precio;
    function setprecio (int $precio ){
        $this->precio = $precio;
    }
    function getprecio ():int{
        return $this->precio;
    }
}

