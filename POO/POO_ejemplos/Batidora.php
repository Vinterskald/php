<?php
namespace pruebas00\taller\POO;

include_once 'Motor.php';

class Batidora implements Motor
{
    private $electricidad;
    protected $potencia;
    

    function __construct(int $potencia){
        $this->potencia = $potencia;
        $this->electricidad = false;
    }
    public function encender():bool
    {
        $this->electricidad = true;
        return true;
    }

    public function apagar():bool
    {
        $this->electricidad = false;
        return false;
    }

    public function estaEncendido():bool
    {
        return ( $this->electricidad == true);
    }
}

