<?php

class Bilhete
{
    private $numeros;

    public function __construct($numeros)
    {
        $this->numeros = $numeros;
        sort($this->numeros);
    }

    public function getNumeros()
    {
        return $this->numeros;
    }
}
?>
