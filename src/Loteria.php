<?php

namespace App;

use InvalidArgumentException;

class Loteria
{
    private $qtdDezenasBilhetePremiado;

    public function __construct()
    {
        $this->qtdDezenasBilhetePremiado = 6;
    }

    public function geraBillhetesAleatorios($qtdLimite)
    {
        $numeros = range(1, 60);
        shuffle($numeros);
        $bilhete = array_slice($numeros, 0, $qtdLimite);
        sort($bilhete);
        return $bilhete;
    }

    public function geraBillhetePremiado()
    {        
        $bilhete = $this->geraBillhetesAleatorios($this->qtdDezenasBilhetePremiado);        
        return $bilhete;
    }

    public function geraBilhete($quantidadeBilhetes, $quantidadeDezenas)
    {
        if ($quantidadeBilhetes < 1 || $quantidadeBilhetes > 50) {
            throw new InvalidArgumentException('Quantidade de bilhetes deve ser entre 1 e 50.');
        }

        if ($quantidadeDezenas < 6 || $quantidadeDezenas > 10) {
            throw new InvalidArgumentException('A quantidade de dezenas deve estar entre 6 e 10');
        }

        $bilhetes = [];
        for ($i = 0; $i < $quantidadeBilhetes; $i++) {            
            $ticket = $this->geraBillhetesAleatorios($quantidadeDezenas);
            $bilhetes[] = $ticket;
        }

        return $bilhetes;
    }

    public function verificaBilhetes($bilhetesPremiados, $bilhetes)
    {
        $resultado = "<table border='1'><tr><th>Bilhetes</th><th>Números premiados</th></tr>";
        foreach ($bilhetes as $bilhete) {
            $numerosPremiados = array_intersect($bilhetesPremiados, $bilhete);
            $resultado .= "<tr><td>" . implode(', ', $bilhete) . "</td><td>" . implode(', ', $numerosPremiados) . "</td></tr>";
        }
        $resultado .= "</table>";
        return $resultado;
    }
}
?>
